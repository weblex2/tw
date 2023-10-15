<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;

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
        if (isset($_GET['path'])){
            $path  = $_GET['path'];
        }
        else{
            $path="uploads";
        }
        $currentFolder=$path;
        $path  = storage_path($currentFolder); 
        $dirs  = File::directories($path);
        asort($dirs);  

        #$name = array_column($dirs, 'name');
        #array_multisort( $name, SORT_ASC, $dirs);

        //dump($dirs);
        $files = File::files($path); 
        foreach ($dirs as $i => $dir){
            $dir  = new SplFileInfo($dir);
            $d['isDir'] = true;
            $d['name']=$dir->getBasename();
            $fullDirPath = storage_path($currentFolder."/".$dir->getBasename());
            $filesInDir  = scandir($fullDirPath);
            $d['deletable'] = count($filesInDir)>2 ? false : true;
            $d['relPath']=$currentFolder;
            $d['fullPath']=$currentFolder."/".$dir->getBasename();
            unset($dirs[$i]);
            $dirs[] = $d;
        }

        
        
        foreach($files as $i => $file){
            $f['isDir'] = false;
            $f['name']=$file->getBasename();
            $f['relPath']=$currentFolder;
            $f['fullPath']=$currentFolder."/".$file->getBasename();
            $f['ext']=$file->getExtension();
            unset($files[$i]);
            $files[] = $f;
        }

        $files = array_merge($dirs, $files);
        //dump($files);
        $cf  = explode('/',$currentFolder);
        unset($cf[count($cf)-1]);
        $parentFolder = implode('/',$cf);
        return view('viewFiles',compact('files','currentFolder','parentFolder'));
    }

    public function storeFile(Request $request): RedirectResponse
    {
        $request->validate([
            #'file' => 'required|max:2048',
            'file' => 'required',
        ]);

        $path=$request->path;
        if ($path==""){
            $path="uploads";
        }
      
        $fileName = $request->file->getClientOriginalName();  
        $request->file->move(storage_path($path), $fileName);
     
        /*  
            Write Code Here for
            Store $fileName name in DATABASE from HERE 
        */
       
        $path  = "fileExplorer?path=".$path;
        return redirect($path);
        return back()
            ->with('success','File successfully uploaded.')
            ->with('file', $fileName);
   
    }

    public function downloadFile(){
       if (isset($_GET['file'])){
        $file = $_GET['file'];
       } 
       else {
        return "file not found.";
       }
       $file = storage_path().'/'.$file;
       return response()->download($file);
    }

    public function deleteFile(){
        if (isset($_GET['file'])){
            $file = $_GET['file'];
        } 
        else {
            return "file not found.";
        }
        $fileToDelete = storage_path().'/'.$file;
        if (is_dir($fileToDelete)){
            rmdir($fileToDelete);    
        }
        else{
            unlink($fileToDelete);
        }    
        $p =explode('/', $file);
        unset($p[count($p)-1]); 
        $path = implode('/', $p);
        return redirect('fileExplorer?path='.$path);
    }    

    

    
    public function createFolder(Request $request){
        //dump ($request);
        $folder = $request->folderName;
        $path  = $request->path;
        if ($path==""){
            $path2 = storage_path("uploads/");
        }
        else{
            $path2 = storage_path($path);
        }
        $folder = $path2.'/'.$folder;
        $res = File::makeDirectory($folder);
        return redirect('fileExplorer?path='.$path);
    } 
}
