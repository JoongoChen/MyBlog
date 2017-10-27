<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function password()
    {
        return view('users.password');
    }

    public function ChangePwd(ChangePasswordRequest $request)
    {
        if(Hash::check($request->old_password,Auth::user()->password)){
            Auth::user()->password = bcrypt($request->password);
            Auth::user()->save();
            session()->flash('status','修改成功');
            return back();
        }
        session()->flash('status','修改失败');
        return back();
    }

    public function emailVerify($token)
    {
        $user = User::where('confirmation_token',$token)->first();
        if(is_null($user)){
            session()->flash('status','邮箱验证失败');
            return redirect('/home');
        }
        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $user->save();
        Auth::login($user);
        session()->flash('status','邮箱验证失败');
        return redirect('/home');
    }
}
