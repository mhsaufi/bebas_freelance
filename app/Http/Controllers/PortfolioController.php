<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function index(Request $request){

    	$portfolio_count = Db::table('portfolio_user_bebas')->where('user_id',Auth::id())->count();

    	$data['portfolio_count'] = $portfolio_count;

    	if($portfolio_count <> 0){

    		$portfolios = Db::table('portfolio_user_bebas')
    						->join('users','portfolio_user_bebas.user_id','=','users.id')
    						->where('portfolio_user_bebas.user_id',Auth::id())
    						->get();

    		foreach($portfolios as $app){

                $app_date = Carbon::parse($app->created_at);
                $app->created_at = $app_date->toFormattedDateString();

            }

    		$data['portfolios'] = $portfolios;

    	}

    	return view('portfolio.index',$data);
    }

    public function createNewPortfolio(Request $request){

    	return view('portfolio.createnew');

    }

    public function uploadPortfolioFiles(Request $request){

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


        $port_id = Db::table('portfolio_user_bebas')->insertGetId(['port_attach_title'=>$long_file_name]); 


        foreach($files as $file)
        {
            $file_name = $file->getClientOriginalName();

            $file_store = $file->storeAs('portfolios/'.$port_id,$file_name); // Store File

        }

    	return $port_id;
    }

    public function saveNewPortfolio(Request $request){

    	$port_name = $request->input('port_name');
    	$description = $request->input('description');
    	$port_id = $request->input('port_id');

    	Db::table('portfolio_user_bebas')->where('port_id',$port_id)->update(['user_id'=>Auth::id(),'portfolio_name'=>$port_name,'port_description'=>$description]);

    }

    public function userPortfolio(Request $request){

    	$user_id = $request->input('user');

    	$job_id = $request->session()->get('job','');

    	$data['job_id'] = $job_id;

    	$user_info = Db::table('users')->where('id',$user_id)->first();

    	$data['user_info'] = $user_info;

    	$portfolio_count = Db::table('portfolio_user_bebas')->where('user_id',$user_id)->count();

    	$data['portfolio_count'] = $portfolio_count;

    	if($portfolio_count <> 0){

    		$portfolios = Db::table('portfolio_user_bebas')
    						->join('users','portfolio_user_bebas.user_id','=','users.id')
    						->where('user_id',$user_id)
    						->get();

    		foreach($portfolios as $app){

                $app_date = Carbon::parse($app->created_at);
                $app->created_at = $app_date->toFormattedDateString();

            }

    		$data['portfolios'] = $portfolios;

    	}

    	return view('portfolio.userportfolio',$data);

    }

    public function reviewPortfolio(request $request){

    	$port_id = $request->input('port');
    	$data['back1'] = $request->input('back1');
    	$data['back2'] = $request->input('back2');

    	$portfolio = Db::table('portfolio_user_bebas')
    				->join('users','portfolio_user_bebas.user_id','=','users.id')
    				->where('port_id',$port_id)->first();

    	$data['portfolio'] = $portfolio;

    	return view('portfolio.reviewportfolio',$data);
    }
}
