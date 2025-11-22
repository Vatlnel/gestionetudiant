<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $table = 'filieres';
    protected $fillable = ['name', 'code', 'university_id', 'site_id'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}