@php
    $files  = scandir(storage_path('uploads'));
    foreach ($files as $i => $file){
        if (in_array($file, [".",".."])){
            unset($files[$i]);
        }
    }
    print_r($files);
    $cols=5;
    $rows=count($files)/$cols;
@endphp
<x-app-layout>
    <div class="mt-48">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-5 gap-1">
                    @foreach($files as $i => $file)
                            @php
                                $file_path = 'storage/uploads/'.$file;
                            @endphp
                        <div class="file flex flex-col align-center text-center">
                            <a href="{{$file_path}}">
                            <div><img src="/img/file2.png"></div>
                            
                            <div>{{ $file}}</div>
                            </a>
                        </div>
                    @endforeach
                </div>    
                @php
                    dump($files);    
                @endphp
                
            </div>
        </div>
    </div>
</x-app-layout>


