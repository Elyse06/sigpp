<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    public function emploie(){
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
