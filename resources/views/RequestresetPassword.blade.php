@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restablecer contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="resetPassword">
                        @csrf
                        <div class="form-group row">

                            <label for="dni"
                                class="col-md-4 col-form-label text-md-right">{{ __('DNI del usuario') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror"
                                    name="dni" value="{{ $dni ?? old('dni') }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @if(Session::has('ErrorDNI'))
                                <p class="error-message">{{Session::get('ErrorDNI')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection