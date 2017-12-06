<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function index(Request $request){

    	return view('inbox.index');

    }

    public function mailTakeJob($user,$job){

    	$user_info = Db::table('users')->where('id',$user)->first();

    	$subject = 'BEBAS Job Application';
    	// $user_mail = $user_info->email;
    	$user_email = 'amrin317@gmail.com';
    	// $user_email = 'habibmohdsaufi@gmail.com';

    	$mail_content = '';

    	$mail_content .= '<h4>Hi, dear '.$user_info->name.'</h4><br><br>';
    	$mail_content .= '<p>We are glad to inform you that your application for job titled <b><em>'.$job.'</em></b>,';
    	$mail_content .= 'has been submitted to our system. We will always make sure that you are informed on any updates<br>';
    	$mail_content .= 'from our side.</p>';
    	$mail_content .= '<p><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>';
    	$mail_content .= 'you can expect to see that job showed up within your taken job section.</p><br><br><br>';
    	$mail_content .= '<p>Thank you</p><br><br>';

    	Db::table('bebas_message')->insert(['recipient'=>$user,'msg_subject'=>$subject,'msg_content'=>$mail_content,'sender'=>0,'msg_status'=>1]);

    	Mail::send('mail.bebas_mail',['mail'=>$mail_content], function ($message) use ($subject,$user_email){

            $message->from('bebas@customerservice.com.my', 'BEBAS');

            $message->to($user_email)->subject($subject);
        });

    }
}
