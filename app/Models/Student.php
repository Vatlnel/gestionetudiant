<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // important pour PostgreSQL
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'matricule',
        'date_of_birth',
        'filiere_id',
        'site_id',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}