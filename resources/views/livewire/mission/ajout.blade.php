<div class="row p-4 pt-5">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><i class="fas fa-plus"></i>Formulaire d'ajout d'une nouvelle mission</h3>
</div>


<form>
<div class="card-body">
<div class="form-group">
<label>Nom</label>
<input type="text" class="form-control" required>
</div>

<div class="form-group">
<label>Prénom</label>
<input type="text" class="form-control" required>
</div>

<div class="form-group">
<label>Date de debut</label>
<input type="date" class="form-control" required>
</div>

<div class="form-group">
<label>Date du fin</label>
<input type="date" class="form-control" required>
</div>

<div class="form-group">
<label>Lieu</label>
<input type="text" class="form-control" required>
</div>

<div class="form-group">
<label>Motif</label>
<select>
<option value="">------------</option>
<option value="vente">Vente</option>
<option value="Achat d'une matérielle">Achat d'une matérielle</option>
<option value="Recrutement">Recrutement</option>
</select>
</div>

</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Enregistrer</button>
<button type="button" class="btn btn-danger" wire:click.prevent="retourListMis()">Retour</button>
</div>
</form>
</div>

</div>