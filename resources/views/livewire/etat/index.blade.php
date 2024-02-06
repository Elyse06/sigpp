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

<body >

    <div id="accueil" class="content-section w-100">
        <div class="card card-danger">
            <div style="background-color:#315358;float:left;  font-weight: bold;font-size:150%;padding:5px;position:relative" class="card-header">Statut des employées

                <div style="float: right">
                    <a style="width:80px; font-size: 12px;" href="{{ route('planning.etat') }}" class="btn btn-secondary">Ce jour</a>
                    <button class="damy bg-primary" id="showDatePicker" style="font-size:50%;height:32px;border-radius:4px;">filtrage par date</button>
                   
                </div>
            </div>
            <div style="position: relative; " >
                <div style="position: absolute; top: 1px; right: 5px; z-index: 999;background-color:#315358">
                    <form id="dateForm" method="get" action="{{ route('planning.etat') }}" style="width:70%; display: none; padding: 10px; float: right;">
                        @csrf
                        <div style="float: right; border: 1px solid #ccc; padding: 10px;">
                            <div class="form-group" style="display: flex; align-items: center;">
                                <label style="font-size: 13px;color:white; text-align: right; width: 100px; margin-right: 10px;" for="dateDebut">Date de début :</label>
                                <input style="width: 200px;" type="date" name="dateDebut" id="dateDebut" class="form-control" value="$dateDebut">
                            </div>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <label style="font-size: 13px;color:white;  text-align: right; width: 100px; margin-right: 10px;" for="dateFin">Date de fin :</label>
                                <input style="width: 200px;" type="date" name="dateFin" id="dateFin" class="form-control" value="$dateFin">
                            </div>
                            <button style="margin-top: 10px; width: 80px; font-size: 12px; float: right;" type="submit" class="btn btn-primary">Filtrer</button>
                        </div>
                    </form>
                </div>
                        
            <script>
                document.getElementById('showDatePicker').addEventListener('click', function() {
                    var form = document.getElementById('dateForm');
                    if (form.style.display === 'none' || form.style.display === '') {
                        form.style.display = 'block';
                    } else {
                        form.style.display = 'none';
                    }
                });
            </script>
 
            <style>
                .card-body {
                    background-color: #FFFFFF;
                    height: 30%;

                }
            </style>
            <div>
            <div class="card-body" id="chartContainer">
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
            ")" + " : " + newValues [index] + "/" + {{ $total_count }});

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
