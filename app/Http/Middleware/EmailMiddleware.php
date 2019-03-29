<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $res = $next($request);

        //注册成功后，发送邮件
        $mail = new Message;
        $mail->setFrom('TThekey <18268227796@163.com>')
            ->addTo($request->user()->email)
            ->setSubject('register successfully')
            ->setBody("Hello, Your order has been accepted.");

        $mailer = new SmtpMailer([
            'host' => 'smtp.163.com',
            'username' => '18268227796@163.com',
            'password' => 'qwe123',
//            'secure' => 'ssl',
//            'context' =>  [
//                'ssl' => [
//                    'capath' => '/path/to/my/trusted/ca/folder',
//                ],
//            ],
        ]);
        $mailer->send($mail);

        return $res;

    }
}
