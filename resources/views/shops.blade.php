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
                        <input id='searchShop' type="text" class="form-control" placeholder="Quiero buscar..."
                            name="q">
                        <span class="input-group-btn">

                        </span>
                    </div>
                </form>
            </div>
            <div class="my-4">
                <select id="orderByShops" name="orderByShops" class="btn btn-secondary btn-lg dropdown-toggle">
                    <option> Por que quieres ordenar?</option>
                    <option value="nombreAscendente">Nombre ascendente
                    </option>
                    <option value="nombreDescendente">Nombre descendente
                    </option>
                    <option value="cifAscendente">CIF ascendente
                    </option>
                    <option value="cifDescendente">CIF descendente
                    </option>
                </select>
            </div>

            <div id="shop" class="row">
                @foreach($shops as $shop)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{$shop->nameShop}}</h4>
                            <p class="card-text">{{$shop->direction}}
                            <p class="card-text">{{$shop->cif}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href={{route('shop', [$shop->cif])}} class="btn btn-primary">Editar
                                tienda</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <script>
    var items = {!! json_encode($shops->toArray()) !!};
    searchShops(items);
    orderShops(items);
    </script>
    @endsection