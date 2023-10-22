@php
    
    if ($currentFolder != "uploads"){
        $back = [
            "isDir" => true,
            "name" => "..",
            "deletable" => false,
            "relPath" => "..asd",
            "fullPath" => $parentFolder
        ] ;
        array_unshift($files,$back) ;
        //dump($files);
    }
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
                    <div><img src="img/icons8-upload-32.png" class="float-left w-6">&nbsp;&nbsp;<span class="font-extrabold">Upload File</span></div> 
                    </a>
                </div>
            </div>      
        </div>    
        <div class="w-full mx-auto sm:px-6 lg:px-0 border-t border-gray-200">
            @php
                $cols = 5;
                $cntfill  = $cols - (count($files)%$cols);
            @endphp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 font-extrabold text-xl">{{$currentFolder}}</div>
                <div class="grid grid-cols-{{$cols}}  p-5">
                    
                    {{-- @if ($currentFolder!='uploads')
                    <div class="relative p-2 file flex align-center text-center hover:bg-gray-200 fileWrapper border-dashed border-l border-zinc-400">
                        <div class="pt-1">
                        <a href="fileExplorer?path={{$parentFolder}}">
                            <span><img src="/img/icons8-folder-32 (1).png" class="w-5 float-left ml-1">..</span>
                            <div class="absolute right-2">
                                <span><img src="/img/icons8-trash-94_2.png" class="w-5 mr-1 -mt-6 float-left ml-1" alt="Ordner löschen" title="Ordner löschen"></span>
                            </div>
                        </a>  
                        </div>
                    </div>
                    @endif --}}

                    

                    @foreach($files as $i => $file)


                        <div class="relative p-2 file flex align-center text-center hover:bg-gray-200 fileWrapper border-dashed  border-zinc-400">
                                <div class="pt-1 ">
                                    @if ($file['isDir'])
                                        
                                        <a  href="fileExplorer?path={{$file['fullPath']}}">
                                            <span><img src="/img/icons8-folder-32 (1).png" class="mr-1 w-5 float-left"></span>
                                            <span class="float-left fn text-ellipsis">{{ $file['name'] }}</span>
                                        </a>
                                        @if ($file['deletable'])
                                        <div class="absolute right-2">
                                        <a href="javascript:void(0)" onClick="deleteFile($(this))">
                                            <span><img src="/img/icons8-trash-94.png" class="w-5 mr-1 float-left ml-1" alt="Ordner löschen" title="Ordner löschen"></span>
                                        </a>
                                        </div>
                                        @else
                                        <div class="absolute right-2">
                                                <span><img src="/img/icons8-trash-94_2.png" class="w-5 mr-1 float-left ml-1" alt="Ordner löschen" title="Ordner löschen"></span>
                                        </div>
                                        @endif
                                        
                                    @else
                                        @php 
                                            $farr = explode('.',$file['name']);
                                            $ext  = $farr[count($farr) - 1];
                                        
                                        switch ($ext){
                                            case 'docx':
                                                $icon = '/img/icons8-microsoft-word-48.png';
                                                break;
                                            case 'xls':
                                                $icon = '/img/icons8-xls-48.png';
                                                break; 
                                            case 'xlsx':
                                                $icon = '/img/icons8-xls-48.png';
                                                break; 
                                            case 'pdf':
                                                $icon = '/img/icons8-acrobat-67 (1).png';
                                                break;          
                                            default:
                                                $icon = '/img/icons8-file-94.png';
                                        }
                                        @endphp

                                        <a  href="downloadFile?file={!! $file['fullPath'] !!}" target="_blank">
                                            <span><img src="{{$icon}}" class="mr-1 w-5 float-left"></span>
                                            <p class="float-left fn text-ellipsis overflow-hidden whitespace-nowrap" title="{{$file['name']}}">
                                                {{ $file['name'] }} 
                                            </p>
                                        </a>
                                        {{-- deleteFile?file={!! $file['fullPath'] !!} --}}
                                        <div class="absolute right-3">
                                        <a href="javascript:void(0)" onClick="deleteFile($(this))">
                                            <div><img src="/img/icons8-trash-94.png" class="w-5 float-left"></div>
                                        </a>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    @endforeach

                    @if ($cntfill>0 && count($files)>0)
                        @for($i = 0; $i<$cntfill; $i++)
                        
                        <div class="relative p-2 file flex align-center text-center fileWrapper border-dashed border-l border-zinc-400">&nbsp;</div>
                        @endfor
                    @endif
                    

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
                <img  src='img/icons8-delete-48.png'>
                </a>
            </div>
            <h1 class="font-extrabold text-xl mb-5">Delete File</h1>
            <div> <span class="font-extrabold text-xl" id="fnDel">Filename</span> wirklich löschen? </div>
            <form id="frmNewFolder" action="deleteFile" method="post">
                @csrf
            <div class="">
                <input type="hidden" id="delpath" name="path" value="{{$currentFolder}}">
            </div>    
            <div>
                <button type="submit" class="bg-red-400 border border-red-900 px-6 py-2 rounded mt-10">Löschen</button>
            </div>    
            </form>
        </div>
    </div>    

    <script>
        var path="<?php echo $currentFolder; ?>";

        function deleteFile(el){
            var filename=el.closest('.fileWrapper').find('.fn').text();
            console.log("fn="+path+"/"+filename)   ;
            $('#fnDel').text(filename);  
            $('#delpath').val(path+"/"+filename);
            $('#deleteFile').removeClass('hidden');  
        }
    </script>    

</x-app-layout>


