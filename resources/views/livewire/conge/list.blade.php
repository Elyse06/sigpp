<div class="row" style="height: 100%">
    <div class="col-12" style="height: 100%">
    <div class="card"style="height: 100%">
    <div class="card-header" style="background-color:#4A8B2C">
    <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes personnelles en Conge</h3>
    <div class="card-tools d-flex align-items-center">
    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterConge()"><i class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>
    </div>
    </div>
    
    <div  class="card-body table-responsive p-0 table-striped" style="height: 100%;">
    <table  class="table table-head-fixed text-nowrap" >
    
    
    <thead>
    <tr>
    <th style="width:10%;">Nom</th>
    <th style="width:10%;">Prenom</th>
    <th style="width:15%;">Telephone</th>
    <th style="width:5%;">Motif</th>
    <th style="width:15%;">Solde de moi</th>
    <th style="width:15%;">Solde effectué</th>
    <th style="width:10%;">Solde restant</th>
    <th style="width:10%;">Date début</th>
    <th style="width:10%;">Date fin</th>
    <th style="width:20%;">Action</th>
    </tr>
    </thead>
    
    
    <tbody>
    @foreach ($conges as $conge)
    
    <tr>
    <td> {{$conge->emploie->nom}} </td>
    <td> {{$conge->emploie->prenom}} </td>
    <td> {{$conge->emploie->numTel}} </td>
    <td>  </td>
    <td> {{$conge->sldtotcon}} </td>
    <td> {{$conge->sldeffcon}} </td>
    <td> {{$conge->sldrstcon}} </td>
    <td> {{$conge->debutcon}} </td>
    <td> {{$conge->fincon}} </td>
    <td>
    
    <button class="btn btn-link" wire:click="goEditConge({{$conge->id}})"><i class="far fa-edit"></i></button>
    <button class="btn btn-link" wire:click="confirmDelete({{$conge->id}})"><i class="far fa-trash-alt"></i></button>
    
    </td>
    </tr>
    
    @endforeach
    </tbody>
    
    
    </table>
    </div>
    
    
    <div class="card-footer">
    <div class="float-right">
    
    {{ $conges->links() }}
    
    </div>
    </div>
    
    </div>
    
    </div>
    </div>
    
    <script>
        window.addEventListener("comfirmMessage", event=>{
            Swal.fire({
                title: event.detail.message.title,
                text: event.detail.message.text,
                icon: event.detail.message.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'continuer',
                cancelButtonText: 'Annuler'
                }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteConge(event.detail.message.data.conge_id)
                }
    
            })
    
            window.addEventListener("showSuccesMessage", event=>{
                Swal.fire({
                    position: 'top-end',
                    icon:'success',
                    toast: true,
                    title: event.detail.message || "Opération effectuer avec succès",
                    showConfirmButton: false,
                    timer: 5000
                })
            })
            
        })
    </script>
    
    
