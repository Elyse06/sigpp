<style>
    .card.card-primary {
      width: 100%;
      height: 400px; 
    }
  
    .form-group {
      display: grid;
      grid-template-columns: 120px 1fr;
      grid-column-gap: 0px;
      align-items: center;
      margin-bottom: 20px;
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
<h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'ajout d'une nouvelle Répos Médicale</h3>
</div>


<form role="form" wire:submit.prevent="addRepos()">
<div class="card-body">
<div class="form-group">
<label>N° Matricule Employeur</label>
<select style="width: 400px" wire:model = "newRepos.employee_id" class="form-control">
    <option value="">Tous les Employées</option>
    @foreach ($employees as $employee)
        <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
    @endforeach
</select>
{{-- <input type="number" wire:model = "newRepos.employee_id" value="1" class="form-control" required> --}}
</div>
<div class="form-group">
<label>Date de debut</label>
<input type="date" wire:model = "newRepos.debutrep" class="form-control" required>
</div>

<div class="form-group">
<label>Date du fin</label>
<input type="date" wire:model = "newRepos.finrep" class="form-control" required>
</div>

<div class="form-group">
<label>Motif</label>
<select style="width: 400px" class="form-control" wire:model = "newRepos.motifrep">
<option value="">------------</option>
<option value="Famille">Famille</option>
<option value="Vacance">Vacance</option>
<option value="Etude">Etude</option>
</select>
</div>
</div>

<div class="card-footer">
<button type="button" class="btn btn-danger" wire:click.prevent="retourListRepos()">Retour</button>  
<button type="submit" class="btn btn-primary">Enregistrer</button>

</div>
</form>
</div>

</div>





