<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Disease;
use App\Pet;
use App\Vaccine;
use App\User;

class BeastMasterController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); 
    }

    public function dashboard() {
        $userCount = User::count();
        $petCount  = Pet::count();

        return view('beastmaster.dashboard',['users'=>$userCount,'pets'=>$petCount]);
    }

    public function getUsers(Request $request) {
        return view('beastmaster.users');
    }


    /**
     * permissions
     * 
     * public function getUsers(Request $request) {
     *  if ($request->user()->can('create-only')) {
     *       return view('beastmaster.users');
     *       //Code goes here
     *   } else {
     *       abort(404);
     *  }
     *   }
     */
}
