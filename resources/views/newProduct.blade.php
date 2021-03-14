@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                                class="col-md-4 col-form-label text-md-right">{{ __('Código de referencia:') }}</label>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Añadir producto') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- @include('sweetalert::alert') -->
@endsection