<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return redirect()->route('mascotas.index');
    }

    public function profile() {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user'=>$user]);
    }

    public function is_zoological(Request $req) {
        
        $user = User::find(Auth::user()->id);
        $user->zoologic = $req->get('zoological');
        $user->save();

        return 'ok';
    }

    public function particular(Request $req) {

        $user = User::find(Auth::user()->id);
        $user->name = $req->get('name');
        $user->email = $req->get('email');
        
        if($req->get('password') != '*********' && !empty($req->get('password')) ) {
            $user->password = Hash::make($req->get('password'));
        }

        $user->save();
        return redirect()->route('profile');
    }

    public function zoological(Request $req) {

        $user = User::find(Auth::user()->id);
        $user->zoological_core = $req->get('zoological_core');
        $user->zoological_name = $req->get('zoological_name');
        $user->zoological_direction = $req->get('zoological_direction');
        $user->public = $req->get('public');
        $user->save();

        return redirect()->route('profile');
    }
}
