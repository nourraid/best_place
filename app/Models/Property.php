<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function  fav(){
        return $this->hasMany(Favorite::class);
    }

    public function  user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function rates(){
        return $this->hasMany(Rating::class);
    }


    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    use HasFactory;
}
