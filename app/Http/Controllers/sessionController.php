<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class sessionController extends Controller
{
    public function login()
    {
        return view('signin');
    }
    public function store()
    {
        if( !auth()->attempt(request(['email','password'])))
        {
            return back()->withErrors([
                "message"=>"خطأ فى اسم المسخدم او كلمة المرور"
            ]);
        }
        return redirect('/profile');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/signup');
    }

}
