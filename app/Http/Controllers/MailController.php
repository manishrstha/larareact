<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $comments = $request->input('comments');
        $phone = $request->input('phone');

        Mail::send('emails.send', ['name' => $name, 'email' => $email, 'phone' => $phone, 'comments' => $comments,'subject'=>$subject],function ($msg) use ($email, $subject)
        {

            $msg->from($email);
            $msg->subject($subject);

            $msg->to('e03f5edf98-024f80@inbox.mailtrap.io');

        });
        return redirect('/thanks');
    }
}
