
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #315358;
            color: white;
        }

        h1 {
            text-align: center;
            color: #4A8B2C;
        }

        form {
            max-width: 700px;
            margin: 0 auto;
            float: left;
        }

        /* Utilisation de la grille CSS pour aligner les étiquettes à gauche des champs de saisie */
        .form-group {
            display: grid;
            grid-template-columns: 1fr 120px; /* Inversion des colonnes */
            grid-column-gap: 10px;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            text-align: left; /* Alignez le texte du label à droite */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%; /* Largeur de tous les champs de saisie */
            height: 20px; /* Hauteur de tous les champs de saisie */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        select {
            height: 30px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
            height: 30px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .damy {
            display: grid;
            grid-template-columns: 1fr 120px;
            grid-column-gap: 10px;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Congé</h1>
    
    <form action="traitement.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        
        <div class="form-group">
            <label for="fonction">Fonction :</label>
            <input type="text" id="fonction" name="fonction" required>
        </div>

        <div class="form-group">
            <label for="departement">Département :</label>
            <select id="departement" name="departement" required>
                <option value="departement1">Département 1</option>
                <option value="departement2">Département 2</option>
                <option value="departement3">Département 3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="departement">Motif :</label>
            <select id="motif" name="motif" required>
                <option value="departement1">Département 1</option>
                <option value="departement2">Département 2</option>
                <option value="departement3">Département 3</option>
            </select>
        </div>


        <div class="damy"> <!-- Utilisez la classe damy pour le label "Solde de mois" -->
            <label for="soldeMois">Solde de mois :</label>
            <input type="number" id="soldeMois" name="soldeMois" value="30" required>
        </div>
        <div>  
        <button type="submit">Enregistrer</button>
    </div> 
    </form>
</body>
</html>



