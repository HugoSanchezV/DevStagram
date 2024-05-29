 @extends('layouts.app')

 @section('title', 'Crea una nueva Publicación')


@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
 <div class="md:flex md:items-center">
     <div class="md:w-1/2 px-10">
         <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded
         flex flex-col justify-center items-center" action="{{ route('images.store' )}}" method="POST" enctype="multipart/form-data">
            @csrf
         </form>
     </div>

     <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
         <form action="{{ route('register') }}" method="POST">
             @csrf
             <div class="mb-5">
                 <label for="title" class="mb-2 uppercase text-gray-500 font-bold">
                     Título
                 </label>

                 <input type="text" id="title" name="title" placeholder="Título de la Publicación "
                     class="border p-3 w-full rounded-lg  
                        @error('name')
                            border-red-500
                        @enderror"
                     value="{{ old('title') }}">
                 @error('name')
                     <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                           ">
                         {{ $message }}
                     </p>
                 @enderror
             </div>

             <div class="mb-5">
                 <label for="description" class="mb-2 uppercase text-gray-500 font-bold">
                     Descripción
                 </label>


                <textarea name="description" id="description" cols="30" rows="10" placeholder="Descripción de la publicación"
                class="border p-3 w-full rounded-lg @error('description')
                    border-red-500
                @enderror">{{ old('description') }}</textarea>

                 @error('description')
                     <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center">
                         {{ $message }}
                     </p>
                 @enderror
             </div>



             <input type="submit" value="Publicar"
                 class="bg-sky-500 hover:bg-sky-700 
                    transition-colors 
                    cursor-pointer 
                    uppercase 
                    font-bold 
                    w-full p-3 
                    text-white 
                    rounded-lg">

         </form>

     </div>
 </div>
@endsection
