@php
    $files  = scandir(storage_path('uploads'));
    foreach ($files as $i => $file){
        if (in_array($file, [".",".."])){
            unset($files[$i]);
        }
    }
    //print_r($files);
    $cols=5;
    $rows=count($files)/$cols;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Files') }}
        </h2>
    </x-slot>
    <div>
        <div class="w-full bg-white mx-auto sm:px-6 border-t border-gray-200 ">
            <div class="p-3 w-fit hover:bg-gray-200 rounded ">
                <a href="#" onclick="createFolder()">
                <div><img src="img/new_folder.png" class="float-left w-6 mr-1 "><span class="font-extrabold">Create Folder</span></div> 
                </a>
            </div>    

            <div class="p-3 w-fit hover:bg-gray-200 rounded">
                <a href="{{route('uploadFile')}}">
                <div><img src="img/upload_file.png" class="float-left w-6 mr-1"><span class="font-extrabold">Upload File</span></div> 
                </a>
            </div>  
        </div>    
        <div class="w-full mx-auto sm:px-6 lg:px-0 border-t border-gray-200">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-5 gap-1 p-5">
                    @foreach($files as $i => $file)
                            @php
                                $file_path = $file;
                            @endphp
                        <div class="file flex align-center text-center">
                            
                                <div>
                                    <a href="{!! route('deleteFile', $file) !!}">
                                        <span><img src="/img/delete-file.png" class="w-3 mt-1 float-left ml-1"></span>
                                    </a>    
                                    
                                    <a href="{!! route('downloadFile', $file) !!}" download>
                                        <span><img src="/img/file2.png" class="w-5 float-left"></span>
                                        <span class="float-left">{{ $file}}</span>
                                    </a>
                                </div>
                            
                        </div>
                    @endforeach
                </div>    
            </div>
        </div>
    </div>
    <script>
        function createFolder(){
            alert("Jo, das mit den Ordnern kommt noch...");
        }        
    </script>    
</x-app-layout>


