<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Role;

class registerController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | max:30',
            'email'=>'required | email | unique:users',
            'url'=>'image | required',
            'ssn'=>'required | min:14 | max:14 | unique:users',
            'password'=>'required | min:8 | max:20 ',
            'phonenumber'=>'required | min:11 | max:11',
            'gender'=>'required',
            'category'=>'required',

        ]);

        $users=new User;
        $users->name=$request->name;
        $users->ssn=$request->ssn;
        $users->email=$request->email;
        $users->password=bcrypt($request->password);
        $users->category=$request->category;
        $users->phonenumber=$request->phonenumber;
        $users->gender=$request->gender;
        if($request->hasFile('url'))
        {

            $fileobject=$request->file('url');
            $filename=$fileobject->getClientOriginalName();
            $users->url=time().'.'. $filename;
            $fileobject->move('images',time().'.'.$filename);
            //  $fileobject->storeAs('images',time().'.'. $filename);

        }
        $users->save();
        if($users->category==0)
        {
            $users->roles()->attach(Role::where('role','passenger')->first());
        }
        else
        {
            $users->roles()->attach(Role::where('role','carowner')->first());
        }




        auth()->login($users);
        return redirect('/profile');

    }



}
