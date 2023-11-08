@extends("layouts.master")

@section("contenu")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    {{-- css du view --}}
    <style>
      /* Ajoutez de l'espace entre les éléments "Bounce Rate" */
      .inner {
        margin-bottom: 5px;
        /* Vous pouvez ajuster la valeur selon vos besoins */
      }
    
      /* Augmente la largeur de chaque élément "small-box" */
      .small-box {
        width: 180px;
        /* Vous pouvez ajuster la valeur selon vos besoins */
        margin: 10px;
      }
    
      #barChart {
        max-width: 100%; /* Ajustez la largeur en pourcentage selon vos besoins */
        background-color: white;
        /* Couleur jaune pour les barres */
        border-color: white;
        min-height: 250px;
        max-height: 250px;
        display: block;
        width: auto; /* Utilisez 'auto' pour que la largeur s'ajuste automatiquement */
      }
    
      .chartjs-size-monitor label,
      .chartjs-size-monitor-expand label,
      .chartjs-size-monitor-shrink label {
        color: white;
      }
    
      /* Style pour les données (data) */
      .chartjs-size-monitor span,
      .chartjs-size-monitor-expand span,
      .chartjs-size-monitor-shrink span {
        color: white;
      }
    
      .centered-element {
        display: flex;
        justify-content: center;
        /* Centre horizontalement */
        align-items: center;
        /* Centre verticalement */
        margin-top: 80px;
        margin-left: 150px;
      }

      .hidden-list {
          display: none;
      }
    </style>

        {{-- Box conge --}}
        <div class="small-box conge-box" style="background-color: turquoise">
            <div class="inner">
                <h3 style="color: white">Top 10</h3>
                <p style="color: white">Congé</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list">
                
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
            <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list">
                
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
            <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list">
                
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
            <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list">
                
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
            <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            <ul class="hidden-list">
                
                @foreach ($topEmployeesSortie as $employee)
                    <li>{{ $employee->emploie->nom }} ({{ $employee->sortie_count }})</li>
                @endforeach
                
            </ul>
        </div>
        
        {{-- Graphe --}}
        <div class="centered-element">
          
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
    
                </div>
                <div class="chartjs-size-monitor-shrink">
    
                </div>
            </div>
            <canvas id="barChart"
                style="min-height: 250px; max-height: 250px; max-width: 100%; display: block; width: 700px;"
                class="chartjs-render-monitor"></canvas>
    
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
        $('.conge-box').hover(function() {
            $(this).find('.hidden-list').slideDown();
        }, function() {
            $(this).find('.hidden-list').slideUp();
        });

        $('.mission-box').hover(function() {
            $(this).find('.hidden-list').slideDown();
        }, function() {
            $(this).find('.hidden-list').slideUp();
        })

        $('.permission-box').hover(function() {
            $(this).find('.hidden-list').slideDown();
        }, function() {
            $(this).find('.hidden-list').slideUp();
        })

        $('.repos-box').hover(function() {
            $(this).find('.hidden-list').slideDown();
        }, function() {
            $(this).find('.hidden-list').slideUp();
        })

        $('.sortie-box').hover(function() {
            $(this).find('.hidden-list').slideDown();
        }, function() {
            $(this).find('.hidden-list').slideUp();
        })
    </script>
    
    
@endsection

