<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserUpdate;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function dashboard(){
    return view('user.dashboard');
    }
    public function comments(){
        return view('user.comments');
    }
    public  function  deleteComment($id){
        $comment= Comment::where('id',$id)->where('user_id',Auth::id())->delete();
        return back();

    }
    public function profile(){
        return view('user.profile');
    }
    public function profilePost(UserUpdate $request){
        $user = Auth::user();
        $user->name =$request['name'];
        $user->email = $request['email'];
        $user->save();
        if($request['password']!==""){
            if(!(Hash::check($request['password'],Auth::user()->password))){
                return redirect()->back()->with('error','Your Current password does not match with the password you provided');
            }

            if(strcmp($request['password'],$request['new_password'])==0){
                return redirect()->back()->with('error','New password  cannot be same as your previous password');
            }
            $validation = $request->validate([
               'password' => 'required',
                'new_password' => 'required|string|min:6|confirmed'
             ]);
             $user->password = bcrypt($request['new_password']);
             $user->save();
            return redirect()->back()->with('success','Password changed successfully.');
        }
        return back();
    }


}
