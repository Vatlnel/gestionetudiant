<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = ['name', 'address'];

   public function sites()
{
    return $this->belongsToMany(Site::class, 'site_university');
}

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'filiere_university')->withTimestamps();
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    
}