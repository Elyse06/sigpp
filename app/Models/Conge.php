<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'user_id',
        'sldtotcon',
        'sldeffcon',
        'sldrstcon',
        'debutcon',
        'fincon',
        'motifcon',
        'expires_at',
    ];


    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }

    public function users(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
