<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    public function emploie(){
        return $this->belongsToMany(Employee::class, "mission_employees", "mission_id", "employee_id");
    }
}
