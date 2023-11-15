@extends("layouts.master")

@section("contenu")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
        }
    
        .box-container {
            display: flex;
            flex-direction: column;
            align-items: center;

        }
    
        .small-box {
            width: 150px;
            height: 100px;
            margin: 10px;
            transition: none;
        }
        .hidden-list {
        max-height: 500px; /* Définissez la hauteur maximale que vous souhaitez pour le défilement */
        overflow-y: auto; /* Ajoutez un défilement vertical si nécessaire */
        display: none; /* Masquez la liste par défaut */
    }
    
        .small-box-footer {
            margin-top: 1px; /* Ajustez la marge selon vos besoins */
            padding: 5px; /* Ajustez le padding selon vos besoins */
            color: white;
            text-align: center; /* Pour centrer le texte */
            text-decoration: none;
            display: inline-block;
            background-color: #3c8dbc; /* Couleur de fond du lien */
            border: 1px solid #367fa9; /* Bordure du lien */
            border-radius: 3px; /* Coins arrondis */
            transition: background-color 0.3s; /* Transition de la couleur de fond */
        }
    
        .small-box-footer:hover {
            background-color: #367fa9; /* Couleur de fond au survol */
        }
    
        #barChart {
            background-color: white;
            border-color: white;
            width: 100%;
            margin: 10px;
        }
    
        .hidden-list {
        display: none;
    }
        .chart-container {
        margin-top: 90px; /* Vous pouvez ajuster la valeur en fonction de la quantité d'espace souhaitée */
    }
    </style>
    
    
 <div class="flex-container">
        {{-- Box conge --}}
        <div class="small-box conge-box" style="background-color: turquoise">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Congé</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('top.conge') }}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <!-- Déplacez la liste ul ici -->
            <ul class="hidden-list" style="overflow-y: auto; color:white">
                @foreach ($topEmployeesCon as $employee)
                    <li>{{ $employee->emploie->nom }} ({{ $employee->conge_count }})</li>
                @endforeach
            </ul>
        </div>
        
        {{-- Box mission --}}
        <div class="small-box mission-box" style="background-color: navy">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Mission</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('top.mission') }}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list" style="color: white">
                
                @foreach ($topEmployeesMission as $employee)
                    <li>{{ $employee->nom }} ({{ $employee->mission_count }})</li>
                @endforeach
                
            </ul>
        </div>
    
        {{-- Box permission --}}
        <div class="small-box permission-box" style="background-color: gray">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Permission</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('top.permission') }}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list" style="color: white">
                
                @foreach ($topEmployeesPermi as $employee)
                    <li>{{ $employee->emploie->nom }} ({{ $employee->permission_count }})</li>
                @endforeach
                
            </ul>
        </div>
    
        {{-- Box repos --}}
        <div class="small-box repos-box" style="background-color: red">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Répos Medical</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('top.repos') }}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list" style="color: white">
                
                @foreach ($topEmployeesRep as $employee)
                    <li>{{ $employee->emploie->nom }} ({{ $employee->repos_count }})</li>
                @endforeach
                
                
            </ul>
        </div>
    
        {{-- Box sortie --}}
        <div class="small-box sortie-box" style="background-color: yellow">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Sortie personnel</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('top.sortie') }}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list" style="color: white">
                
                @foreach ($topEmployeesSortie as $employee)
                    <li>{{ $employee->emploie->nom }} ({{ $employee->sortie_count }})</li>
                @endforeach
                
            </ul>
        </div>
    </div>    

        {{-- Graphe --}}
        <div class="chart-container w-100" style="background-color: #315358">
        <div class="card card w-100">
            <div class="card-header w-100" style="background-color: #315358;float:left;  font-weight: bold; color:white;">Statistique des employées
            <div class="card-tools w-100">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" style="float: right;color:white;">
            <i class="fas fa-minus"></i>
            </button>

            </div>
            </div>
            <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class="">
                    </div>
                </div>
                <div class="chartjs-size-monitor-shrink"><div class="">
                    </div>
                </div>
            </div>
            <canvas id="barChart" style="min-height: 260px; height: 260px; max-height: 260px; max-width: 100%; display: block; width: 100%;" width="280" height="260" class="barchart-canvas"></canvas>
            </div>
            </div>
        
        </div>
    </div>
   
            
   

    {{-- Script pour le grephe --}}
    <script>
        // Données du graphique (exemples)
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Juin', 'Jul', 'Aout', 'Sept', 'oct', 'Nov', 'Des'],
            datasets: [{
                    label: 'Congé',
                    data: [{{ $c_jan }}, {{ $c_fev }}, {{ $c_mar }}, {{ $c_avr }}, {{ $c_mai }}, {{ $c_jun }}, {{ $c_jul }}, {{ $c_aou }}, {{ $c_sep }}, {{ $c_oct }}, {{ $c_nov }}, {{ $c_dec }}],
                    backgroundColor: 'turquoise',
                    borderColor: 'turquoise',
                    borderWidth: 1
                },
                {
                    label: 'Mission',
                    data: [{{ $m_jan }}, {{ $m_fev }}, {{ $m_mar }}, {{ $m_avr }}, {{ $m_mai }}, {{ $m_jun }}, {{ $m_jul }}, {{ $m_aou }}, {{ $m_sep }}, {{ $m_oct }}, {{ $m_nov }}, {{ $m_dec }}],
                    backgroundColor: 'navy',
                    borderColor: 'navy',
                    borderWidth: 1
                },
                {
                    label: 'Permission',
                    data: [{{ $p_jan }}, {{ $p_fev }}, {{ $p_mar }}, {{ $p_avr }}, {{ $p_mai }}, {{ $p_jun }}, {{ $p_jul }}, {{ $p_aou }}, {{ $p_sep }}, {{ $p_oct }}, {{ $p_nov }}, {{ $p_dec }}],
                    backgroundColor: 'gray',
                    borderColor: 'gray',
                    borderWidth: 1
                },
                {
                    label: 'Répos Medical',
                    data: [{{ $r_jan }}, {{ $r_fev }}, {{ $r_mar }}, {{ $r_avr }}, {{ $r_mai }}, {{ $r_jun }}, {{ $r_jul }}, {{ $r_aou }}, {{ $r_sep }}, {{ $r_oct }}, {{ $r_nov }}, {{ $r_dec }}],
                    backgroundColor: 'red',
                    borderColor: 'red',
                    borderWidth: 1
                },
                {
                    label: 'Sortie Personnel',
                    data: [{{ $s_jan }}, {{ $s_fev }}, {{ $s_mar }}, {{ $s_avr }}, {{ $s_mai }}, {{ $s_jun }}, {{ $s_jul }}, {{ $s_aou }}, {{ $s_sep }}, {{ $s_oct }}, {{ $s_nov }}, {{ $s_dec }}],
                    backgroundColor: 'yellow',
                    borderColor: 'yellow',
                    borderWidth: 1
                }
            ]
        };

        // Configuration du graphique
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Création du graphique à barres
        var ctx = document.getElementById('barChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>

    {{-- script pour le box --}}
  <script>
$(document).ready(function() {
    // Cacher initialement la liste
    $('.hidden-list').hide();

    // Afficher le barchart au démarrage
    $('.barchart-canvas').show();

    // Variable pour suivre l'état des listes (ouvertes ou fermées)
    var isListOpen = false;

    // Gérer le survol sur le lien "plus d'info" dans les éléments small-box
    $('.small-box-footer').hover(function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du lien

        // Cacher tous les barcharts actifs
        $('.barchart-canvas').hide();

        // Cacher toutes les autres listes sauf celle survolée
        var otherLists = $('.hidden-list').not($(this).siblings('.hidden-list'));
        otherLists.slideUp();

        // Afficher la liste correspondante
        var list = $(this).siblings('.hidden-list');
        list.slideDown();

        // Calculer la hauteur de la liste et ajuster la position du barchart
        var listHeight = list.find('li').length * 20; // Taille approximative de chaque élément de la liste
        var marginTop = Math.min(listHeight, 200); // Limiter la hauteur maximale à 200px
        $('.chart-container').css('margin-top', marginTop + 90 + 'px');

        // Mettre à jour le bouton pour indiquer la réduction
        $(this).closest('.chart-container').find('.btn-tool i').removeClass('fa-minus').addClass('fa-plus');
        isListOpen = true;
    }, function() {
        $(this).siblings('.hidden-list').slideUp(); // Cacher la liste au survol
        $('.chart-container').css('margin-top', '90px'); // Réinitialiser la position du barchart
    });

    // Gérer le clic sur la liste pour réinitialiser le barchart
    $('.hidden-list').click(function() {
        $(this).slideUp();

        // Réinitialiser tous les barcharts
        $('.barchart-canvas').show();

        // Réinitialiser la position du barchart
        $('.chart-container').css('margin-top', '90px');

        // Mettre à jour le bouton pour indiquer l'agrandissement
        $('.btn-tool i').removeClass('fa-minus').addClass('fa-plus');
        isListOpen = false;
    });

    // Gérer le clic sur le bouton de fermeture du barchart
    $('.btn-tool').hover(function() {
        // Réinitialiser tous les barcharts
        $('.barchart-canvas').show();

        // Réinitialiser la position du barchart
        $('.chart-container').css('margin-top', '90px');

        // Mettre à jour le bouton pour indiquer l'agrandissement
        $(this).find('i').toggleClass('fa-minus fa-plus');
        isListOpen = !isListOpen;
    });

    // Fonction pour mettre à jour le bouton lorsque toutes les listes sont fermées
    function updateButtonState() {
        var allListsClosed = $('.hidden-list').toArray().every(function(list) {
            return $(list).is(':hidden');
        });

        if (allListsClosed) {
            $('.btn-tool i').removeClass('fa-minus').addClass('fa-plus');
            isListOpen = false;
        }
    }

    // Vérifier l'état initial des listes et mettre à jour le bouton
    updateButtonState();

    // Vérifier l'état des listes lorsque le survol est terminé
    $('.chart-container').mouseleave(function() {
        updateButtonState();
    });
});

    </script>

    
    
@endsection

