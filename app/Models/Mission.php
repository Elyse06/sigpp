<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $dates = ['expires_at'];

    protected $fillable = [
        'lieumis',
        'debutmis',
        'finmis',
        'motifmis',
        'vehicule_id',
        'expires_at',
    ];

    public function emploie(){
        return $this->belongsToMany(Employee::class, "mission_employees", "mission_id", "employee_id");
    }

    public function vehicules(){
        return $this->belongsTo(Vehicule::class, "vehicule_id", "id");
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($mission) { // before delete() method call this
             $mission->emploie()->detach();
        });
    }
}
