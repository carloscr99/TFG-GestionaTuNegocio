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
                        <input id='searchProduct' type="text" class="form-control" placeholder="Quiero buscar..."
                            name="q">
                        <span class="input-group-btn">

                        </span>
                    </div>
                </form>
            </div>
            <div class="my-4">
                <select id="orderBy" name="orderBy" class="btn btn-secondary btn-lg dropdown-toggle">
                    <option> Por que quieres ordenar?</option>
                    <option value="precioAscendente">
                        Precio ascendente</option>
                    <option value="precioDescendente">Precio descendente
                    </option>
                    <option value="nombreAscendente">Nombre ascendente
                    </option>
                    <option value="nombreDescendente">Nombre descendente
                    </option>
                </select>
            </div>

            <div id="producto" class="row">
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
                            <a onClick="autorizadoCreateProducto('{{ Auth::user()->rol }}')"
                                class="btn btn-primary">Añadir producto</a>

                        </div>
                    </div>
                </div>

                @foreach($products as $product)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src={{$product->urlImagen}} alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="card-text">{{$product->reference}}</p>
                            <p class="card-text">{{$product->description}}</p>

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
    <script>
    var items = {!! json_encode($products->toArray()) !!};
    searchProduct(items);
    orderProducts(items);
    </script>
    @endsection