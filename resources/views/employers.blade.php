@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card my-4">
                <h5 class="card-header">Búsqueda</h5>
                <form class="card-body">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input id='searchEmployer' type="text" class="form-control" placeholder="Quiero buscar..."
                            name="q">
                        <span class="input-group-btn">

                        </span>
                    </div>
                </form>
            </div>
            <div class="my-4">
                <select id="orderByEmployers" name="orderBy" class="btn btn-secondary btn-lg dropdown-toggle">
                    <option> Por que quieres ordenar?</option>
                    <option value="rol">
                        Rol</option>
                    <option value="nombreAscendente">Nombre ascendente
                    </option>
                    <option value="nombreDescendente">Nombre descendente
                    </option>
                </select>
            </div>

            <div id='empleado' class="row">
                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Tus empleados</h4>
                            <p class="card-text">Añade aquí tus empleados. Con esto podrás ver de un vistazo todos 
                            los trabajadores que tienes en tu empresa
                            </p>
                        </div>
                        <div class="card-footer">
                      
                        <a onClick="autorizadoCreateEmployer('{{ Auth::user()->rol }}')" class="btn btn-primary">Añadir empleado</a>
                       

                        </div>
                    </div>
                </div>

                @foreach($employers as $employer)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{$employer->name}}</h4>
                            <p class="card-text">{{$employer->dni}}</p>
                            <p class="card-text">{{$employer->email}}</p>
                            <p class="card-text">{{$employer->rol}}</p>
                            <p class="card-text">{{$employer->workAt}}</p>
                        </div>
                        <div class="card-footer">
                        @if((\Auth::user()->rol == 'trabajador' || Auth::user()->rol == 'encargado')  && Auth::user()->dni == $employer->dni)
                            <a href={{ route('EmployerEdit', [$employer->dni])}} class="btn btn-primary">Editar empleado</a>
                        @elseif(\Auth::user()->rol == 'propietario')
                        <a href={{ route('EmployerEdit', [$employer->dni])}} class="btn btn-primary">Editar empleado</a>
                        @elseif(\Auth::user()->rol == 'superadmin')
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
    <script>
    var items = {!! json_encode($employers->toArray()) !!};
    searchEmployers(items);
    orderEmployers(items);
    </script>
    @endsection