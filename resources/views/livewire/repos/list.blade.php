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
                    Répos</h3>
                <div class="card-tools d-flex align-items-center">
                    @can("agent")
                        <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goAjouterRepos()"><i
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
                            <th style="width:10%;">Date début</th>
                            <th style="width:10%;">Date fin</th>
                            @can("agent")
                                <th style="width:20%;">Action</th>
                            @endcan
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($reposs as $repos)
                            <tr>
                                <td> {{ $repos->emploie->nom }} </td>
                                <td> {{ $repos->emploie->prenom }} </td>
                                <td> {{ $repos->emploie->numTel }} </td>
                                <td> {{ $repos->motifrep }} </td>
                                <td> {{ $repos->debutrep }} </td>
                                <td> {{ $repos->finrep }} </td>
                                @can("agent")
                                    <td>
                                        <button class="btn btn-link" wire:click="goEditRepos({{ $repos->id }})"><i
                                                style="color: green" class="far fa-edit"></i></button>
                                        <button class="btn btn-link" wire:click="confirmDelete({{ $repos->id }})"><i
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
                    <a href="{{ route('planning.repos') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.repos') }}">
                        <div style="color: white;">Actuelle</div>
                    </a>
                    <a href="{{ route('planning.repos.moi') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.repos.moi') }}">
                        <div style="color: white;">Mensuel</div>
                    </a>
                    <a href="{{ route('planning.repos.anne') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.repos.anne') }}">
                        <div style="color: white;">Annuel</div>
                    </a>
                    <a href="{{ route('planning.repos.tout') }}" style="width: 150px;" class="btn btn-info mr-2 {{ setMenuActive('planning.repos.tout') }}">
                        <div style="color: white;">Tous Les repos</div>
                    </a>
                </div>

                <!-- Bouton flottant à droite -->
                <div class="float-right" style="margin-top: 15px">
                    {{ $reposs->links() }}
                </div>
            </div>



        </div>
    </div>

</div>

</div>
</div>
