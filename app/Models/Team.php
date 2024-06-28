<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['id','t_name','guidance','place','time','body','event_id','region_id'];

    public function apps() {
        return $this->hasMany(Applicants::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('team_id', $this->id)->first() !==null;
    }

}



