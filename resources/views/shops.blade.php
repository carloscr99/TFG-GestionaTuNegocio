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
                            <h4 class="card-title">TIENDAAAAAAAAAAS</h4>
                            <p class="card-text">Añade aquí tus empleados. Con esto podrás ver de un vistazo todos
                                los trabajadores que tienes en tu empresa
                            </p>
                        </div>
                        <div class="card-footer">

                            <a onClick="autorizadoCreateEmployer('{{ Auth::user()->rol }}')"
                                class="btn btn-primary">Añadir empleado</a>


                        </div>
                    </div>
                </div>

                @foreach($shops as $shop)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$shop->nameShop}}</h4>
                            <p class="card-text">{{$shop->direction}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href={{route('shop', [$shop->cif])}} class="btn btn-primary">Editar
                                tienda</a>
                        </div>
                        <!-- <a onclick="deleteProduct('{{$shop->cif}}'"
                            class="btn btn-danger">Eliminar tienda</a> -->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endsection