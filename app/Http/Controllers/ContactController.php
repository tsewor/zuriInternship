<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class ContactController extends Controller
{
    public function contact(Request $request){

    	$fullname 	= $request->input('name');
        $email 		= $request->input('email');
        $subject  	= $request->input('subject');
        $message  	= $request->input('message');

        $data = array(
        	'name'=>$request->input('name'),
        	'email'=>$request->input('email'),
        	'subject'=>$request->input('subject'),
        	'message'=>$request->input('message'),

        );

        \Mail::send('mail',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->subject($request->subject);
                  $message->to('hnginternship@gmail.com');
               });

        //dd(back()->getTargetUrl());

          //return back()->with('success', 'Thank you for contact us!');

        //return redirect()->back()->with('success', 'Thank you for contact us!');

        //return redirect()->back()->getTargetUrl();

       return redirect()->to(back()->getTargetUrl().'#contact')->with('success', 'you for contact us!');;

    }
}
