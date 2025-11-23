<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = [
        'first_name','last_name','email','matricule','date_of_birth',
        'university_id','site_id','annee_id','filiere_id'
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function annee()
{
    return $this->belongsTo(Annee::class);
}
}