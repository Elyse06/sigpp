<style>
    .card.card-primary {
      width: 100%;
      height: 525px; 
      
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
        input[type="date"],
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

<div class="row p-4 pt-5">

    <div class="card card-primary">
    <div style="background-color: #4A8B2C" class="card-header">
    <h3 class="card-title"><i class="fas fa-plus pr-2"></i>Formulaire d'édition mission</h3>
    </div>
    
    
    <form role="form" wire:submit.prevent="updateMission()">
    <div class="card-body">
    <div class="form-group">
    <label>Nom</label>
    <select style="width: 400px" wire:model = "editMission.employee_id" class="form-control">
        <option value="">Tous les Employées</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
        @endforeach
    </select>
    {{-- <input type="number" wire:model = "editMission.employee_id" class="form-control" required> --}}
    </div>
    <div class="form-group">
        <label>N° Matricule Vehicule</label>
        <select style="width: 400px" wire:model = "editMission.employee_id" class="form-control">
        <option value="">Tous les Employées</option>
        @foreach ($vehicules as $vehicule)
            <option value="{{ $vehicule->id }}">{{ $vehicule->plaque_immatriculation }}</option>
        @endforeach
    </select>
        {{-- <input type="number" wire:model = "editMission.vehicule_id" class="form-control" required> --}}
    </div>
        
    <div class="form-group">
    <label>Date de debut</label>
    <input type="date" wire:model = "editMission.debutmis" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label>Date du fin</label>
    <input type="date" wire:model = "editMission.finmis" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label>Lieu</label>
    <input type="text" wire:model = "editMission.lieumis" class="form-control" required>
    </div>
 
<div class="form-row" >
    <div class="col-md-6">
        <div class="form">
            <label >Motif</label>
            <select class="form-control" wire:model = "editMission.motifmis">
                <option value="">------------</option>
                <option value="Famille">Famille</option>
                <option value="Vacance">Vacance</option>
                <option value="Etude">Etude</option>
                <option value="formation">Formation</option>
            </select>
        </div>
    </div>



    </div>
    
    <div class="card-footer">
    <button type="button" class="btn btn-danger" wire:click.prevent="retourListMis()">Retour</button>    
    <button type="submit" class="btn btn-primary">Modifier</button>
   
    </div>
    </form>
    </div>
    
    </div>
