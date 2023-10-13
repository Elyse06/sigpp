<!DOCTYPE html>
<html>
<head>
  <title>Diagramme Circulaire</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  

  <div id="accueil" class="content-section w-100">
    <div class="card card-danger">
    <div  style="background-color:#315358;text-align:center;font-weight:bold;animation: slide 5s linear infinite;" class="card-header">Statut des employées
    <div  class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i  class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <style>
          .card-body{
            background-color:#FFFFFF;
          }
    </style>
    <div st  class="card-body">
    <canvas id="pieChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 100%;" width="334" height="250" class="chartjs-render-monitor"></canvas>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
$(document).ready(function() {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

    var data = {
        labels: ['Présent', 'Congé', 'Mission', 'Permission', 'Répos médicale', 'Sortie Personnel'],
        datasets: [{
            data: [65,8, 13, 7, 2, 5],
            backgroundColor: ['green', 'turquoise', 'navy', 'gray', 'red', 'orange']
        }]
    };

    // Fonction pour définir les couleurs des libellés
    function labelColor(context) {
        var index = context.dataIndex;
        var labelsColors = ['white', 'white', 'white', 'white', 'white', 'white']; // Couleurs des libellés
        return {
            color: labelsColors[index],
            backgroundColor: 'black' // Couleur de fond des libellés
        };
    }

    var myPieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'start',
                    formatter: labelColor // Utilisez la fonction labelColor pour définir la couleur
                }
            }
        }
    });
});


    </script>

</body>
</html>
