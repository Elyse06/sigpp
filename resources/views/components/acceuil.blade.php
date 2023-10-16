<!DOCTYPE html>
<html>
<head>
  <title>Diagramme Circulaire</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelinetvr./npm/chartjs-plugin-datalabels"></script>
  
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <div id="accueil" class="content-section w-100">
    <div class="card card-danger">
      <div style="background-color:#315358;text-align:center;font-weight:bold;animation: slide 5s linear infinite;" class="card-header">Statut des employées
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <style>
        .card-body {
          background-color: #FFFFFF;
        }
      </style>
      <div class="card-body">
        <canvas id="pieChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 100%;" width="334" height="250" class="chartjs-render-monitor"></canvas>
      </div>
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

      // Initialisation avec des données vides
      var data = {
        labels: [],
        datasets: [{
          data: [],
          backgroundColor: []
        }]
      };
      var myPieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugin: {
            datalabels: {
                formatter: (value, context) => {
                    var total = context.dataset.data.reduce((acc, cur) => acc + cur, 0);
                    var percentage = ((value / total) * 100).toFixed(1) + "%";
                    return percentage;
                },
                color: 'white',
                backgroundColor: 'black',
                anchor: 'center'
            }
        }
    }
});


      // Fonction pour définir les couleurs des libellés
      function labelColor(context) {
        var index = context.dataIndex;
        var labelsColors = ['white', 'white', 'white', 'white', 'white', 'white'];
        return {
          color: labelsColors[index],
          backgroundColor: 'black'
        };
      }

      // Exemple de fonction pour mettre à jour le graphique avec des données dynamiques
      function updateChartWithDynamicData() {
    // Obtenez les nouvelles données ici
    var newLabels = ['Présent', 'Congé', 'Mission', 'Permission', 'Répos médicale', 'Sortie Personnel'];
    var newValues = [65, 8, 10, 7, 5, 5];
    var newColors = ['green', 'turquoise', 'navy', 'gray', 'red', 'orange'];

    // Calculez le total des nouvelles valeurs
    var total = newValues.reduce((acc, cur) => acc + cur, 0);

    // Calculez les pourcentages
    var percentages = newValues.map(value => ((value / total) * 100).toFixed(1) + "%");

    // Créez un tableau de libellés avec les pourcentages
    var labelsWithPercentages = newLabels.map((label, index) => label + " (" + percentages[index] + ")");

    // Mettez à jour les données du graphique
    myPieChart.data.labels = labelsWithPercentages;
    myPieChart.data.datasets[0].data = newValues;
    myPieChart.data.datasets[0].backgroundColor = newColors;

    // Mettez à jour le graphique
    myPieChart.update();
}


      // Appelez la fonction pour mettre à jour le graphique avec les données dynamiques
      updateChartWithDynamicData();
    });
  </script>

</body>
</html>

