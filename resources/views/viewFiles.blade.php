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
                    <a href="javascript:void(0)" onClick="$('#newFolder').removeClass('hidden')">
                    <div><img src="img/new_folder.png" class="float-left w-6">&nbsp;&nbsp;<span class="font-extrabold">Create Folder</span></div> 
                    </a>
                </div>    

                <div class="p-3 w-fit hover:bg-gray-200 rounded">
                    <a href="uploadFile?path={{$currentFolder}}">
                    <div><img src="img/upload_file.png" class="float-left w-6">&nbsp;&nbsp;<span class="font-extrabold">Upload File</span></div> 
                    </a>
                </div>
            </div>      
        </div>    
        <div class="w-full mx-auto sm:px-6 lg:px-0 border-t border-gray-200">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 font-extrabold text-xl">{{$currentFolder}}</div>
                <div class="grid grid-cols-5 gap-1 p-5">
                    @if ($currentFolder!='uploads')
                    <div class="hover:bg-gray-200 p-2">
                    <a href="fileExplorer?path={{$parentFolder}}">
                        <span><img src="/img/folder.png" class="w-5 mt-2 float-left ml-1">..</span>
                    </a>  
                    </div>
                    @endif
                    @foreach($files as $i => $file)
                        <div class="p-2 file flex align-center text-center hover:bg-gray-200 fileWrapper">
                                <div class="pt-1">
                                    @if ($file['isDir'])
                                        @if ($file['deletable'])
                                        <a href="deleteFile?file={!! $file['fullPath'] !!}">
                                            <span><img src="/img/delete-file.png" class="w-3 mt-1 mr-1 float-left ml-1" alt="Ordner löschen" title="Ordner löschen"></span>
                                        </a>
                                        @endif
                                        <a  href="fileExplorer?path={{$file['fullPath']}}">
                                            <span><img src="/img/folder.png" class="mr-1 w-5 float-left"></span>
                                            <span class="float-left">{{ $file['name'] }}</span>
                                        </a>
                                        
                                    @else
                                        <a  href="downloadFile?file={!! $file['fullPath'] !!}" target="_blank">
                                            <span><img src="/img/file2.png" class="mr-1 w-5 float-left"></span>
                                            <span class="float-left fn">{{ $file['name'] }}</span>
                                        </a>
                                        {{-- deleteFile?file={!! $file['fullPath'] !!} --}}
                                        <a href="javascript:void(0)" onClick="deleteFile($(this))">
                                            <span><img src="/img/delete-file.png" class="w-3 mt-1 float-left ml-1"></span>
                                        </a>
                                    @endif
                                </div>
                        </div>
                    @endforeach
                    @if (count($files) == 0)
                        <div class="p-2 file flex align-center text-center hover:bg-gray-200">No files.. </div>
                    @endif
                </div>    
            </div>
        </div>
    </div>
    
    <div id="newFolder" class="fixed hidden top-0 left-0 w-screen h-screen flex bg-black bg-opacity-80 justify-center items-center">
        <div class="bg-white shadow-xl p-10 rounded-xl w-[60%] block">
            <div class="float-right mr-2 -mt-2 -ml-2 w-5">
                <a href="javascript:void(0)" onClick="$('#newFolder').addClass('hidden')">
                <img  src='img/close.png'>
                </a>
            </div>
            <h1 class="font-extrabold text-xl mb-5">Ordner erstellen</h1>
            Ordnername 
            <form id="frmNewFolder" action="createNewFolder" method="post">
                @csrf
            <div class="">
                <input type="text" name='folderName' class="rounded bg-gray-100 w-full">
                <input type="hidden" name="path" value="{{$currentFolder}}">
            </div>    
            <div>
                <button type="submit" class="bg-blue-400 border border-blue-900 px-6 py-2 rounded mt-10">Erstellen</button>
            </div>    
            </form>
        </div>
    </div>    


    <div id="deleteFile" class="fixed hidden top-0 left-0 w-screen h-screen flex bg-black bg-opacity-80 justify-center items-center">
        <div class="bg-white shadow-xl p-10 rounded-xl w-[60%] block">
            <div class="float-right mr-2 -mt-2 -ml-2 w-5">
                <a href="javascript:void(0)" onClick="$('#deleteFile').addClass('hidden')">
                <img  src='img/close.png'>
                </a>
            </div>
            <h1 class="font-extrabold text-xl mb-5">Delete File</h1>
            <div>File <span id="fnDel">Filename</span> wiklich löschen? </div>
            <form id="frmNewFolder" action="createNewFolder" method="post">
                @csrf
            <div class="">
                <input type="text" name='folderName' class="rounded bg-gray-100 w-full">
                <input type="hidden" name="path" value="{{$currentFolder}}">
            </div>    
            <div>
                <button type="submit" class="bg-blue-400 border border-blue-900 px-6 py-2 rounded mt-10">Erstellen</button>
            </div>    
            </form>
        </div>
    </div>    

    <script>
        function deleteFile(el){
            var filename=el.closest('.fileWrapper').find('.fn').text();
            console.log("fn="+filename)   ;
            $('#fnDel').text(filename);  
            $('#deleteFile').removeClass('hidden');  
        }
    </script>    

</x-app-layout>


