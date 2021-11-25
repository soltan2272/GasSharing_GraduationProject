<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journey;
use App\Car;
use App\User;

use App\Home;

use App\Myrequest;

use DB;

use Auth;

class userController extends Controller
{
    public function index()
    {
        $home=Home::all();
        return view('index',compact('home'));
    }

    public function aboutus()
    {
        $home=Home::all();
        return view('about-us',compact('home'));
    }


    public function newpost()
    {
        return view('newpost');
    }
    public function searching()
    {
        return view('searching');
    }
    public function login()
    {
        return view('signIn');
    }

    public function home()
    {
        return view('index');
    }

    public function map()
    {
        $home=Home::all();
        $posts=array();
        $add=array();
       // $posts=DB::table('journeys')->pluck('from');
        $posts=Journey::where('status',"2")->get();
        $i=0;
        $j=0;
        foreach ($posts as $post)
        {
            $add[$i++]=$post->from;
        }
        $i=0;
        foreach ($posts as $post)
        {
            $idd[$i++]=$post->id;
        }
       // dd($add);
        $locations=array();
        $j=0;
        for($i=0;$i<count($posts);$i++)
        {
            $j=0;
            $locations[$i][$j]= DB::table('maps')->where('address','LIKE','%'.$add[$i].'%')->first() ;
            $j++;
            $locations[$i][$j]=$idd[$i];

        }
      //  $result = json_decode($locations, true);


      /* for ($i=0;$i<count($locations);$i++)
        {
            $j=0;
            echo "<div>address :".$locations[$i][$j]->address." --------- ";
            $j++;
            echo "id : ".$locations[$i][$j]."</div>";
        }*/
       //dd($locations);
        //dd($cat);
        //dd($posts);
        return view ('map',compact('locations','home','add'));
    }


public function showpost($id)
{
    $post=Journey::where('id',$id)->first();
    $req_posts=Myrequest::where('userid',auth()->user()->id)->get();

    return view('showpost',compact('post','req_posts'));
}

    public function insertpost(Request $request)
    {
        $this->validate($request,[
            'fromstate'=>'required',
            'tostate'=>'required',
            'addressdetails'=>'required| max:300',
            'time'=>'required',
            'date'=>'required | date',
            'img'=> 'required | image',
            'carssn'=> 'required | min:4 | max:6',
            'carmodel'=> 'required | max:20',
        ]);
        $car=new Car();
        if($request->hasFile('img'))
        {

            $fileobject=$request->file('img');
            $filename=$fileobject->getClientOriginalName();
            $car->url=time().'.'.$filename;
            $fileobject->move('images/cars',time().'.'.$filename);
            //  $fileobject->storeAs('images',time().'.'. $filename);

        }
        $asd=$request->input('carssn');
        $car->ssn=$asd;
        $car->modell=$request->input('carmodel');
        $car->save();

        $journey=new Journey();
        $journey->to=$request->input('tostate');
        $journey->from=$request->input('fromstate');
        $journey->addressdetails=$request->input('addressdetails');
        $journey->time=$request->input('time');
        $journey->date=$request->input('date');
        $journey->moredetails=$request->input('moredetails');
        $journey->carid=$car->id;
        $journey->status=1;
        //dd($car->journeies('id'));
        //$journey->userid=auth('users')->id;
        $price= DB::table('trips')->where('to', $request->input('tostate'))->where('from',$request->input('fromstate'))->value('price');
        //dd($price);
        $journey->price=$price;
        $journey->userid=auth()->user()->id;
        $journey->save();
        return redirect('profile');

    }

    public  function search(Request $request)
    {
        $tostate=$request->input('tostate');
        $fromstate=$request->input('fromstate');
        $time=$request->input('time');
        $date=$request->input('date');
        //  dd($fromstate);
        //dd($tostate." ". $fromstate." ".$time." ".$date);

        $posts=array();
        if( isset($tostate) && isset($fromstate) && isset($time) && isset($date))
        { //dd(1);

            $posts=Journey::where('to',$tostate)
                ->where('from',$fromstate)
                ->where('time',$time)
                ->where('date',$date)->latest()->get();
        }
        else if(isset($tostate) && isset($fromstate) && isset($time))
        {
            //dd(2);
            $posts=Journey::where('to',$tostate)
                ->where('from',$fromstate)
                ->where('time',$time)->latest()->get();

        }
        else if(isset($tostate) && isset($fromstate) && isset($date))
        {
            //dd(3);
            $posts=Journey::where('to',$tostate)
                ->where('from',$fromstate)
                ->where('date',$date)->latest()->get();

        }

        else if(isset($tostate) && isset($fromstate))
        {
            // dd(4);
            $posts=Journey::where('to',$tostate)
                ->where('from',$fromstate)->latest()->get();

        }

        else if(isset($tostate) && isset($time))
        {
            // dd(5);
            $posts=Journey::where('to',$tostate)
                ->where('time',$time)->latest()->get();
        }
        else if(isset($tostate) && isset($date))
        {
            //dd(6);

            $posts=Journey::where('to',$tostate)
                ->where('date',$date)->latest()->get();
        }
        else if(isset($fromstate) && isset($date))
        {
            //dd(6);

            $posts=Journey::where('from',$fromstate)
                ->where('date',$date)->latest()->get();
        }
        else if(isset($fromstate) && isset($time))
        {
            //dd(7);

            $posts=Journey::where('from',$fromstate)
                ->where('date',$date)->latest()->get();
        }
        else
        {
            // dd(8);
            $posts = Journey::where('to',$tostate )
                ->orwhere('from', $fromstate)
                ->orwhere('time', $time)
                ->orwhere('date', $date)->latest()->get();

        }


        $req_posts=Myrequest::where('userid',\auth()->user()->id)->get();
        return view('searching',compact('posts','req_posts'));

    }
    public function getsearch(){
        $posts=Journey::latest()->get();
        $req_posts=Myrequest::where('userid',auth()->user()->id)->get();

        return view('getsearching',compact('posts','req_posts'));
    }
    public function myrequest($id)
    {
        $req=new Myrequest();
        $req->userid=auth()->user()->id;
        $req->journeyid=$id;
        $req->save();
        return  redirect(route('getsearch'));
    }

