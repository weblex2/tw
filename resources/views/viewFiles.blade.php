@php
    //dump($files);
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CheerBase - File Explorer ') }}
        </h2>
    </x-slot>
    <div>
        <div class="w-full bg-white mx-auto sm:px-6 border-t border-gray-200 ">
            <div class="flex">
                <div class="p-3 w-fit hover:bg-gray-200 rounded">
                    <a href="{{route("createFolder")}}" /*onclick="createFolder()"*/>
                    <div><img src="img/new_folder.png" class="float-left w-6 mr-1 "><span class="font-extrabold">Create Folder</span></div> 
                    </a>
                </div>    

                <div class="p-3 w-fit hover:bg-gray-200 rounded">
                    <a href="uploadFile?path={{$currentFolder}}">
                    <div><img src="img/upload_file.png" class="float-left w-6 mr-1"><span class="font-extrabold">Upload File</span></div> 
                    </a>
                </div>
            </div>      
        </div>    
        <div class="w-full mx-auto sm:px-6 lg:px-0 border-t border-gray-200">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 font-extrabold text-xl">{{$currentFolder}}</div>
                <div class="grid grid-cols-5 gap-1 p-5">
                    @if ($currentFolder!='uploads')
                    <a href="fileExplorer?path={{$parentFolder}}">
                        <span><img src="/img/folder.png" class="w-5 mt-1 float-left ml-1">..</span>
                    </a>  
                    @endif
                    @foreach($files as $i => $file)
                        <div class="file flex align-center text-center">
                                <div>
                                    
                                    {{-- <a href="{!! route('deleteFile', $file['fullPath']) !!}">
                                        <span><img src="/img/delete-file.png" class="w-3 mt-1 float-left ml-1"></span>
                                    </a> --}}    

                                    @if ($file['isDir'])
                                        <a href="fileExplorer?path={{$file['fullPath']}}">
                                            <span><img src="/img/folder.png" class="w-5 float-left"></span>
                                            <span class="float-left">{{ $file['name'] }}</span>
                                        </a>
                                    @else
                                        <a href="downloadFile?file={!! $file['fullPath'] !!}" target="_blank">
                                            <span><img src="/img/file2.png" class="w-5 float-left"></span>
                                            <span class="float-left">{{ $file['name'] }}</span>
                                        </a>
                                    @endif
                                </div>
                        </div>
                    @endforeach
                    @if (count($files) == 0)
                        <div class="col-span-5">No files.. </div>
                    @endif
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


