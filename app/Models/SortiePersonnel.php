<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortiePersonnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'sldtotsortie',
        'sldeffsortie',
        'sldrstsortie',
        'debutsortie',
        'finsortie',
        'motifsortie',
    ];

    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }

}
