<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MainController extends Controller
{
    public function index(){
        //$this->sendMail('alex@noppenberger.org','Hi', 'Ho');
        return view('index');
    }

    public function sendMail(Request $request) {
        $name = $request->name;
        $firstname = $request->firstname;
        $subject   = $request->subject;
        $body = $request->body;
        $data = array('name'=>$name." ".$firstname);

        Mail::send(['html'=>'mail'], $data, function($message) {
            $message->to('alex@noppenberger.org', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('alex@noppenberger.org','Virat Gandhi');
        });
    }
}
