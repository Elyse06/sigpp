<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldePermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'solde',
    ];

    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
