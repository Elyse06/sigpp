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



<div class="row" style="height: 100%">
<div class="col-12" style="height: 100%">
<div class="card"style="height: 100%">
<div class="card-header" style="background-color:#4A8B2C">
<h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes personnelles en mission</h3>
<div class="card-tools d-flex align-items-center">
<a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterMission()"><i class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>
</div>
</div>

<div  class="card-body table-responsive p-0 table-striped" style="height: 100%;">
<table  class="table table-head-fixed text-nowrap" >


<thead>
<tr>
<th style="width:10%;">Nom</th>
<th style="width:10%;">Prenom</th>
<th style="width:15%;">Telephone</th>
<th style="width:5%;">Lieu</th>
<th style="width:15%;">Date Debut</th>
<th style="width:15%;">Date Fin</th>
<th style="width:10%;">Motif</th>
<th style="width:20%;">Action</th>
</tr>
</thead>


<tbody>
@foreach ($missions as $mission)

<tr>
<td> {{$mission->emploie->implode("nom", "|")}} </td>
<td> {{$mission->emploie->implode("prenom", "|")}} </td>
<td> {{$mission->emploie->implode("numTel", "|")}} </td>
<td> {{$mission->lieumis}} </td>
<td> {{$mission->debutmis}} </td>
<td> {{$mission->finmis}} </td>
<td> {{$mission->motifmis}} </td>
<td>

<button class="btn btn-link" wire:click="goEditMission({{$mission->id}}, {{$mission->emploie->implode("id")}})"><i style="color: green" class="far fa-edit"></i></button>
<button class="btn btn-link" wire:click="confirmDelete({{$mission->id}})"><i style="color:red" class="far fa-trash-alt"></i></button>

</td>
</tr>

@endforeach
</tbody>


</table>
</div>


<div class="card-footer">
<div class="float-right">

{{ $missions->links() }}

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
                @this.deleteMission(event.detail.message.data.mission_id)
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
