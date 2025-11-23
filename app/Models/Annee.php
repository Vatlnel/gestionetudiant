<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $table = 'annees';   // 👈 force Laravel à utiliser la bonne table
    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}