    public function cancelmyrequest($id)
    {
        $req = Myrequest::where('journeyid',$id)->get()->first();
        $req->delete();
        return  redirect(route('getsearch'));
    }

    public function profile()
    {

        $posts=Journey::where('userid',\auth()->user()->id)->get();


        $id =Auth::user()->getAuthIdentifier();
        $query = "SELECT m.id, m.accept,price , ssn, name, u.url, u.phonenumber, `from`, `to`, addressdetails, time, date from users as u, journeys as j, myrequests as m where m.userid = u.id and m.journeyid = j.id and m.journeyid in (SELECT id from journeys where userid = $id)";

        $myrequests=DB::select($query);

        $id =Auth::user()->getAuthIdentifier();
        $query = "SELECT m.accept, u.name,price , u.ssn, u.phonenumber, j.from, j.to, j.addressdetails, j.time, j.date, j.moredetails, c.ssn, c.modell, c.url from myrequests as m, users as u, journeys as j, cars as c where m.journeyid = j.id and j.carid = c.id and j.userid = u.id and m.userid = $id";
        $myrequests2=DB::select($query);

        return view('profile',compact('posts','myrequests','myrequests2'));

    }
    public function showrequests()
    {
        $id =Auth::user()->getAuthIdentifier();
        $query = "SELECT m.id, m.accept,price, ssn, name, u.url, u.phonenumber, `from`, `to`, addressdetails, time, date from users as u, journeys as j, myrequests as m where m.userid = u.id and m.journeyid = j.id and m.journeyid in (SELECT id from journeys where userid = $id)";

        $myrequests=DB::select($query);

        return view('showrequests',compact('myrequests'));
    }
    public function acceptrequest($id)
    {
        $req = Myrequest::find($id);
        $req->accept = 1;
        $req->save();
        return back();
    }
    public function refuserequest($id)
    {
        $req = Myrequest::find($id);
        $req->accept = 0;
        $req->save();
        return back();
    }
    public function refusetrip($id)
    {
        $deljourney=Journey::find($id);
        $deljourney->delete();

        $delrequests=Myrequest::where('journeyid',$id);
        $delrequests->delete();
        return back();

    }
    public function showacceptedrequests()
    {
        $id =Auth::user()->getAuthIdentifier();
        $query = "SELECT m.accept,price , u.name, u.ssn, u.phonenumber, j.from, j.to, j.addressdetails, j.time, j.date, j.moredetails, c.ssn, c.modell, c.url from myrequests as m, users as u, journeys as j, cars as c where m.journeyid = j.id and j.carid = c.id and j.userid = u.id and m.userid = $id";
        $myrequests=DB::select($query);
        return view('showacceptedrequests',compact('myrequests'));
    }

    public function editProfile()
    {
        $user=User::where('id',auth()->user()->id)->first();
        return view('editProfile',compact('user'));
    }

    public  function storeEdit(Request $request)
    {
        $users=User::where('id',auth()->user()->id)->first();
        $users->name=$request->name;
        $users->ssn=$request->ssn;
        $users->email=$request->email;
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
        return redirect('profile');

    }

    public function editPost($id)
    {
        $journey=Journey::where('id',$id)->first();
        $car=Car::where('id',$journey->car->id)->first();
        return view('editPost',compact('journey','car'));
    }

    public function storeEditPost(Request $request, $id)
    {
        $journey=Journey::where('id',$id)->first();
        $car=Car::where('id',$journey->car->id)->first();

        $this->validate($request,[

            'addressdetails'=>'required| max:300',
            'time'=>'required',
            'date'=>'required | date',
            'img'=> ' image',
            'carssn'=> 'required | min:4 | max:6',
            'carmodel'=> 'required | max:20',


        ]);
        if($request->hasFile('img'))
        {

            $fileobject=$request->file('img');
            $filename=$fileobject->getClientOriginalName();
            $car->url=time().'.'.$filename;
            $fileobject->move('images/cars',time().'.'.$filename);
            //  $fileobject->storeAs('images',time().'.'. $filename);

        }
        $car->ssn=$request->input('carssn');
        $car->modell=$request->input('carmodel');
        $car->save();

        $journey->to=$request->tostate;
        $journey->from=$request->input('fromstate');
        $journey->addressdetails=$request->input('addressdetails');
        $journey->time=$request->input('time');
        $journey->date=$request->input('date');
        $journey->moredetails=$request->input('moredetails');
        $journey->carid=$car->id;
        $journey->status=1;
        //dd($car->journeies('id'));
        //$journey->userid=auth('users')->id;

        $journey->userid=auth()->user()->id;
        $journey->save();
        return redirect('/profile');


    }




}
