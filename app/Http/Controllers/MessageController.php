<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
class MessageController extends Controller
{
    //
    public function store()
    {
    	 $message = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'content'=> 'required|min:3',
            'g-recaptcha-response' => 'required|captcha'
    	]);

    	//enviar email-
    	Mail::to('tienda@prodinetpc.net')->send(new MessageReceived($message));

        //return new MessageReceived($message);  ver el mensaje en desarrollo no en modo real
    	return back()->with('toast_success','Recibimos tu mensaje, te responderemos en menos de 24 horas');
    }
}
