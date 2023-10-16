<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'sldtotcon',
        'sldeffcon',
        'sldrstcon',
        'debutcon',
        'fincon',
        'motifcon',
    ];


    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
