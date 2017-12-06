<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailingController;
use App\Http\Controllers\HomeController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function myApplication(Request $request){

    	$application_count = Db::table('job_application')->where('user_id',Auth::id())->count();
    	$data['application_count'] = $application_count;

    	if($application_count <> 0){

    		$applications = Db::table('job_application')	
    						->join('job_bebas','job_application.job_id','=','job_bebas.job_id')
    						->where('job_application.user_id',Auth::id())
    						->get();

    		foreach($applications as $app){

                $app_date = Carbon::parse($app->created_at);
                $app->created_at = $app_date->toFormattedDateString();

            }

            $data['applications'] = $applications;

    	}

        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

    	return view('pages.application',$data);
    }

    public function overviewJob(Request $request){

    	$job_id = $request->input('job');

    	$request->session()->put('job',$job_id);

    	//---------------------------------------------------------------------------------------

    	$job = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_id',$job_id)
                    ->first();

        $data['job'] = $job;

        //-----------------------------------------------------------------------------------------

    	$application_count = Db::table('job_application')->where('job_id',$job_id)->where('application_status',1)->count();
    	$data['application_count'] = $application_count;

    	if($application_count <> 0){

    		$applications = Db::table('job_application')	
    						->join('job_bebas','job_application.job_id','=','job_bebas.job_id')
    						->join('users','job_application.user_id','=','users.id')
    						->where('job_application.job_id',$job_id)
                            ->where('job_application.application_status',1)
    						->get();

    		foreach($applications as $app){

                $app_date = Carbon::parse($app->created_at);
                $app->created_at = $app_date->toFormattedDateString();

            }

            $data['applications'] = $applications;

    	}


        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

    	return view('pages.overview',$data);
    }

    public function rejectApplication(Request $request){

        $app_id = $request->input('app_id');

        Db::table('job_application')->where('application_id',$app_id)->update(['application_status'=>'3']);
    }

    public function acceptApplication(Request $request){

        $app_id = $request->input('ticket');

        $app_info = Db::table('job_application')->where('application_id',$app_id)->first();

        $app_date = Carbon::parse($app_info->created_at);
        $app_info->created_at = $app_date->toFormattedDateString();

        $user_info = Db::table('users')->where('id',$app_info->user_id)->first();

        $data['user_info'] = $user_info;
        $data['app_info'] = $app_info;

        $request->session()->put('application',$app_id);

        $job_id = $request->session()->get('job','');

        $data['job_id'] = $job_id;

        
        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

        return view('pages.applicationaccept',$data);
    }

    public function confirmAccept(Request $request){

        $app_id = $request->input('app_id');
        $job_id = $request->session()->get('job','');

        $app_info = Db::table('job_application')->where('application_id',$app_id)->first();
        $job_info = Db::table('job_bebas')->where('job_id',$job_id)->first();

        Db::table('job_application')->where('application_id',$app_id)->update(['application_status'=>'2']);
        Db::table('job_bebas')->where('job_id',$job_id)->update(['js_id'=>'6','job_client'=>$app_info->user_id]);
        Db::table('pay_bebas')->where('pay_id',$job_info->pay_id)->update(['client_id'=>$app_info->user_id]);

        $mail = new MailingController;

        $mail->mailConfirmAccept($$app_info->user_id,$job_info->job_name);

    }

}
