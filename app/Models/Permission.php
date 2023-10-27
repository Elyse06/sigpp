<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'sldtotpermi',
        'sldeffpermi',
        'sldrstpermi',
        'debutpermi',
        'finpermi',
        'motifpermi',
        'expires_at',
    ];

    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
    
}
