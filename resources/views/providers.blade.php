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
                            <h4 class="card-title">Tus proveedores</h4>
                            <p class="card-text">Añade aquí tus proveedores. Con esto podrás ver de un vistazo todos 
                            los proveedores que proveen de stock a tu empresa
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('newProvider') }}" class="btn btn-primary">Añadir proveedor</a>

                        </div>
                    </div>
                </div>

            

            
            </div>
        </div>
    </div>
    @endsection