<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\RepoMedical;
use Livewire\Component;
use Livewire\WithPagination;

class Repos extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newRepos = [];
    public $editRepos = [];

    public $search = "";

    public function render()
    {

        $searchCriteria = "%".$this->search."%";

        return view('livewire.repos.index',[
            "reposs" => RepoMedical::whereHas('emploie', function ($query) use ($searchCriteria){
                $query->where('nom', 'like', '%' . $searchCriteria . '%');

            })->latest()->paginate(5)
        ], [
            "employees" => Employee::all()
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }


    // plusiere roles
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editRepos.employee_id' => 'required',
                'editRepos.debutrep' => 'required',
                'editRepos.finrep' => 'required',
                'editRepos.motifrep' => 'required'
            ];
        }

        return [
            'newRepos.employee_id' => 'required',
            'newRepos.debutrep' => 'required',
            'newRepos.finrep' => 'required',
            'newRepos.motifrep' => 'required'
        ];
    
    }
    // mandeha @formulaire ajouter
    public function goAjouterRepos(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditRepos($id){
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editRepos = RepoMedical::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListRepos(){
        $this->currentPage = PAGELIST;
        $this->editRepos = [];
    }

    // pour faire l'ajout
    public function addRepos(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $repoData = $validationAttribute["newRepos"];
        $repoData['expires_at'] = $repoData['finrep'];
        
        // ajout d'un nouvelle mission
        RepoMedical::create($repoData);

        // reinitialiser newMission 
        $this->newRepos = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Repos creer avec succès!"]);
    }

    // pour faire la modification
    public function updateRepos(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $repoData = $validationAttribute["editRepos"];
        $repoData['expires_at'] = $repoData['finrep'];

        // modification
        RepoMedical::find($this->editRepos["id"])->update($repoData);

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Repos modifier avec succès!"]);
    }

    // pour la confirmation du supression
      
       public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du repos. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "rep_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteRepos($id){
        RepoMedical::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Répos supprimer avec succès!"]);
    }

}
