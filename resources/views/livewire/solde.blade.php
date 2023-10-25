@extends('layouts.master')

@section('contenu')
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
    </style>



    <div class="row" style="width: 100%">
        <div class="col-12" style="width: 100%">
            <div class="card"style="width:100%">
                <div class="card-header" style="background-color:#4A8B2C">
                    <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes des personnelles
                    </h3>

                    <div class="card-tools d-flex align-items-center">

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

                <div class="card-body table-responsive p-0 table-striped" style="height: 100%;">
                    <table class="table table-head-fixed text-nowrap">


                        <thead>
                            <tr>
                                <th style="width:20%;">Nom</th>
                                <th style="width:20%;">Prenom</th>
                                <th style="width:15%;">Telephone</th>
                                <th style="width:15%;">Solde du conge</th>
                                <th style="width:15%;">Solde du permission</th>
                                <th style="width:15%;">Solde du sortie</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td> {{ $employee->nom }} </td>
                                    <td> {{ $employee->prenom }} </td>
                                    <td> {{ $employee->numTel }} </td>
                                    <td class="text-center"> {{ $employee->soldeConges->solde }} </td>
                                    <td class="text-center"> {{ $employee->soldePermissions->solde }} </td>
                                    <td class="text-center"> {{ $employee->soldeSorties->solde }} </td>

                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>


                <div class="card-footer">
                    <div class="float-right">

                        {{ $employees->links() }}

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
