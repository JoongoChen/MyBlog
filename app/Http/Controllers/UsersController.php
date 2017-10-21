<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
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
}
