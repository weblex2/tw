<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cheer-Base - Upload Files') }}
        </h2>
    </x-slot>
    <div>
        <div class="w-full bg-white mx-auto sm:px-6 border-t border-b-2 border-gray-200 p-10">
                
                <div class="panel-heading mb-5 text-xl font-extrabold">
                    <h2>File Upload</h2>
                </div>

                <div class="panel-body w-full ">
                    @if ($message = Session::get('success'))
                        <div class="p-5 border-green-900 bg-green-300 text-black rounded-xl mb-5">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                
                    <form action="{{ route('storeFile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div class="mb-3">
                            <label class="form-label" for="inputFile">File:<br></label>
                            <input type="hidden" name="path" value="{{ $_GET['path'] }}" />
                            <input 
                                type="file" 
                                name="file" 
                                id="inputFile"
                                class="mb-3 form-control @error('file') is-invalid @enderror">
            
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <button type="submit" class="btn border-blue-900 bg-blue-600 px-5 py-3 rounded-xl text-white font-extrabold ">Upload</button>
                            {{-- <a href="fileExplorer?path={{$_GET['path']}}" class="btn border-blue-900 bg-blue-600 px-5 py-3 rounded-xl text-white font-extrabold ">View Files</a> --}}
                        </div>
                    </form>
                
                </div>
            </div>
    </div>
</x-app-layout>        
            