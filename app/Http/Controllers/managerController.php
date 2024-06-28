<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\team;
use App\Models\applicants;
use App\Models\Region;
use App\Models\Event;
use App\Models\Like;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class managerController extends Controller
{
    public function manager(Request $request)
    {
        
        $query = Team::query();

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        $teams = $query->orderBy('created_at', 'desc')->paginate(10); // 'Post'モデルを使用
        $events = Event::all();
        $regions = Region::all();

        return view('managers.manager', compact('teams', 'events', 'regions'));
    }

    public function manager_edit(Request $request,$id)
    {
        $team = Team::find($id);
        return view('managers.manager_edit', compact('team'));
    }


    public function user_delete($id){
        $users = User::find($id);
        $users->delete();
        return redirect('./manager_user');
    }

    public function team_delete($id){
        $teams = Team::find($id);
        $teams->delete();
        return redirect('./manager');
    }
}
