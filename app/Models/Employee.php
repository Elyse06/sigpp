<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_de_naissance',
        'adresse',
        'numTel',
        'pin',
    ];
    
    public function users(){
        return $this->hasOne(User::class);
    }

    public function conges(){
        return $this->hasMany(Conge::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function repomedicals(){
        return $this->hasMany(RepoMedical::class);
    }

    public function sortieperso(){
        return $this->hasMany(SortiePersonnel::class);
    }

    public function missions(){
        return $this->belongsToMany(Mission::class, "mission_employees", "employee_id", "mission_id");
    }
}
