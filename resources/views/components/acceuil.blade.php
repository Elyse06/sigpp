<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
        margin-left: 150px;/* Ajoute une marge supérieure de 20px */
      }
    </style>
    

</head>

<body>

    <div class="small-box" style="background-color: turquoise">
        <div class="inner">
            <h3 style="color: white">Top 10</h3>
            <p style="color: white">Congé</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
    </div>


    <div class="small-box" style="background-color: navy">
        <div class="inner">
            <h3 style="color: white">Top 10</h3>
            <p style="color: white">Mission</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
    </div>


    <div class="small-box" style="background-color: gray">
        <div class="inner">
            <h3 style="color: white">Top 10</h3>
            <p style="color: white">Permission</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
    </div>


    <div class="small-box" style="background-color: red">
        <div class="inner">
            <h3 style="color: white">Top 10</h3>
            <p style="color: white">Répos Medical</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
    </div>


    <div class="small-box" style="background-color: yellow">
        <div class="inner">
            <h3 style="color: white">Top 10</h3>
            <p style="color: white">Sortie personnel</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    
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


    <script>
        // Données du graphique (exemples)
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Juin', 'Jul', 'Aout', 'Sept', 'oct', 'Nov', 'Des'],
            datasets: [{
                    label: 'Congé',
                    data: [10, 15, 7, 12, 9, 5, 4, 7, 6, 11, 13, 3],
                    backgroundColor: 'turquoise',
                    borderColor: 'turquoise',
                    borderWidth: 1
                },
                {
                    label: 'Mission',
                    data: [10, 15, 7, 12, 9, 5, 4, 7, 6, 11, 13, 3],
                    backgroundColor: 'navy',
                    borderColor: 'navy',
                    borderWidth: 1
                },
                {
                    label: 'Permission',
                    data: [10, 15, 7, 12, 9, 5, 4, 7, 6, 11, 13, 3],
                    backgroundColor: 'gray',
                    borderColor: 'gray',
                    borderWidth: 1
                },
                {
                    label: 'Répos Medical',
                    data: [10, 15, 7, 12, 9, 5, 4, 7, 6, 11, 13, 3],
                    backgroundColor: 'red',
                    borderColor: 'red',
                    borderWidth: 1
                },
                {
                    label: 'Sortie Personnel',
                    data: [10, 15, 7, 12, 9, 5, 4, 7, 6, 11, 13, 3],
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

</body>

</html>
