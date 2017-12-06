<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailingController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index(){

    	$job_types = DB::table('type_job_bebas')->get();

        $data['job_types'] = $job_types;

    	return view('pages.createjob',$data);
    }

    public function uploadAttachment(Request $request){

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


        $attach_id = Db::table('attachment_bebas')->insertGetId(['attach_title'=>$long_file_name]); 


        foreach($files as $file)
        {
            $file_name = $file->getClientOriginalName();

            $file_store = $file->storeAs('attachments/'.$attach_id,$file_name); // Store File

        }

        return $attach_id;
    }

    public function createNewJob(Request $request){

    	$title = $request->input('title');
    	$description = $request->input('description');
    	$value = $request->input('value');
    	$deadline = $request->input('deadline');
    	$job_type = $request->input('job_type');
    	$attachment = $request->input('attachment');

    	$new_date = Carbon::parse($deadline);
        $new_date = $new_date->toDateString();

    	$id = Db::table('pay_bebas')->insertGetId(['pay_amount'=>$value,'pay_currency'=>'RM','ps_id'=>1,'job_creator'=>Auth::id()]);

    	Db::table('job_bebas')->insert(['job_name'=>$title,'job_creator'=>Auth::id(),'type_id'=>$job_type,'js_id'=>1,'job_details'=>$description,'job_due'=>$new_date,'job_attach_id'=>$attachment,'pay_id'=>$id]);
    }

    public function JobView(Request $request){

        $job_id = $request->input('job');

        $job = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_id',$job_id)
                    ->first();

        $data['job'] = $job;

        return view('pages.jobview',$data);
    }

    public function jobListing(Request $request){

        $jobs_count = Db::table('job_bebas')->where('job_bebas.js_id',1)->count();

        if($jobs_count <> 0){

            $jobs = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->where('job_bebas.js_id',1)
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->get();

            foreach($jobs as $job){

                $j_date = Carbon::parse($job->created_at);
                $job->created_at = $j_date->toFormattedDateString();

            }


            $data['jobs'] = $jobs;
        }

        $data['jobs_count'] = $jobs_count;

        // print_r($jobs);

    	return view('pages.getjob',$data);
    }

    public function myJobListing(Request $request){

        $posted_count = Db::table('job_bebas')->where('job_creator',Auth::id())->count();

        $data['posted_count'] = $posted_count;

        if($posted_count <> 0){

            $posted = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_creator',Auth::id())
                    ->get();

            foreach($posted as $job){

                $j_date = Carbon::parse($job->created_at);
                $job->created_at = $j_date->toFormattedDateString();

            }

            $data['posted'] = $posted;
        }

        $taken_count = Db::table('job_bebas')->where('job_client',Auth::id())->count();

        $data['taken_count'] = $taken_count;

        if($taken_count <> 0){

            $taken = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_client',Auth::id())
                    ->get();

            foreach($taken as $job){

                $j_date = Carbon::parse($job->created_at);
                $job->created_at = $j_date->toFormattedDateString();

            }

            $data['taken'] = $taken;
        }

    	return view('pages.myjob',$data);
    }

    public function TakeJob(Request $request){

        $job_id = $request->input('job_id');
        $remark = $request->input('remark');
        $job_info = Db::table('job_bebas')->where('job_id',$job_id)->first();

        Db::table('job_application')->insert(['job_id'=>$job_id,'user_id'=>Auth::id(),'application_status'=>1,'application_remark'=>$remark]);

        $mail = new MailingController;
        $mail->mailTakeJob(Auth::id(),$job_info->job_name);
    }

    public function progressOverview(Request $request){

        $job_id = $request->input('job');

        $job = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','pay_bebas.ps_id','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at','job_bebas.client_rated','job_bebas.job_client')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_id',$job_id)
                    ->first();

        $data['job'] = $job;

        $issue_count = Db::table('job_issue')->where('job_id',$job_id)->count();

        $data['issue_count'] = $issue_count;

        if($issue_count <> 0){

            $issues = Db::table('job_issue')
                    ->join('users','job_issue.user_id','=','users.id')
                    ->latest('job_issue.created_at')
                    ->where('job_id',$job_id)->get();

            foreach($issues as $issue){

                $c = Carbon::parse($issue->created_at);
                $issue->created_at = $c->toFormattedDateString();

            }

            $data['issues'] = $issues;
        }

        return view('pages.progressoverview',$data);

    }

    public function jobStatusView(Request $request){

        $job_id = $request->input('job');

        $jobs = Db::table('job_bebas')
                    ->select('job_bebas.job_id','job_bebas.job_name','job_bebas.job_creator','users.email','job_bebas.type_id','type_job_bebas.title','job_bebas.pay_id','pay_bebas.pay_amount','pay_bebas.ps_id','job_bebas.js_id','job_bebas.job_details','job_bebas.job_due','job_bebas.job_attach_id','attachment_bebas.attach_title','job_bebas.created_at','job_bebas.updated_at')
                    ->join('type_job_bebas','job_bebas.type_id','=','type_job_bebas.type_id')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->join('attachment_bebas','job_bebas.job_attach_id','=','attachment_bebas.attach_id')
                    ->join('users','job_bebas.job_creator','=','users.id')
                    ->where('job_bebas.job_id',$job_id)
                    ->first();

        $issue_count = Db::table('job_issue')->where('job_id',$job_id)->count();

        $data['issue_count'] = $issue_count;

        if($issue_count <> 0){

            $issues = Db::table('job_issue')
                    ->join('users','job_issue.user_id','=','users.id')
                    ->latest('job_issue.created_at')
                    ->where('job_id',$job_id)->get();

            foreach($issues as $issue){

                $c = Carbon::parse($issue->created_at);
                $issue->created_at = $c->toFormattedDateString();

            }

            $data['issues'] = $issues;
        }

        $data['job'] = $jobs;

        return view('pages.jobstatus',$data);
    }

    public function postIssue(Request $request){

        $job_id = $request->input('job');
        $content = $request->input('content');

        Db::table('job_issue')->insert(['issue_content'=>$content,'job_id'=>$job_id,'user_id'=>Auth::id()]);

    }

    public function markPaid(Request $request){

        $job_id = $request->input('job');

        $jobs = Db::table('job_bebas')->where('job_id',$job_id)->first();

        $pay_id = $jobs->pay_id;

        Db::table('pay_bebas')->where('pay_id',$pay_id)->update(['ps_id'=>2]);

    }

    public function rateClient(Request $request){

        $user_id = $request->input('user');
        $job_id = $request->input('job_id');
        $rate = $request->input('rate');

        Db::table('job_bebas')->where('job_id',$job_id)->update(['client_rated'=>$rate]);

        $info = Db::table('users')->where('id',$user_id)->first();

        if($info->rating == 0){

            Db::table('users')->where('id',$user_id)->update(['rating'=>$rate]);

        }else{

            $new_rate = $rate + $info->rating;

            $new_rate = $new_rate/2;

            Db::table('users')->where('id',$user_id)->update(['rating'=>$new_rate]);

        }

    }

    public function markComplete(Request $request){

        $job_id = $request->input('job');

        $request->session()->put('job',$job_id);

        $data['job_id'] = $job_id;

        return view('pages.markcomplete',$data);
    }

    public function finalAttachment(Request $request){

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

        $attach_id = Db::table('attachment_bebas')->insertGetId(['attach_title'=>$long_file_name]); 

        foreach($files as $file)
        {
            $file_name = $file->getClientOriginalName();

            $file_store = $file->storeAs('attachments/'.$attach_id,$file_name); // Store File

        }

        return $attach_id;
    }

    public function completeJob(Request $request){

        $attach_id = $request->input('attach_id');
        $job_id = $request->session()->get('job','');

        Db::table('job_bebas')->where('job_id',$job_id)->update(['job_final_attach_id'=>$attach_id,'js_id'=>3]);

    }
}
