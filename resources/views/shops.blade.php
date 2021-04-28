@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                @foreach($shops as $shop)

                <div class="col-md-5 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
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
    @endsection