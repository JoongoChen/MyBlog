<?php
namespace App\Mailer;

use App\Models\User;
use Auth;

class UserMailer extends Mailer
{
    public function welcome(User $user)
    {
        $data = [
            'url'  => route('email.verify', ['token' => $user->confirmation_token]),
            'name' => $user->name
        ];
        $subject = '欢迎注册我们的网站';
        $this->sendTo('mailer.zhihu_app_register', $user->email, $data,$subject);
    }
}