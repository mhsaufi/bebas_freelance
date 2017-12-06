<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function index(){

    	// Pending Payment ----------------------------------------------------------------

    	$pending_count = Db::table('job_bebas')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->where('job_bebas.job_client',Auth::id())
                    ->where('pay_bebas.ps_id',1)
                    ->count();

        $data['pending_count'] = $pending_count;

        if($pending_count <> 0){

	    	$pendings = Db::table('job_bebas')
	                    ->select(
	                    	'job_bebas.job_id',
	                    	'job_bebas.job_name',
	                    	'job_bebas.job_creator',
	                    	'users.name',
	                    	'users.phone',
	                    	'users.email',
	                    	'job_bebas.pay_id',
	                    	'pay_bebas.pay_amount',
	                    	'job_bebas.js_id',
	                    	'job_bebas.job_details',
	                    	'job_bebas.job_due',
	                    	'job_bebas.created_at',
	                    	'job_application.updated_at')
	                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
	                    ->join('users','job_bebas.job_creator','=','users.id')
	                    ->join('job_application','job_bebas.job_id','=','job_application.job_id')
	                    ->where('job_bebas.job_client',Auth::id())
	                    ->where('pay_bebas.ps_id',1)
	                    ->get();

	        foreach($pendings as $pend){

                $app_date = Carbon::parse($pend->updated_at);
                $pend->updated_at = $app_date->toFormattedDateString();

            }

	        $data['pendings'] = $pendings;
        }

        // Paid ------------------------------------------------------------------------

        $paid_count = Db::table('job_bebas')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->where('job_bebas.job_client',Auth::id())
                    ->where('pay_bebas.ps_id',2)
                    ->count();

        $data['paid_count'] = $paid_count;

        if($paid_count <> 0){

	    	$paids = Db::table('job_bebas')
	                    ->select(
	                    	'job_bebas.job_id',
	                    	'job_bebas.job_name',
	                    	'job_bebas.job_creator',
	                    	'users.name',
	                    	'users.phone',
	                    	'users.email',
	                    	'job_bebas.pay_id',
	                    	'pay_bebas.pay_amount',
	                    	'job_bebas.js_id',
	                    	'job_bebas.job_details',
	                    	'job_bebas.job_due',
	                    	'job_bebas.created_at',
	                    	'job_application.updated_at')
	                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
	                    ->join('job_application','job_bebas.job_id','=','job_application.job_id')
	                    ->join('users','job_bebas.job_creator','=','users.id')
	                    ->where('job_bebas.job_client',Auth::id())
	                    ->where('pay_bebas.ps_id',2)
	                    ->get();

	        $data['paids'] = $paids;
        }

        // ------------------------------------------------------------------------------

    	return view('manage.index',$data);
    }

    public function credit(Request $request){

    	// Pending Payment ----------------------------------------------------------------

    	$pending_count = Db::table('job_bebas')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->where('job_bebas.job_creator',Auth::id())
                    ->where('pay_bebas.ps_id',1)
                    ->where('pay_bebas.client_id','!=',null)
                    ->count();

        $data['pending_count'] = $pending_count;

        if($pending_count <> 0){

	    	$pendings = Db::table('job_bebas')
	                    ->select(
	                    	'job_bebas.job_id',
	                    	'job_bebas.job_name',
	                    	'job_bebas.job_client',
	                    	'users.name',
	                    	'users.phone',
	                    	'users.email',
	                    	'job_bebas.pay_id',
	                    	'pay_bebas.pay_amount',
	                    	'job_bebas.js_id',
	                    	'job_bebas.job_details',
	                    	'job_bebas.job_due',
	                    	'job_bebas.created_at',
	                    	'job_application.updated_at')
	                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
	                    ->join('users','job_bebas.job_client','=','users.id')
	                    ->join('job_application','job_bebas.job_id','=','job_application.job_id')
	                    ->where('job_bebas.job_creator',Auth::id())
	                    ->where('pay_bebas.ps_id',1)
                    	->where('pay_bebas.client_id','!=','')
	                    ->get();

	        foreach($pendings as $pend){

                $app_date = Carbon::parse($pend->updated_at);
                $pend->updated_at = $app_date->toFormattedDateString();

            }

	        $data['pendings'] = $pendings;
        }

        // Paid ------------------------------------------------------------------------

        $paid_count = Db::table('job_bebas')
                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
                    ->where('job_bebas.job_creator',Auth::id())
                    ->where('pay_bebas.ps_id',2)
                    ->count();

        $data['paid_count'] = $paid_count;

        if($paid_count <> 0){

	    	$paids = Db::table('job_bebas')
	                    ->select(
	                    	'job_bebas.job_id',
	                    	'job_bebas.job_name',
	                    	'job_bebas.job_client',
	                    	'users.name',
	                    	'users.phone',
	                    	'users.email',
	                    	'job_bebas.pay_id',
	                    	'pay_bebas.pay_amount',
	                    	'job_bebas.js_id',
	                    	'job_bebas.job_details',
	                    	'job_bebas.job_due',
	                    	'job_bebas.created_at',
	                    	'job_application.updated_at')
	                    ->join('pay_bebas','job_bebas.pay_id','=','pay_bebas.pay_id')
	                    ->join('job_application','job_bebas.job_id','=','job_application.job_id')
	                    ->join('users','job_bebas.job_client','=','users.id')
	                    ->where('job_bebas.job_creator',Auth::id())
	                    ->where('pay_bebas.ps_id',2)
	                    ->get();

	        $data['paids'] = $paids;
        }

        // ------------------------------------------------------------------------------

    	return view('manage.credit',$data);
    }
}
