@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Accederemos aquí para editar un producto ya existente -->
                @if(@isset($shop))
                <div class="card-header">{{ __('Editar tienda') }}</div>

                <div class="card-body">

                    <form method="POST" action="EditShop">
                        @csrf

                        <div class="form-group row">
                            <label for="nameShop" class="col-md-4 col-form-label text-md-right">{{ __('Nombre empresa') }}</label>

                            <div class="col-md-6">
                                <input id="nameShop" type="text" class="form-control @error('nameShop') is-invalid @enderror" name="nameShop" value="{{ $shop->nameShop }}" required autocomplete="nameShop">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cif" class="col-md-4 col-form-label text-md-right">{{ __('CIF') }}</label>

                            <div class="col-md-6">
                                <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror" name="cif" value="{{$shop->cif }}" required autocomplete="cif" readonly>
                                
                                @error('cif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direction" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direction" type="text" class="form-control @error('direction') is-invalid @enderror" name="direction" value="{{ $shop->direction }}" required autocomplete="direction">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $shop->city }}" required autocomplete="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $shop->country }}" required autocomplete="country">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btn-submit" class="btn btn-primary" disabled>
                                    {{ __('Editar tienda') }}
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