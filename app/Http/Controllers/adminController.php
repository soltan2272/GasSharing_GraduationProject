<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Home;

use App\User;

use App\Role;
use App\Journey;

use DB;

use Hash;

class adminController extends Controller
{
    public function index()
    {
        $role= DB::table('user_roles')->where('role_id',3)->get() ;
       // dd(count($role));
        $admin=[];
        for($i=0;$i<count($role);$i++) {
            $admin[$i]= User::where('id', $role[$i]->user_id)->get();
        }
        // dd($admin);

        return view('admin.index',compact('admin'));
    }

    public function feedback()
    {
        $quest=Quest::all();
        return view('admin.feedBack',compact('quest'));
    }
    public function deletequest(Request $request)
    {
        $quest=Quest::where('id',$request->id)->first();
        $quest->delete();

        return back();
    }
    public function addadmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users',
        ]);
        $user=new User;
        $user->name=$request->fname;
        $user->email=$request->email;
        $user->category=2;
        $user->password=bcrypt($request->pass);
        $user->save();

        //add role
        $user->roles()->attach(Role::where('role','admin')->first());
        //  \Mail::to($user)->send(new registermail);

        //login

        return redirect('/index');
    }

    public function editprofile(Request $request)
    {
        $admin=User::where('id',$request->id)->first();
        $admin->firstName=$request->fname;
        $admin->lastName=$request->lname;
        $admin->save();

        return redirect('/index');
    }

    public function editpassword(Request $request)
    {
        $yes=2;
        $user =User::where('id',$request->id)->first();
        if (Hash::check($request->oldpass, $user->password)) {
            $user->password=bcrypt($request->newpass);
            $user->save();
            $yes=3;
        }
        return redirect('/index')->with('yes',$yes);
    }
    public function loginadmin()
    {
        return view('admin.login');
    }
    public function loginenter(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if($user->category !="2")
        {
            return back()->withErrors([
                "message"=>"خطأ فى اسم المسخدم او كلمة المرور"
            ]);
        }
        if(! auth()->attempt(request(['email','password'])))
        {
            return back()->withErrors([
                "message"=>"خطأ فى اسم المسخدم او كلمة المرور"
            ]);
        }
        return redirect('/index');
    }

    public function logoutadmin()
    {
        auth()->logout();
        return redirect('/loginadmin');
    }




    public function editadmin(Request $request)
    {

        // dd($request->id);
        $admin=User::where('id',$request->id)->first();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->save();

        return redirect('/index');
    }
    public function deleteadmin(Request $request)
    {

        $admin=User::where('id',$request->id)->first();
        $admin->delete();

        return redirect('/index');
    }


    public function allposts()
    {
        $posts=Journey::where('status',2)->get();
        return view('admin.allposts',compact('posts'));
    }

    public function newposts()
    {
        $posts=Journey::where('status',1)->get();
        return view('admin.newposts',compact('posts'));
    }

    public function deletepost(Request $request)
    {
        $post=Journey::where('id',$request->id)->first();
        //dd($post);
        $post->delete();

        return redirect('/allposts');
    }

    public function acceptpost(Request $request)
    {
        $post=Journey::where('id',$request->id)->first();
        $post->status=2;
        $post->save();
        return redirect('/newposts');
    }

    public function refusepost(Request $request)
    {
        $post=Journey::where('id',$request->id)->first();
        $post->status=3;
        $post->message=$request->msg;
        $post->save();
        return redirect('/newposts');
    }


    public function editweb_home()
    {
        $home=Home::all();
        return view('admin.editweb_home',compact('home'));
    }

    public function websitelogo(Request $request)
    {

        $logo=Home::find(1);
        //dd(count($logo));
        if(count($logo)==0) {
            $logo = new Home;
        }
        if($request->hasFile('m_i')) {

            $fileobject1 = $request->file('m_i');
            $filename = $fileobject1->getClientOriginalName();
            $logo->main_logo = time() . '.' . $filename;
            $fileobject1->move('images', time() . '.' . $filename);
        }

        if($request->hasFile('s_i')) {
            $fileobject2 = $request->file('s_i');
            $filename = $fileobject2->getClientOriginalName();
            $logo->small_logo = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }

        $logo->save();

        return redirect('editwebhome');
    }

    public function websitewelcome(Request $request)
    {
        $logo=Home::find(1);
        //dd(count($logo));
        if(count($logo)==0) {
            $logo = new Home;
        }
        $logo->welcome_title=$request->w_title;
        $logo->welcome_text=$request->w_text;
        if($request->hasFile('w_image')) {
            $fileobject2 = $request->file('w_image');
            $filename = $fileobject2->getClientOriginalName();
            $logo->welcome_image = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }

        $logo->save();

        return redirect('editwebhome');
    }
    public function animationphoto(Request $request)
    {

        $logo=Home::find(1);
        //dd(count($logo));
        if(count($logo)==0) {
            $logo = new Home;
        }
        $logo->Animation_title1=$request->a_t1;
        $logo->Animation_text1=$request->a_tt1;
        $logo->Animation_title2=$request->a_t2;
        $logo->Animation_text2=$request->a_tt2;
        $logo->Animation_title3=$request->a_t3;
        $logo->Animation_text3=$request->a_tt3;
        $logo->Animation_title4=$request->a_t4;
        $logo->Animation_text4=$request->a_tt4;


        if($request->hasFile('a_m1')) {
            $fileobject2 = $request->file('a_m1');
            $filename = $fileobject2->getClientOriginalName();
            $logo->Animation_image1 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m2')) {
            $fileobject2 = $request->file('a_m2');
            $filename = $fileobject2->getClientOriginalName();
            $logo->Animation_image2 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m3')) {
            $fileobject2 = $request->file('a_m3');
            $filename = $fileobject2->getClientOriginalName();
            $logo->Animation_image3 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m4')) {
            $fileobject2 = $request->file('a_m4');
            $filename = $fileobject2->getClientOriginalName();
            $logo->Animation_image4 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }

        $logo->save();
        return redirect('editwebhome');
    }
    public function gallaryphoto(Request $request)
    {

        $logo=Home::find(1);
        //dd(count($logo));
        if(count($logo)==0) {
            $logo = new Home;
        }

        $logo->gallary_title1=$request->g_t1;
        $logo->gallary_text1=$request->g_tt1;
        $logo->gallary_title2=$request->g_t2;
        $logo->gallary_text2=$request->g_tt2;
        $logo->gallary_title3=$request->g_t3;
        $logo->gallary_text3=$request->g_tt3;


        if($request->hasFile('g_m1')) {
            $fileobject2 = $request->file('g_m1');
            $filename = $fileobject2->getClientOriginalName();
            $logo->gallary_image1 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('g_m2')) {
            $fileobject2 = $request->file('g_m2');
            $filename = $fileobject2->getClientOriginalName();
            $logo->gallary_image2 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('g_m3')) {
            $fileobject2 = $request->file('g_m3');
            $filename = $fileobject2->getClientOriginalName();
            $logo->gallary_image3 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }

        $logo->save();
        return redirect('editwebhome');
    }
    public function info(Request $request)
    {

        $logo=Home::find(1);
        //dd(count($logo));
        if(count($logo)==0) {
            $logo = new Home;
        }


        $logo->about_phone=$request->phone;
        $logo->about_email=$request->email;
        $logo->about_facebook=$request->a_f;
        $logo->about_twiteer=$request->a_t;
        $logo->about_linkedin=$request->a_l;
        $logo->about_youtube=$request->a_y;
        $logo->who_us=$request->who_us;
        $logo->mission=$request->mission;
        $logo->Vision=$request->vision;


        $logo->save();
        return redirect('editwebhome');
    }

    public function aboutus()
    {
        $home=Home::all();
        return view('admin.info',compact('home'));
    }
    public function saveinfo(Request $request)
    {
        $logo=Home::find(1);
        if(count($logo)==0) {
            $logo = new Home;
        }


        $logo->about_title1=$request->a_t1;
        $logo->about_text1=$request->a_tt1;
        $logo->about_title2=$request->a_t2;
        $logo->about_text2=$request->a_tt2;
        $logo->about_title3=$request->a_t3;
        $logo->about_text3=$request->a_tt3;
        $logo->about_title4=$request->a_t4;
        $logo->about_text4=$request->a_tt4;


        if($request->hasFile('a_m1')) {
            $fileobject2 = $request->file('a_m1');
            $filename = $fileobject2->getClientOriginalName();
            $logo->about_image1 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m2')) {
            $fileobject2 = $request->file('a_m2');
            $filename = $fileobject2->getClientOriginalName();
            $logo->about_image2 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m3')) {
            $fileobject2 = $request->file('a_m3');
            $filename = $fileobject2->getClientOriginalName();
            $logo->about_image3 = time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }
        if($request->hasFile('a_m4')) {
            $fileobject2 = $request->file('a_m4');
            $filename = $fileobject2->getClientOriginalName();
            $logo->about_image4= time() . '.' . $filename;
            $fileobject2->move('images', time() . '.' . $filename);
        }

        $logo->save();
        return back();
    }



}
