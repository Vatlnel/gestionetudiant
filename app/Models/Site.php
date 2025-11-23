<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Site extends Model
{
    protected $fillable = ['name', 'address'];

    public function universities()
    {
        return $this->belongsToMany(University::class, 'site_university');
    }
}

