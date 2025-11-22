<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';
    protected $fillable = ['name', 'address'];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}