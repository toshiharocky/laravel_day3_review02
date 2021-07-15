<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    // メールフォーム表示
    public function index(){
        return view('mail');
        
    }
    
    // メール送信処理
    public function send(Request $request){
        $email = $request->email;
        $text = $request->text;
        // dd($text);
        
        Mail::send(['text' => 'emails.test_mail_text'], [
            'text'=>$text
            ],
            function($message) use($email){
                
                $message
                    ->from('info@test.jp')
                    ->to($email)
                    ->subject("テストメールだよ！");
            });
            return redirect('mail');
    }
}
