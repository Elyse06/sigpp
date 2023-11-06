<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    //
    public function index()
    {
        return view('components.topnav');
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du conge. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "noti_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteNotification($id){
        DatabaseNotification::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Conge supprimer avec succès!"]);
    }

}
