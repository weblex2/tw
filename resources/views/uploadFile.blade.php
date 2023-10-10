<x-app-layout>
    <div class="">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
       
                <div class="panel panel-primary">
    
                <div class="panel-heading mb-5 text-xl font-extrabold">
                    <h2>CheerBase - File Upload</h2>
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
                            <label class="form-label" for="inputFile">File:</label>
                            <input 
                                type="file" 
                                name="file" 
                                id="inputFile"
                                class="form-control @error('file') is-invalid @enderror">
            
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <button type="submit" class="btn border-grey-900 bg-green-600 px-5 py-3 rounded-xl text-white font-extrabold ">Upload</button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>        
            