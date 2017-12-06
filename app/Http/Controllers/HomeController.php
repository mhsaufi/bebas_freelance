<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $freelancers = Db::table('portfolio_user_bebas')
                        ->join('users','portfolio_user_bebas.user_id','=','users.id')
                        ->orderBy('portfolio_user_bebas.created_at')
                        ->paginate(30);

        $data['freelancers'] = $freelancers;

        // print_r($freelancers);

        $data['unread'] = $this->getUnread();
        return view('home',$data);
    }

    public function profile(){

        $info = Db::table('users')->where('id',Auth::id())->first();

        $app_date = Carbon::parse($info->created_at);
        $info->created_at = $app_date->toFormattedDateString();

        $data['info'] = $info;

        $data['unread'] = $this->getUnread();

        return view('profile',$data);
    }

    public function editprofile(){

        return view('editprofile');
    }

    public function uploadProfilePicture(Request $request){

        $files = $request->file('file');

        $now = Carbon::now();

        $long_file_name = '';
        $i = 0;

        foreach($files as $file)
        {
            $file_name = $file->getClientOriginalName();

            if($i <> 0)
            {
                $long_file_name .= '|';
            }

            $long_file_name .= $file_name;

            $i++;
        }

        Db::table('users')->where('id',Auth::id())->update(['img'=>$long_file_name]); 

        foreach($files as $file)
        {
            $file_name = $file->getClientOriginalName();

            $file_store = $file->storeAs('profilepicture/'.Auth::id(),$file_name); // Store File

        }

    }

    public function updateProfile(Request $request){

        $name = $request->input('name');
        $describe = $request->input('describe');
        $email = $requst->input('email');
        $phone = $request->input('phone');

        Db::table('users')->where('id',Auth::id())->update(['name'=>$name,'details'=>$describe,'phone'=>$phone,'email'=>$email]);

    }

    public function getUnread(){

        $unread = Db::table('bebas_message')->where('recipient',Auth::id())->where('msg_status',1)->count();

        return $unread;
    }
}
