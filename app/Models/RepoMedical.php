<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepoMedical extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'debutrep',
        'finrep',
        'motifrep',
    ];




    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
