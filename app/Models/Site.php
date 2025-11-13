<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    protected $fillable = [
        'name',
        'address',
        'university_id'
    ];

    public function university() {
    return $this->belongsTo(University::class);
}

public function filieres() {
    return $this->hasMany(Filiere::class);
}
}
