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
    <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes personnelles en Permission</h3>
    <div class="card-tools d-flex align-items-center">
    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterPermission()"><i class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>

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
    @foreach ($permissions as $permission)
    
    <tr>
    <td> {{$permission->emploie->nom}} </td>
    <td> {{$permission->emploie->prenom}} </td>
    <td> {{$permission->emploie->numTel}} </td>
    <td> {{$permission->motifpermi}}  </td>
    <td class="text-center"> {{$permission->sldtotpermi}} </td>
    <td class="text-center"> {{$permission->sldeffpermi}} </td>
    <td class="text-center"> {{$permission->sldrstpermi}} </td>
    <td> {{$permission->debutpermi}} </td>
    <td> {{$permission->finpermi}} </td>
    <td>
    
    <button class="btn btn-link" wire:click="goEditPermission({{$permission->id}})"><i style="color: green" class="far fa-edit"></i></button>
    <button class="btn btn-link" wire:click="confirmDelete({{$permission->id}})"><i style="color:red" class="far fa-trash-alt"></i></button>
    
    </td>
    </tr>
    
    @endforeach
    </tbody>
    
    
    </table>
    </div>
    
    
    <div class="card-footer d-flex justify-content-between align-items-center">
    <div class="d-flex">
        <a href="{{ route('planning.permission') }}" style="width: 170px;" class="btn btn-info mr-2">
            <div style="color: white;">Actuelle</div>
        </a>
        <a href="{{ route('planning.permission.moi') }}" style="width: 170px;" class="btn btn-info mr-2">
            <div style="color: white;">Mensuel</div>
        </a>
        <a href="{{ route('planning.permission.anne') }}" style="width: 170px;" class="btn btn-info mr-2">
            <div style="color: white;">Annuel</div>
        </a>
        <a href="{{ route('planning.permission.tout') }}" style="width: 170px;" class="btn btn-info mr-2">
            <div style="color: white;">Tous Les permission</div>
        </a>
    </div>
    
        <!-- Bouton flottant à droite -->
        <div class="float-right" style="margin-top: 15px">
            {{ $permissions->links() }}
        </div>
    </div>
    
    
    
    </div>
    </div>
    
    </div>
    
    </div>
    </div>
    
