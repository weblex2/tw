<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;



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
            $message->to('info@cheer-base.de', 'info@cheer-base');
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

    public function uploadFile(){
        return view('uploadFile');
    }

    public function viewFiles(){
        return view('viewFiles');
    }

    public function storeFile(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
      
        $fileName = time().'.'.$request->file->extension();  
       
        $request->file->move(storage_path('uploads'), $fileName);
     
        /*  
            Write Code Here for
            Store $fileName name in DATABASE from HERE 
        */
       
        return back()
            ->with('success','File successfully uploaded.')
            ->with('file', $fileName);
   
    }

    public function downloadFile($path){
        echo $path;
    }
}
