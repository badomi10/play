<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function team()
    // {
    //     return $this->hasMany(Team::class);
    // }
    public $timestamps = false;
}

