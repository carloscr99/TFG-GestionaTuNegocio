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
                            <h4 class="card-title">Tus productos</h4>
                            <p class="card-text">Añade aquí tus productos, con su imagen, para poder llevar un control
                                del stock del que dispone.
                            </p>
                        </div>
                        <div class="card-footer">
                        <a onClick="autorizadoCreateProducto('{{ Auth::user()->rol }}')" class="btn btn-primary">Añadir producto</a>

                        </div>
                    </div>
                </div>

                @foreach($products as $product)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src={{$product->urlImagen}} alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="card-text">{{$product->description}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href={{route('ProductEdit', [$product->reference])}} class="btn btn-primary">Editar
                                producto</a>
                        </div>
                        <a onclick="deleteProduct('{{$product->reference}}', '{{Auth::user()->workAt}}', '{{Auth::user()->rol}}')"
                            class="btn btn-danger">Eliminar producto</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection