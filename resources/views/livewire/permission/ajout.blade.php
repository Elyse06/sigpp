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
            width: 400px; /* Largeur de tous les champs de saisie */
        }
        .card-footer button {
    width:120px; /* Ajustez la valeur en fonction de la taille souhaitée */
  }

  </style>
<div class="row">

<div class="card card-primary">
<div style="background-color:#4A8B2C" class="card-header">
<h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'ajout d'une nouvelle permission</h3>
</div>


<form role="form" wire:submit.prevent="addPermission()">
<div class="card-body">
<div class="form-group">
<label>Nom</label>
<select style="width: 400px" wire:model = "newPermission.employee_id" class="form-control">
    <option value="">Tous les Employées</option>
    @foreach ($employees as $employee)
        <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
    @endforeach
</select>
{{-- <input type="number" wire:model = "newPermission.employee_id" value="1" class="form-control" required wire:change="getSoldeByEmployeeId"> --}}
</div>

<div class="form-group">
<label>Date de debut</label>
<input type="date" wire:model = "newPermission.debutpermi" class="form-control" required>
</div>

<div class="form-group">
<label>Date du fin</label>
<input type="date" wire:model = "newPermission.finpermi" class="form-control" wire:change="getSoldeByEmployeeId" required>
</div>

<div class="form-group">
    <label>Solde du mois</label>
    <input type="number" wire:model = "newPermission.sldtotpermi" class="form-control" required readonly>
</div>

<div class="form-group">
    <label>Total Prix</label>
    <input type="number" wire:model = "newPermission.sldeffpermi" value="1" class="form-control" required readonly>
</div>

<div class="form-group">
    <label>Solde restant</label>
    <input type="number" wire:model = "newPermission.sldrstpermi" value="1" class="form-control" required readonly>
</div>

<div class="form-row" >
    <div class="col-md-6">
        <div class="form">
            <label >Motif</label>
            <select class="form-control" wire:model = "newPermission.motifpermi">
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
            <input style="width: 300px;" type="text" class="form-control" placeholder="Entrez autre motif ici" wire:model = "newPermission.motifpermi">
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



