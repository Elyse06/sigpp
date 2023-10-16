@extends("layouts.master")

@section("contenu")

    <x-acceuil />

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
            //variable present
            var present = 150 - ({{$conge_count}}+{{$mission_count}}+{{$permission_count}}+{{$repos_count}}+{{$sortie_count}});
        // Obtenez les nouvelles données ici
        var newLabels = ['Présent', 'Congé', 'Mission', 'Permission', 'Répos médicale', 'Sortie Personnel'];
        var newValues = [present, {{$conge_count}}, {{$mission_count}}, {{$permission_count}}, {{$repos_count}}, {{$sortie_count}}];
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
    
@endsection

