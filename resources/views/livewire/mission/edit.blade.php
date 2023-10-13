<div class="row p-4 pt-5">

    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-plus"></i>Formulaire d'édition mission</h3>
    </div>
    
    
    <form role="form" wire:submit.prevent="updateMission()">
    <div class="card-body">
    <div class="form-group">
    <label>Id Employée</label>
    <input type="text" wire:model = "editMission.employee_id" class="form-control" required>
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
    
    <div class="form-group">
    <label>Motif</label>
    <select class="form-control" wire:model = "editMission.motifmis">
    <option value="">------------</option>
    <option value="vente">Vente</option>
    <option value="Achat d'une matérielle">Achat d'une matérielle</option>
    <option value="Recrutement">Recrutement</option>
    </select>
    </div>
    
    <div class="form-group">
    <label>Id vehicule</label>
    <input type="text" wire:model = "editMission.vehicule_id" class="form-control" required>
    </div>
    
    </div>
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="button" class="btn btn-danger" wire:click.prevent="retourListMis()">Retour</button>
    </div>
    </form>
    </div>
    
    </div>
    
    <script>
        window.addEventListener("showSuccesMessage", event=>{
            Swal.fire({
                position: 'top-end',
                icon:'success',
                toast: true,
                title: event.detail.message || "Opération effectuer avec succès",
                showConfirmButton: false,
                timer: 5000
            })
        })
    </script>
    