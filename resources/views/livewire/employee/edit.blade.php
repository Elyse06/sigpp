<style>
    .card.card-primary {
        width: 100%;
        height: 565px;
    }

    .form-group {
        display: grid;
        grid-template-columns: 120px 1fr;
        grid-column-gap: 0px;
        align-items: center;
        margin-bottom: 20px;
    }
  
    .form {
      display: grid;
      grid-template-columns: 120px 1fr;
      
    }
    /* Classe pour les champs d'entrée spécifiques */
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
        width: 400px;
        /* Largeur de tous les champs de saisie */
    }

    .card-footer button {
        width: 120px;
        /* Ajustez la valeur en fonction de la taille souhaitée */
    }
</style>
<div class="row">

    <div class="card card-primary">
        <div style="background-color:#4A8B2C" class="card-header">
            <h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'edition d'Employée</h3>
        </div>


        <form role="form" wire:submit.prevent="editEmployee()">
            <div class="card-body">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" wire:model = "editEmployee.nom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Prenom</label>
                    <input type="text" wire:model = "editEmployee.prenom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="date" wire:model = "editEmployee.date_de_naissance" class="form-control" required>
                </div>


                <div class="form-group">
                    <label>Adresse</label>
                    <input type="text" wire:model = "editEmployee.adresse" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Numero de Telephone</label>
                    <input type="text" wire:model = "editEmployee.numTel" value="1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>PIN</label>
                    <input type="number" wire:model = "editEmployee.pin" value="1" class="form-control" required>
                </div>


            <div class="card-footer">
                <button type="button" class="btn btn-danger" wire:click.prevent="retourListEmployee()">Retour</button>
                <button type="submit" class="btn btn-primary">Modifier</button>

            </div>
        </form>
    </div>

</div>
