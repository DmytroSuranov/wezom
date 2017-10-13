<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function getAboutPage(){
	    return view('about');
    }

	public function getSendMessage(Request $request){
		$body_msg = "Пользователь : ".$request->fio."\r\n";
		$body_msg .= "Телефон : ".$request->phone."\r\n";
		$body_msg .= "Email : ".$request->email."\r\n";
		$body_msg .= "Сообщение : ".$request->msg."\r\n";
		$headers = 'From: '.$request->email."\r\n" .
			'Reply-To: '.$request->email."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		$mail_sent = mail($request->email, "Message From Contact Page", $request->msg,$headers);
		if($mail_sent){
			return redirect('/contact')->with(['message' => 'Сообщение было отправлено']);
		}else{
			return redirect('/contact')->with(['message' => 'Сообщение не было отправлено']);
		}
	}

	public function getContactPage(){
	    return view('contact');
    }
}
