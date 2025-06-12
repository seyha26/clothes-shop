<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'clothe_id'
    ];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function clothe() {
        return $this->belongsToMany(Clothe::class);
    }
}
