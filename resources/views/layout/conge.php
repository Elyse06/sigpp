
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #3A6166;
        }

        h1 {
            text-align: center;
            color:#4A8B2C;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            float: left;
        }
        
        section {
            max-width: 400px;
            margin: 10 auto;
            float: left;
        }


        /* Utilisation de la grille CSS pour aligner les étiquettes à gauche des champs de saisie */
        .form-group {
            display: grid;
            grid-template-columns: 120px 1fr;
            grid-column-gap: 0px;
            align-items: center;
            margin-bottom: 20px;
            
        }
        .form-damy {
    display: grid;
    grid-template-columns: 1fr 120px; /* Inversez l'ordre des colonnes */
    grid-column-gap: 0px;
    align-items: center;
    margin-bottom: 20px;
}


        label {
            text-align: left;
            color: white;
            font-size: 15px;
            line-height: 1.5;


        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%; /* Largeur de tous les champs de saisie */
            height: 10px; /* Hauteur de tous les champs de saisie */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            height: 30px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
           
        }
        table {
            border-collapse: collapse;
            width: 50%;
            float: right;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: right;
        }

        th {
            background-color: #4A8B2C;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            justify-content: flex-start; /* Place le contenu du formulaire à gauche */
            align-items: flex-start; /* Alignement en haut */
        }

        .table-container {
            flex-grow: 1; /* Permet au tableau de prendre tout l'espace restant */
            float: right;
        }

    </style>
</head>
<body>
    <h1>Congé</h1>
    
    <form action="traitement.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="fonction">Fonction</label>
            <input type="text" id="fonction" name="fonction" required>
        </div>
        
        <div class="form-group">
                <label for="soldemois">Solde du mois</label>
                <input type="number" id="soldemois" name="soldemois" value="30" required>
            </div>
        <div class="form-group">
                <label for="soldeEffectue">Solde effectué</label>
                <input type="number" id="soldeEffectue" name="soldeEffectue" value="0" required>
            </div>
            <div class="form-group">
                <label for="soldeRestant">Solde restant</label>
                <input type="number" id="soldeRestant" name="soldeRestant" value="0" required>
            </div>

        <!-- Ajoutez les champs "Date début" et "Date fin" avec le format par défaut -->
        <div class="form-group">
            <label for="dateDebut">Date début</label>
            <input type="nombre" id="dateDebut" name="dateDebut" placeholder="dd/jj/aaaa" required>
        </div>

        <div class="form-group">
            <label for="dateFin">Date fin</label>
            <input type="nombre" id="dateFin" name="dateFin" placeholder="dd/jj/aaaa" required>
        </div>
 

        <div class="form-group">
            <label for="departement">Département</label>
            <select id="departement" name="departement" required>
                <option value="departement1">Ressources Humaines</option>
                <option value="departement2">Informatique</option>
                <option value="departement3">Acceuil</option>
            </select>
        </div>

        <div class="form-group">
            <label for="motif">Motif</label>
            <select id="motif" name="motif" required>
                <option value="Matérnité">Matérnité</option>
                <option value="Paternité">Paternité</option>
                <option value="Parental">Parental</option>
                <option value="Maladie">Maladie</option>
                <option value="congé annuel payé">congé annuel payé</option>
            </select>
        </div>

        <div>
            <button type="submit">Enregistrer</button>
        </div>
</form>
<section>

</section>
<script>
        // JavaScript pour formater les champs de date par défaut
        document.addEventListener("DOMContentLoaded", function () {
            const dateDebutInput = document.getElementById("dateDebut");
            const dateFinInput = document.getElementById("dateFin");

            // Mettez à jour le format par défaut des champs de date
            dateDebutInput.value = "dd/jj/aaaa";
            dateFinInput.value = "dd/jj/aaaa";

            // Gérez l'événement focus pour effacer le texte par défaut
            dateDebutInput.addEventListener("focus", function () {
                if (dateDebutInput.value === "dd/jj/aaaa") {
                    dateDebutInput.value = "";
                }
            });

            dateFinInput.addEventListener("focus", function () {
                if (dateFinInput.value === "dd/jj/aaaa") {
                    dateFinInput.value = "";
                }
            });
        });
    </script>
</body>
</html>




