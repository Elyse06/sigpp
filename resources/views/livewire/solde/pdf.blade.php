<!DOCTYPE html>
<html>
<head>
    <title>Rapport PDF</title>
    <style>
        /* Ajoutez ici du CSS personnalisé pour le PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Listes des personnelles</h1>
    <table>
        <thead>
            <tr>
                <th style="width:15%;">Nom</th>
                <th style="width:15%;">Prenom</th>
                <th style="width:15%;">Telephone</th>
                <th style="width:15%;">Solde du conge</th>
                <th style="width:15%;">Solde du permission</th>
                <th style="width:15%;">Solde du sortie</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td> {{ $employee->nom }} </td>
                    <td> {{ $employee->prenom }} </td>
                    <td> {{ $employee->numTel }} </td>
                    <td class="text-center"> {{ $employee->soldeConges->solde }} </td>
                    <td class="text-center"> {{ $employee->soldePermissions->solde }} </td>
                    <td class="text-center"> {{ $employee->soldeSorties->solde }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
