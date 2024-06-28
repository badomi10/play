<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function getLists()
    {
        $events = Event::pluck('name', 'id');

        return $events;
    }
    //「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
    // public function team()
    // {
    //     return $this->hasMany(Team::class);
    // }
    public $timestamps = false;
}

