<style>
        .table th,
        .table td {
            padding: 5px;
            /* Ajustez la valeur de marge intérieure comme vous le souhaitez */
        }

        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 5%;
            /* Ajustez la largeur de la première colonne */
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            width: 5%;
            /* Ajustez la largeur de la deuxième colonne */
        }

        /* Continuez de la même manière pour les autres colonnes */

        /* Pour réduire la largeur du tableau lui-même */
        .table {
            width: 90%;
            /* Ajustez la largeur totale du tableau */
        }
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: row;
        }
        li {
            margin-right: 20px; /* Espace entre les éléments de liste */
            color: black ;
            
        }
    </style>

    <div class="card" style="width:100%">
        <div class="card-header" style="background-color:#4A8B2C">
            <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes des personnelles
            </h3>

            <div class="card-tools d-flex align-items-center">
                <style>
                    .btn-custom {
    background-color: transparent; /* Supprime l'arrière-plan */
    border: none; /* Supprime la bordure */
    padding: 0; /* Supprime le rembourrage */
}

                </style>
                @can("agent")
                    <div>
                        <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterEmployee()"><i
                                class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>
                    </div>
                @endcan
                
                

                <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="search"
                        class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <div class="card-body table-responsive p-0" style="height: 420px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:15%;">Nom</th>
                        <th style="width:15%;">Prenom</th>
                        <th style="width:15%;">Telephone</th>
                        <th style="width:15%;">Date de Naissance</th>
                        <th style="width:15%;">Adresse</th>
                        <th style="width:10%;">Statuts</th>
                        @can("agent")
                        <th style="width:10%;">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td> {{ $employee->nom }} </td>
                            <td> {{ $employee->prenom }} </td>
                            <td> {{ $employee->numTel }} </td>
                            <td> {{ $employee->date_de_naissance }} </td>
                            <td> {{ $employee->adresse }} </td>
                            <td class="text-center"> 

                                @if (in_array($employee->id, $conges->pluck('employee_id')->all()))
                                <i class="fas fa-circle" style="color: turquoise; font-size: 10px;"></i>

                                @elseif (in_array($employee->id, $missions->pluck('pivot.employee_id')->all()))
                                <i class="fas fa-circle" style="color: navy; font-size: 10px;"></i>
                                @elseif (in_array($employee->id, $permissions->pluck('employee_id')->all()))
                                <i class="fas fa-circle" style="color: gray; font-size: 10px;"></i>
                                @elseif (in_array($employee->id, $sorties->pluck('employee_id')->all()))
                                <i class="fas fa-circle" style="color: orange; font-size: 10px;"></i>
                                @elseif (in_array($employee->id, $repos->pluck('employee_id')->all()))
                                <i class="fas fa-circle" style="color: red; font-size: 10px;"></i>
                                @else
                                <i class="fas fa-circle" style="color: green; font-size: 10px;"></i>
                                @endif

                             </td>

                            @can("agent")
                            <td>
                                <button class="btn btn-link" wire:click="goEditEmployee({{ $employee->id }})"><i
                                        style="color: green" class="far fa-edit"></i></button>
                                <button class="btn btn-link" wire:click="confirmDelete({{ $employee->id }})"><i
                                        style="color: red" class="far fa-trash-alt"></i></button>
                            </td>
                            @endcan

                        </tr>
                    @endforeach
                        
                </tbody>
            </table>
        </div>

        <div class="card-footer" style="float: right">
            <div class="float-right">
                {{ $employees->links() }}

            </div>
            <div style="padding: 15px">
                <ul>
                    <li style="font-weight: bold;"> Congé<i class="fas fa-circle" style="color: turquoise; font-size: 10px;"></i></li>
                    <li style="font-weight: bold;">Mission<i class="fas fa-circle" style="color: navy; font-size: 10px;"></i></li>
                    <li style="font-weight: bold;">Permission<i class="fas fa-circle" style="color: gray; font-size: 10px;"></i></li>
                    <li style="font-weight: bold;">Sortie Personnel<i class="fas fa-circle" style="color: orange; font-size: 10px;"></i></li>
                    <li style="font-weight: bold;">Répos Médicale<i class="fas fa-circle" style="color: red; font-size: 10px;"></i></li>
                    <li style="font-weight: bold;">Présent(e)<i class="fas fa-circle" style="color: green; font-size: 10px;"></i></li>
                </ul>
            </div>
        </div>

    </div>
