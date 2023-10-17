<style>
    .table th, .table td {
        padding: 5px; /* Ajustez la valeur de marge intérieure comme vous le souhaitez */
    }

    .table th:nth-child(1),
    .table td:nth-child(1) {
        width: 5%; /* Ajustez la largeur de la première colonne */
    }

    .table th:nth-child(2),
    .table td:nth-child(2) {
        width: 5%; /* Ajustez la largeur de la deuxième colonne */
    }

    /* Continuez de la même manière pour les autres colonnes */

    /* Pour réduire la largeur du tableau lui-même */
    .table {
        width: 90%; /* Ajustez la largeur totale du tableau */
    }
</style>



<div class="row" style="width: 100%">
    <div class="col-12" style="width: 100%">
    <div class="card"style="width:100%">
    <div class="card-header" style="background-color:#4A8B2C">
    <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes personnelles en Répos</h3>
    <div class="card-tools d-flex align-items-center">
    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterRepos()"><i class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>
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
    <th style="width:10%;">Date début</th>
    <th style="width:10%;">Date fin</th>
    <th style="width:20%;">Action</th>
    </tr>
    </thead>
    
    
    <tbody>
    @foreach ($reposs as $repos)
    
    <tr>
    <td> {{$repos->emploie->nom}} </td>
    <td> {{$repos->emploie->prenom}} </td>
    <td> {{$repos->emploie->numTel}} </td>
    <td> {{$repos->motifrep}}  </td>
    <td> {{$repos->debutrep}} </td>
    <td> {{$repos->finrep}} </td>
    <td>
    
    <button class="btn btn-link" wire:click="goEditRepos({{$repos->id}})"><i class="far fa-edit"></i></button>
    <button class="btn btn-link" wire:click="confirmDelete({{$repos->id}})"><i class="far fa-trash-alt"></i></button>
    
    </td>
    </tr>
    
    @endforeach
    </tbody>
    
    
    </table>
    </div>
    
    
    <div class="card-footer">
    <div class="float-right">
    
    {{ $reposs->links() }}
    
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
                    @this.deleteRepos(event.detail.message.data.rep_id)
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
    
    