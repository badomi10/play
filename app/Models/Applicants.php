<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;
    protected $fillable = ['a_name','number','a_body','team_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function team(){
        return $this->belongsTo(team::class);
    }

}

