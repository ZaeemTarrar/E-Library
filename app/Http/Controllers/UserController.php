<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $user=User::find(Auth::user()->id);
        return view('dashboard.user.profile')->with('user',$user);
    }

    public function profileEdit(){
        $user=User::find(Auth::user()->id);
        return view('dashboard.user.edit_profile')->with('user',$user);
    }

    public function profileUpdate(Request $request){
        $user = User::find(Auth::user()->id);
        $user->snap = $this->updatefile($request,$user->snap);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->contact_number = $request->contact_number;
        $user->about = $request->about;
        $user->gender = $request->gender;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->save();
        return redirect()->route('user.profile');
    }
}
