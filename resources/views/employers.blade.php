@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Tus empleados</h4>
                            <p class="card-text">Añade aquí tus empleados. Con esto podrás ver de un vistazo todos 
                            los trabajadores que tienes en tu empresa
                            </p>
                        </div>
                        <div class="card-footer">
                        @if(\Auth::user()->rol == 'trabajador')
                        <a class="btn btn-primary-disabled">Añadir empleado</a>
                        @else
                        <a href="{{ route('NewEmployer') }}" class="btn btn-primary">Añadir empleado</a>
                        @endif

                        </div>
                    </div>
                </div>

                @foreach($employers as $employer)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$employer->name}}</h4>
                            <p class="card-text">{{$employer->email}}</p>
                            <p class="card-text">{{$employer->rol}}</p>
                        </div>
                        <div class="card-footer">
                        @if((\Auth::user()->rol == 'trabajador') && Auth::user()->dni == $employer->dni)
                            <a href={{ route('EmployerEdit', [$employer->dni])}} class="btn btn-primary">Editar empleado</a>

                        @else
                        <a class="btn btn-primary-disabled">Editar empleado</a>
                        @endif
                        </div>
                        <a onclick="deleteEmployer('{{$employer->dni}}', '{{$employer->rol}}', '{{Auth::user()->rol}}')"
                            class="btn btn-danger">Eliminar empleado</a>
                    </div>
                </div>

                @endforeach

            
            </div>
        </div>
    </div>
    @endsection