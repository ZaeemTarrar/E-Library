<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function passwordreset(){

        return view('dashboard.user.reset_password');

    }

    public function passwordreseted(Request $request){

        $user = User::find(Auth::user()->id);
        if(!Hash::check($request->oldpassword,$user->password)){
            Session::flash('wrongpassword', 'Old password is wrong.');
            return redirect()->route('user.profile.password.reset');
        }

        $validatons = $request->validate([
            'oldpassword' => 'required|min:6',
            'newpassword' => 'required|min:6|confirmed',
        ]);
        $user->password = Hash::make($request['newpassword']);
        $user->save();


        return redirect()->route('user.profile');

    }
}
