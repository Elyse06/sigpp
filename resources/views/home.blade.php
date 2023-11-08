@extends("layouts.master")

@section("contenu")

    <x-acceuil />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
    
    
@endsection

