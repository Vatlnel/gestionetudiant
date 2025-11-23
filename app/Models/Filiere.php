<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    // Table associée
    protected $table = 'filieres';

    // Colonnes autorisées pour l'insertion/mise à jour
    protected $fillable = ['name', 'code'];

    /**
     * Relation many-to-many avec les universités
     * via la table pivot filiere_university
     */
    public function universities()
    {
        return $this->belongsToMany(University::class, 'filiere_university')->withTimestamps();
    }

    /**
     * Une filière peut avoir plusieurs étudiants
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}