<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class, "user_profile", "profile_id", "user_id");
    }
}
