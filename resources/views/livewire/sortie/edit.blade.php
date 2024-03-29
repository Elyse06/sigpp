<style>
    .card.card-primary {
      width: 100%;
      height: 565px; 
      
      /* Vous pouvez également spécifier une largeur maximale si nécessaire */
      /* max-width: 1200px; */
    }
    .form-group {
            display: grid;
            grid-template-columns: 120px 1fr;
            grid-column-gap: 0px;
            align-items: center;
            margin-bottom: 20px;
            
        }
        input[type="text"],
        input[type="number"],
        input[type="datetime-local"],
        select {
            width: 400px; /* Largeur de tous les champs de saisie */
        }
        
        .card-footer button {
    width:120px; /* Ajustez la valeur en fonction de la taille souhaitée */
  }
  .form {
      display: grid;
      grid-template-columns: 120px 1fr;
      
    }
  </style>

<div class="row">

    <div class="card card-primary">
    <div style="background-color:#4A8B2C" class="card-header">
    <h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'edition Sortie Personnel</h3>
    </div>
    
    
    <form role="form" wire:submit.prevent="updateSortie()">
    <div class="card-body">
    <div class="form-group">
    <label>Nom</label>
    <select style="width: 400px" wire:model = "editSortie.employee_id" class="form-control" wire:change="getSoldeByEmployeeIdEdit">
        <option value="">Tous les Employées</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    <label>Date de debut</label>
    <input type="datetime-local" wire:model = "editSortie.debutsortie" class="form-control" required wire:change="getSoldeByEmployeeIdEdit">
    </div>
    
    <div class="form-group">
    <label>Date du fin</label>
    <input type="datetime-local" wire:model = "editSortie.finsortie" class="form-control" required wire:change="getSoldeByEmployeeIdEdit">
    </div>

    <div class="form-group">
        <label>Solde du mois</label>
        <input type="number" wire:model = "editSortie.sldtotsortie" value="1" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label>Total Prix</label>
        <input type="number" wire:model = "editSortie.sldeffsortie" value="1" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label>Solde restant</label>
        <input type="number" wire:model = "editSortie.sldrstsortie" value="1" class="form-control" required readonly>
    </div>
    
     
    <div class="form-group" >

                <label >Motif</label>
                <input  type="text" class="form-control" placeholder="Entrez votre motif ici" wire:model = "editSortie.motifsortie">
 
            </div>
    <div class="card-footer">
    <button type="button" class="btn btn-danger" wire:click.prevent="retourListSortie()">Retour</button>    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    
    </div>
    </form>
    </div>
    
    </div>
    

    