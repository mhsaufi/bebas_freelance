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

    public function getUnread(){

        $unread = Db::table('bebas_message')->where('recipient',Auth::id())->where('msg_status',1)->count();

        return $unread;
    }
}
