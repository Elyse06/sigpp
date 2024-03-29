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
        .form {
      display: grid;
      grid-template-columns: 120px 1fr;
      
    }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 400px; /* Largeur de tous les champs de saisie */
        }
        .card-footer button {
    width:120px; /* Ajustez la valeur en fonction de la taille souhaitée */
  }

  </style>

<div class="row">

    <div class="card card-primary">
    <div style="background-color:#4A8B2C" class="card-header">
    <h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'edition Permission</h3>
    </div>
    
    
    <form role="form" wire:submit.prevent="updatePermission()">
    <div class="card-body">
    <div class="form-group">
    <label>Nom</label>
    <select style="width: 400px" wire:model = "editPermission.employee_id" class="form-control" wire:change="getSoldeByEmployeeIdEdit">
        <option value="">Tous les Employées</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    <label>Date de debut</label>
    <input type="date" wire:model = "editPermission.debutpermi" class="form-control" required wire:change="getSoldeByEmployeeIdEdit">
    </div>
    
    <div class="form-group">
    <label>Date du fin</label>
    <input type="date" wire:model = "editPermission.finpermi" class="form-control" required wire:change="getSoldeByEmployeeIdEdit">
    </div>

    <div class="form-group">
        <label>Solde du mois</label>
        <input type="number" wire:model = "editPermission.sldtotpermi" value="1" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label>Total Prix</label>
        <input type="number" wire:model = "editPermission.sldeffpermi" value="1" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label>Solde restant</label>
        <input type="number" wire:model = "editPermission.sldrstpermi" value="1" class="form-control" required readonly>
    </div>
    
    <div class="form-row" >
        <div class="col-md-6">
            <div class="form">
                <label >Motif</label>
                <select class="form-control" wire:model = "editPermission.motifpermi">
                    <option value="">------------</option>
                    <option value="Famille">Famille</option>
                    <option value="Vacance">Vacance</option>
                    <option value="Etude">Etude</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form" >
                <label style="margin-right: 5px;">Autres</label>
                <input style="width: 300px;" type="text" class="form-control" placeholder="Entrez autre motif ici" wire:model = "editPermission.motifpermi">
            </div>
        </div>
    </div>
    
    <div class="card-footer">
    <button type="button" class="btn btn-danger" wire:click.prevent="retourListPermission()">Retour</button>    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    
    </div>
    </form>
    </div>
    
    </div>
