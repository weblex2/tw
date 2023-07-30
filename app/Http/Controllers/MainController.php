<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sendMail(Request $request) {
        $name      = $request->name;
        $subject   = $request->subject;
        $email     = $request->email;
        $body      = nl2br($request->body);
        $data = array('name'=>$name, 'email' => $email, 'subject' => $subject, 'body' => $body);

        $res = Mail::send(['html'=>'mail'], $data, function($message) use ($data) {
            $message->to('alex@noppenberger.org', 'info@cheer-base');
            $message->subject($data['subject']);
            $message->from($data['email'],$data['name']);
        });



        if ($res){
            return response()->json([
                'success' => true
            ], 200);
        }
        else{
            return response()->json([
                'success' => false
            ], 500);
        }
    }
}
