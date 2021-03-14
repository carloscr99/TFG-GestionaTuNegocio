@extends('layouts.app')

@section('content')
        

        <h3 class="subTitle"> Bienvenido a Gestiona tu negocio! Estamos encantados de tenerte por aquí
            @if(Auth::check())
            {{{ Auth::user()->name }}}!

            @endif
            <br /> Vamos a ver como
            funciona el servico? Haz scroll
        </h3>


@endsection