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
use Illuminate\Validation\Rules\Password;

class usersController extends Controller
{
    public function first(Request $request)
    {
        $query = Team::query();

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        $teams = $query->orderBy('created_at', 'desc')->paginate(10); 
        $events = Event::all();
        $regions = Region::all();

        return view('users.first', compact('teams', 'events', 'regions'));
    }


    public function getlogin()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('managers.manager');
            } elseif ($user->role == 0) {
                return redirect()->route('users.index');
            }
        }elseif ((!Auth::attempt($credentials))){
            return back()->withInput()->withErrors([
                'email' => 'メールアドレスまたはパスワードが一致しません。',
            ]);
        }
    }

    public function index(Request $request)
    {  
        $query = Team::query();

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        $teams = $query->orderBy('created_at', 'desc')->paginate(10); 
        $events = Event::all();
        $regions = Region::all();

        $user = Auth::user();
        
        if ($user->role == 1) {
            return redirect()->route('managers.manager');
        } elseif ($user->role == 0) {
            return view('users.index', compact('teams', 'events', 'regions'));
        }

    }

    public function detail(Request $request,$id)
    {
        $team = Team::find($id);
        $counts = Team::withCount('likes');
        $param = [
            'counts' => $counts,
        ];
        return view('users.detail', compact('team','param'));
    }

    public function post_complete(Request $request)
    {
        $request->validate([
            't_name' => 'required',
            'guidance' => 'required',
            'place' => 'required',
            'time' => 'required',
            'body' => 'required',
        ]);
        $post = new Team();
        $post->t_name = $request->input('t_name');
        $post->guidance = $request->input('guidance');
        $post->place = $request->input('place');
        $post->time = $request->input('time');
        $post->body = $request->input('body');
        $post->event_id = $request->input('event_id');
        $post->region_id = $request->input('region_id');
        $post->user_id = Auth::id();
        $post->save();
        $input = $request->all();
        $event = $post->event;
        $region = $post->region;
        return view('users.post_complete',compact('input','event','region'));
    }

    public function signup()
    {
        $Play = user::all();
        return view('users.signup', compact('Play'));
    }

    public function complete (Request $request)
    {
    
        $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => [
                'required','alpha_num',
                Password::min(8)->mixedCase()->numbers(),
            ],
        ]);
        user::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            "password"=>Hash::make($request->input("password")),
        ]);
        $input = $request->all();
        return view('users.complete',['input' => $input]);
    }


    public function getpass()
    {
        return view('users.pass');
    }

    public function pass(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $authuser = User::where('email', $request->email)->first();
        if ($authuser) {
            Auth::login($authuser);
            return redirect()->route('users.pass_confirm', compact('authuser'));
        }
        return back()->withInput()->withErrors([
            'email' => 'メールアドレスが一致しません。'
        ]);

    }

    public function pass_confirm(Request $request)
    {   
        $users = $request->user();
        return view('users.pass_confirm',compact('users'));
    }

    public function pass_complete(Request $request)
    {
        
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers(),
            ],
        ]);
        $user = $request->user();
        if ($user) {
            $hashedPassword = Hash::make($request->input('password'));
            $user->fill(['password' => $hashedPassword])->save();
            return view('users.pass_complete', compact('user'));
        }
    }


    public function application($id)
    {
        $team = Team::find($id);
        return view('users.application', compact('team'));
    }

    public function application_complete(Request $request,$id)
    {
        $request->validate([
            'a_name' => 'required',
            'number' => 'required|integer',
            'a_body' => 'required',
        ]);
        $team = Team::find($id);
        $Applicants = new Applicants();
        $Applicants->a_name = $request->input('a_name');
        $Applicants->number = $request->input('number');
        $Applicants->a_body = $request->input('a_body');
        $Applicants->team_id = $team->id;
        $Applicants->user_id = Auth::id();
        $Applicants->save();
        return view('users.application_complete',compact('Applicants','team'));
    }
    

    public function list(Request $request)
    {
        $user = $request->user(); 
        $apps = $user->apps;
        $teamIds = $apps->pluck('team_id'); 
        $teams = Team::whereIn('id', $teamIds)->orderBy('created_at', 'desc')->paginate(10);
        return view('users.list', compact('user', 'apps', 'teams'));
    }

    public function post(Request $request)
    {
        $users = $request->user();
        $team_users = Team::where('user_id', $users->id)->get();
        if ($team_users->isNotEmpty()) {
            foreach ($team_users as $team_user) {
                $event = $team_user->event;
                $region = $team_user->region;
            }
            return view('users.post', compact('team_users','event','region'));
        }
        return view('users.post', compact('team_users'));
    }

    public function new_post(Request $request)
    {
        $events = Event::all();
        $regions = Region::all();
        return view('users.new_post', compact('events','regions'));
    }

    public function post_list($id)
    {
        $applicants = Applicants::where('team_id', $id)->get();
        return view('users.post_list', compact('applicants'));
    }

    public function account(Request $request)
    {
        $users = $request->user();
        return view('users.account', compact('users'));
    }

    public function account_edit(Request $request)
    {
        $users = $request->user();
        return view('users.account_edit', compact('users'));
    }

    public function account_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $users = $request->user(); 
        $users->fill($request->all())->save();
        return view('users.account_update', compact('users'));
    }

    public function cancele(Request $request,$id)
    {
        $user = $request->user();
        $apps = $user->apps;
        $app = Applicants::find($id);
        $teamIds = $apps->pluck('team_id');
        $teams = Team::whereIn('id', $teamIds)->get();
        foreach ($teams as $team) {
            $team->visible = false;
        }
        $app->delete();
        return redirect()->route('users.list');
    }
    
    public function user_list()
    {
        $Play = user::all();
        return view('users.user_list', compact('Play'));
    }

    public function delete($id){
        $teams = Team::find($id);
        $teams->delete();
        return redirect('./post');
    }

    public function post_edit($id)
    {
        $team = Team::find($id);
        $event = $team->event;
        $region = $team->region;
        $events = Event::all();
        $regions = Region::all();
        return view('users.post_edit', compact('team', 'event', 'region', 'events', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            't_name' => 'required',
            'guidance' => 'required',
            'place' => 'required',
            'time' => 'required',
            'body' => 'required',
        ]);
        $team = Team::find($id); 
        $team->fill($request->all())->save(); 
        $event = $team->event;
        $region = $team->region;
        return View('users.update', compact('team','event', 'region',));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('users.login');
    }

    public function edit($id)
    {
        $contacts = user::find($id);
        return view('Play.edit', compact('Play'));
    }

    public function like(Request $request)
    {
        $user_id = Auth::user()->id; 
        $team_id = $request->team_id; 
        $already_liked = Like::where('user_id', $user_id)->where('team_id', $team_id)->first(); //3.

        if (!$already_liked) { 
            $like = new Like;
            $like->team_id = $team_id; 
            $like->user_id = $user_id;
            $like->save();
        } else { 
            Like::where('team_id', $team_id)->where('user_id', $user_id)->delete();
        }

        $team_likes_count = Team::withCount('likes')->findOrFail($team_id)->likes_count;
        $param = [
            'team_likes_count' => $team_likes_count,
        ];
        return response()->json($param);
    }

}


