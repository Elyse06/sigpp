<!DOCTYPE html>
<html>

<head>
    <title>Diagramme Circulaire</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelinetvr./npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
            .form-group{
      display: grid;
      grid-template-columns: 1fr 160px;
      
    }
    </style>
</head>

<body>

    <div id="accueil" class="content-section w-100">
        <div class="card card-danger">
            <div style="background-color:#315358;float:left;  font-weight: bold;font-size:200%;padding:5px;padding-top:20px " class="card-header">Statut des employées
                <button style="float:right;" type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
                                <div class="card-tools w-100" style="padding-top:4px;" >
                                

               
                <div>
                <form method="get" action="{{ route('planning.etat') }}">
                    @csrf
                    <div style="float:right" class="form-group">
                        <label style="float:right;margin-left:10px;font-size:100%;padding-top:4px" for="dateFin">Date de fin :</label>
                        <input style="margin-left: 20px,width:50px" type="date" name="dateFin" id="dateFin" class="form-control" value="$dateFin">
                        <a style="margin-top: 10px; ;width:80px;" href="{{ route('planning.etat') }}" class="btn btn-secondary">Ce jour</a>
                        <button style="margin-top: 10px;width:80px;" type="submit" class="btn btn-primary">Filtrer</button>

                    </div>
                    <div style="float:right" class="form-group">
                        <label style="font-size:100%;padding-top:4px" for="dateDebut">Date de début :</label>
                        <input style="margin-left: 10px,width:90px" type="date" name="dateDebut" id="dateDebut" class="form-control" value="$dateDebut">

                  
                    </div>


                </form>
            </div>
            </div>
            <style>
                .card-body {
                    background-color: #FFFFFF;
                    height: 30%;

                }
            </style>
            <div class="card-body">
                <canvas id="pieChart"
                    style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 100%;"
                    width="334" height="150" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>



</body>

</html>

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
            var labelsColors = ['black', 'black', 'black', 'black', 'black', 'black'];
            return {
                color: labelsColors[index],
                backgroundColor: 'black'
            };
        }

        // Exemple de fonction pour mettre à jour le graphique avec des données dynamiques
        function updateChartWithDynamicData() {
            //variable present
            var present = {{ $total_count }} - ({{ $conge_count }} + {{ $mission_count }} +
                {{ $permission_count }} + {{ $repos_count }} + {{ $sortie_count }});
            // Obtenez les nouvelles données ici
            var newLabels = ['Présent', 'Congé', 'Mission', 'Permission', 'Répos médicale', 'Sortie Personnel'];
            var newValues = [present, {{ $conge_count }}, {{ $mission_count }}, {{ $permission_count }},
                {{ $repos_count }}, {{ $sortie_count }}
            ];
            var newColors = ['green', 'turquoise', 'navy', 'gray', 'red', 'orange'];

            // Calculez le total des nouvelles valeurs
            var total = newValues.reduce((acc, cur) => acc + cur, 0);

            // Calculez les pourcentages
            var percentages = newValues.map(value => ((value / total) * 100).toFixed(1) + "%");

            // Créez un tableau de libellés avec les pourcentages
            var labelsWithPercentages = newLabels.map((label, index) => label + " (" + percentages[index] +
            ")");

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
