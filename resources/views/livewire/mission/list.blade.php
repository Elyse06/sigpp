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
<td>  </td>
<td>

<button class="btn btn-link"><i class="far fa-edit"></i></button>
<button class="btn btn-link"><i class="far fa-trash-alt"></i></button>

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