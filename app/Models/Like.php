<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'team_id'];

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function team()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Team::class);
    }


}
?>