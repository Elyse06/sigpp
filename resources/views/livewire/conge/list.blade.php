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
                <h3 style="color: white" class="card-title"><i class="fas fa-users fa-2x pr-1"></i>Listes personnelles en
                    Conge</h3>




                <div class="card-tools d-flex align-items-center">

                    @can("agent")
                        <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterConge()"><i
                            class="fas fa-plus pr-1"></i>Ajout une nouvelle</a>
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

            <div class="card-body table-responsive p-0 table-striped" style="height: 100%;">
                <table class="table table-head-fixed text-nowrap">


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
                            @can("agent")
                                <th style="width:20%;">Action</th>
                            @endcan
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($conges as $conge)
                            <tr>
                                <td> {{ $conge->emploie->nom }} </td>
                                <td> {{ $conge->emploie->prenom }} </td>
                                <td> {{ $conge->emploie->numTel }} </td>
                                <td> {{ $conge->motifcon }} </td>
                                <td class="text-center"> {{ $conge->sldtotcon }} </td>
                                <td class="text-center"> {{ $conge->sldeffcon }} </td>
                                <td class="text-center"> {{ $conge->sldrstcon }} </td>
                                <td> {{ $conge->debutcon }} </td>
                                <td> {{ $conge->fincon }} </td>
                                @can("agent")
                                    <td>
                                        <button class="btn btn-link" wire:click="goEditConge({{ $conge->id }})"><i
                                                style="color: green" class="far fa-edit"></i></button>
                                        <button class="btn btn-link" wire:click="confirmDelete({{ $conge->id }})"><i
                                                style="color: red" class="far fa-trash-alt"></i></button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>


        <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <!-- Trois boutons avec des classes pour la mise en forme -->
                <a href="{{ route('planning.conge') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.conge') }}"> <div style="color: white;">Actuelle</div></a>
                <a href="{{ route('planning.conge.moi') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.conge.moi') }}"><div style="color: white;">Mensuel</div></a>
                <a href="{{ route('planning.conge.anne') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.conge.anne') }}"><div style="color: white;">Annuel</div></a>
                <a href="{{ route('planning.conge.tout') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.conge.tout') }}"><div style="color: white;">Tous Les congés</div></a>
            </div>

            <!-- Bouton flottant à droite -->
            <div class="float-right" style="margin-top: 15px">
                {{ $conges->links() }}
            </div>
        </div>



</div>
</div>

</div>

</div>
</div>


