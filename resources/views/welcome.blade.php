@extends('layouts.app')

@section('content')


<h3 class="subTitle"> Bienvenido a Gestiona tu negocio! Estamos encantados de tenerte por aquí
    @if(Auth::check())
    {{{ Auth::user()->name }}}!

    @endif
    <br /> Vamos a ver como
    funciona el servico? Haz scroll
</h3>

<img src="../resources/img/down-arrow.gif" class="down-arrow" alt="down arrow">

<div class="content">
    <p>Lo primero que vas a tener que hacer es registrarte en nuestro sitio web mediante el botón <em>Registrarse</em>.
    </p>
</div>

@endsection