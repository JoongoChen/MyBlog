<?php

namespace App\Mailer;

use Mail;

class Mailer
{
    public function sendTo($template,$email,$data,$subject)
    {
        Mail::send($template, $data, function ($message) use ($email,$subject) {
            $message->from('1042315333@qq.com', 'Laravel');
            $message->to($email)->subject($subject);
        });
    }
}