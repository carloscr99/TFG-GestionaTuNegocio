@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Accederemos aquí para editar un producto ya existente -->
                @if(@isset($product))
                <div class="card-header">{{ __('Editar producto') }}</div>

                <div class="card-body">

                    <form method="POST" action="EditProduct">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre del producto:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descripción:') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    required autocomplete="description">{{ $product->description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('Precio: ') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ $product->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock"
                                class="col-md-4 col-form-label text-md-right">{{ __('Cantidad disponible: ') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number"
                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                    value="{{ $product->stock }}" required autocomplete="stock" autofocus>

                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference"
                                class="col-md-4 col-form-label text-md-right">{{ __('Código de referencia:') }}</label>

                            <div class="col-md-6">
                                <input id="reference" type="text"
                                    class="form-control @error('reference') is-invalid @enderror" name="reference"
                                    value="{{ $product->reference }}" required autocomplete="reference" readonly>

                                @error('reference')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference"
                                class="col-md-4 col-form-label text-md-right">{{ __('Imagen del producto:') }}</label>

                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ $product->urlImagen }}" alt="Imagen del producto">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nueva Imagen del producto:') }}</label>
                            <input type="file" name="img-producto" id="img-producto" accept=".jpg, .jpeg, .png" />
                            <?php
// Obtenemos este datos para almacenar la imagen dentro de la carpeta correspondiente
$owner = Auth::user(); //Obtenemos la información del usuario loggeado
$cifEmpresa = $owner->workAt;
echo "<input id='cif' type='text' value='$cifEmpresa' hidden/>"
?>


                        </div>
                </div>

                <input id='urlProducto' name='urlProducto' type='text' value='' hidden />


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" id="btn-submit" class="btn btn-primary">
                            {{ __('Editar producto') }}
                        </button>

                    </div>
                </div>
                </form>

                @else
                <!-- Accederemos aquí para registrar un producto nuevo -->
                <div class="card-header">{{ __('Nuevo producto') }}</div>

                <div class="card-body">


                    <form method="POST" action="NewProduct">
                        @csrf


                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre del producto:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descripción:') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    required autocomplete="description">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('Precio: ') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock"
                                class="col-md-4 col-form-label text-md-right">{{ __('Cantidad disponible: ') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number"
                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                    value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference"
                                class="col-md-4 col-form-label text-md-right">{{ __('Código de referencia: *') }}</label>

                            <div class="col-md-6">
                                <input id="reference" type="text"
                                    class="form-control @error('reference') is-invalid @enderror" name="reference"
                                    value="{{ old('reference') }}" required autocomplete="reference">

                                @error('reference')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference"
                                class="col-md-4 col-form-label text-md-right">{{ __('Imagen del producto:') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="img-producto" id="img-producto" accept=".jpg, .jpeg, .png"
                                    disabled />
                                <?php
// Obtenemos este datos para almacenar la imagen dentro de la carpeta correspondiente
$owner = Auth::user(); //Obtenemos la información del usuario loggeado
$cifEmpresa = $owner->workAt;
echo "<input id='cif' type='text' value='$cifEmpresa' hidden/>"
?>


                            </div>
                        </div>

                        <input id='urlProducto' name='urlProducto' type='text' value='' hidden />


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btn-submit" class="btn btn-primary" disabled>
                                    {{ __('Añadir producto') }}
                                </button>

                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <p>* Este código no se podrá editar una vez guardado el producto</p>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
habilitarBotonNewProduct();
// Script para subir la imagen a google Firebase
var imagenASubir = document.getElementById("img-producto");
var cif = document.getElementById("cif").value;
console.log(cif);

if (imagenASubir) {
    imagenASubir.addEventListener('change', function(e) {
        //Obtenemos la referencia del producto indicada por el usuario
        var referencia = document.getElementById("reference").value;
        console.log(referencia);
        //Obtenemos el fichero
        var file = e.target.files[0];

        //Creamos la referencia de almacenaje
        var storageRef = firebase.storage().ref(cif + "/" + referencia);

        //Subimos la imagen
        var uploadTask = storageRef.put(file);

        uploadTask.on('state_changed', function(snapshot) {
            // Observe state change events such as progress, pause, and resume
            // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
            switch (snapshot.state) {
                case firebase.storage.TaskState.PAUSED: // or 'paused'
                    console.log('Upload is paused');
                    break;
                case firebase.storage.TaskState.RUNNING: // or 'running'
                    console.log('Upload is running');
                    break;
            }
        }, function(error) {
            // Handle unsuccessful uploads
        }, function() {
            // Handle successful uploads on complete
            // For instance, get the download URL: https://firebasestorage.googleapis.com/...
            uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                console.log('File available at', downloadURL);
                document.getElementById("urlProducto").value = downloadURL;

            });
        });


    });
}
</script>
@endsection