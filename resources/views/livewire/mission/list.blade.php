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

<div class="input-group input-group-md" style="width: 250px;">
    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">

    <div class="input-group-append">
    <button type="submit" class="btn btn-default">
    <i class="fas fa-search"></i>
    </button>
    </div>
</div>

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

    <!-- Nouvelle division pour les boutons -->
    <div class="float-left mt-2">
        <!-- Trois boutons avec des classes pour la mise en forme -->
        <button class="btn btn-info mr-2">Journalière</button>
        <button class="btn btn-info mr-2">Mensuel</button>
        <button class="btn btn-info">Annuel</button>
    </div>
</div>



</div>
</div>

</div>

</div>
</div>

