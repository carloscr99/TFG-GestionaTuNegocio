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
                                <button type="submit" id="btn-submit" class="btn btn-primary">
                                    {{ __('Guardar cambios') }}
                                </button>
                                <a onClick="deleteShop('{{ $shop->cif  }}', '{{Auth::user()->rol}}')" class="btn btn-danger">
                                    {{ __('Eliminar tienda') }}
                                </a>

                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection