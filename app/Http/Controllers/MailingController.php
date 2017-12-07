<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function index(Request $request){

        $inbox = Db::table('bebas_message')->where('recipient',Auth::id())->paginate(15);

        // foreach($inbox as $app){

        //     $app_date = Carbon::parse($app->msg_date);
        //     $app->msg_date = $app_date->toFormattedDateString();

        // }

        $data['inbox'] = $inbox;


        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

    	return view('inbox.index',$data);

    }

    public function viewMail(Request $request){

        $msg_id = $request->input('id');

        $msg_info = Db::table('bebas_message')->where('msg_id',$msg_id)->first();

        $app_date = Carbon::parse($msg_info->msg_date);
        $msg_info->msg_date = $app_date->toFormattedDateString();

        $data['msg'] = $msg_info;

        Db::table('bebas_message')->where('msg_id',$msg_id)->update(['msg_status'=>0]);

        
        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

        return view('inbox.viewmail',$data);

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

    public function mailConfirmAccept($user,$job){

        $user_info = Db::table('users')->where('id',$user)->first();

        $subject = 'BEBAS Accepted Application';
        // $user_mail = $user_info->email;
        $user_email = 'amrin317@gmail.com';
        // $user_email = 'habibmohdsaufi@gmail.com';

        $mail_content = '';

        $mail_content .= '<h4>Hi, dear '.$user_info->name.'</h4><br><br>';
        $mail_content .= '<p>We are glad to inform you that your application for job titled <b><em>'.$job.'</em></b>,';
        $mail_content .= 'has been accepted by the owner.</p>';
        $mail_content .= '<p><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>';
        $mail_content .= 'you can expect to see that job showed up within your taken job section.</p><br><br><br>';
        $mail_content .= '<p>Thank you</p><br><br>';

        Db::table('bebas_message')->insert(['recipient'=>$user,'msg_subject'=>$subject,'msg_content'=>$mail_content,'sender'=>0,'msg_status'=>1]);

        Mail::send('mail.bebas_mail',['mail'=>$mail_content], function ($message) use ($subject,$user_email){

            $message->from('bebas@customerservice.com.my', 'BEBAS');

            $message->to($user_email)->subject($subject);
        });

    }

    public function mailComplete($user,$job){

        $user_info = Db::table('users')->where('id',$user)->first();

        $subject = 'BEBAS Completed Job';
        // $user_mail = $user_info->email;
        $user_email = 'amrin317@gmail.com';
        // $user_email = 'habibmohdsaufi@gmail.com';
        // $user_email = 'faizrazak12.my@gmail.com';

        $mail_content = '';

        $mail_content .= '<h4>Hi, dear '.$user_info->name.'</h4><br><br>';
        $mail_content .= '<p>We are glad to inform you that your job titled <b><em>'.$job.'</em></b>,';
        $mail_content .= 'has been completed by the the client.</p>';
        $mail_content .= '<p><br>Go to MyJob tab to check <br>';
        $mail_content .= '<p>Thank you</p><br><br>';

        Db::table('bebas_message')->insert(['recipient'=>$user,'msg_subject'=>$subject,'msg_content'=>$mail_content,'sender'=>0,'msg_status'=>1]);

        Mail::send('mail.bebas_mail',['mail'=>$mail_content], function ($message) use ($subject,$user_email){

            $message->from('bebas@customerservice.com.my', 'BEBAS');

            $message->to($user_email)->subject($subject);
        });


    }

    public function composeNew(Request $request){

        $unr = new HomeController;
        $data['unread'] = $unr->getUnread();

        return view('inbox.compose',$data);

    }

    public function sendmail(Request $request){

        $mail_content = $request->input('content');
        $user_email = $request->input('email');
        $subject = $request->input('subject');

        $user_info_count = Db::table('users')->where('email',$user_email)->count();

        if($user_info_count <> 0){

            $user_info = Db::table('users')->where('email',$user_email)->first();

            Db::table('bebas_message')->insert(['recipient'=>$user_info->id,'msg_subject'=>$subject,'msg_content'=>$mail_content,'sender'=>Auth::id(),'msg_status'=>1]);
        }

        Mail::send('mail.bebas_mail',['mail'=>$mail_content], function ($message) use ($subject,$user_email){

            $message->from('bebas@customerservice.com.my', 'BEBAS');

            $message->to($user_email)->subject($subject);
        });

    }
}
