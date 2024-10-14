<x-layout>

    <x-slot name="title"> Nueva nota</x-slot>

    <main class="content">

        <div class="cards">

            <div class="card card-center">

                <div class="card-body">

                    <h1>Nueva nota</h1>

                    @if ($errors->any())
                    
                    <div class="errros">
                        <p><strong>El formulario contiene errores</strong></p>


                        <ul>

                           @foreach ($errors->all() as $error)

                           <li>{{$error}}</li>
                           
                           @endforeach 


                        </ul>
                    </div>

                    @endif





                    <form action="{{route('notes.store')}}" method="POST">

                        @csrf

                        <label for="title" class="field-label">Titulo: </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="field-input @error('title') field-error @enderror">

                        @error('title')

                        <p class="error-message">{{ $message }}</p>

                        @enderror

                        <label for="content" class="field-label">Contenido:</label>
                        <textarea name="content" id="content" rows="10" class="field-textarea @error('content') field-error @enderror">{{ old('content') }}</textarea>

                        @error('content')

                        <p class="error-message">{{ $message }}</p>

                        @enderror



                        <button type="submit" class="btn btn-primary">Crear nota</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layout>