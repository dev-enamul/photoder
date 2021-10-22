<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Shanmuga\LaravelEntrust\Models\EntrustRole;

class Role extends EntrustRole
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'role_user','role_id', 'user_id');
    }
    
}
