@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


            <div class="card-header">{{ __('Nuevo proveedor') }}</div>

            <div class="card-body">
                <form method="POST" action="NewEmployer">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre ') }}</label>

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
                        <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI ') }}</label>

                        <div class="col-md-6">
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror"
                                name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                            @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="iban"
                            class="col-md-4 col-form-label text-md-right">{{ __('Cuenta bancaria ') }}</label>

                        <div class="col-md-6">
                            <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror"
                                name="iban" value="{{ old('iban') }}" required autocomplete="iban" autofocus>

                            @error('iban')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol: ') }}</label>
                        <div class="col-md-6">
                            <select id="rol" name="rol" class="btn btn-secondary btn-lg dropdown-toggle">
                                <option> Seleciona su rol</option>
                                <option value="trabajador" {{old('rol') == 'trabajador' ? 'selected' : ''}}>
                                    Trabajador</option>
                                <option value="encargado" {{old('rol') == 'encargado' ? 'selected' : ''}}>Encargado
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Añadir empleado') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('home') }}">
                                {{ __('No tengo mas empleados que añadir') }}
                            </a>
                        </div>
                    </div>
                </form>
              <!-- endif -->
            </div>
        </div>
    </div>
</div>


@endsection