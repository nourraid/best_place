<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function  users(){
        return $this->hasMany(User::class);
    }

    public function  properties(){
        return $this->hasMany(Property::class);
    }
    use HasFactory;
}
