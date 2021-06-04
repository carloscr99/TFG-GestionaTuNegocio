@extends('layouts.app')

@section('content')


<h3 class="subTitle"> Bienvenido a Gestiona tu negocio! Estamos encantados de tenerte por aquí
    @if(Auth::check())
    {{{ Auth::user()->name }}}!

    @endif
    <br /> Vamos a ver como
    funciona el servico!
</h3>
<img src="../resources/img/down-arrow.gif" class="down-arrow" alt="down arrow">
<div class="content">
    <p>Lo primero que vas a tener que hacer es registrarte en nuestro sitio web mediante el botón <em>Registrarse</em>, y
    nos aparecerá la siguiente ventana: <br/><br/>
    <img class="demo" src="https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/GENERAL%2F2021-06-02_13h33_14.png?alt=media&token=b84e8ce8-9452-49f0-8edf-59f7ab998b3d" alt=""> 
    <br/><br/>
    Tenemos que introducir todos los datos, y una vez realizado esto, se nos abrirá otra ventana, en la cual podemos añadir
    a nuestros trabajadores, una vez introducidos todos (o si no tenemos), solo tenemos que pulsar al enlace <em>No tengo
        mas empleados que añadir </em>:<br/><br/>
        <img class="demo" src="https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/GENERAL%2F2021-06-02_13h51_01.png?alt=media&token=2c23b63c-9ed7-42f3-b1cf-3e12d2fce532" alt=""> 
        <br/><br/>Y podremos ver el listado de todos los trabajadores que hemos introducidos, así como podremos añadir nuevos más tarde:<br/><br/>
        <img class="demo" src="https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/GENERAL%2F2021-06-02_13h56_13.png?alt=media&token=1d4986fa-5bbe-4e33-a66b-e86183da0c98" alt=""> 
    </p>
    <p>Como podemos observar en la imagen superior, disponemos de un cuadro de búsqeda, para que nos sea mas fácil encontrar los empleados
        pudiendo buscar por:
         <!-- DNI, Nombre, Email, Rol..., así como la posibilidad de ordenarlos. -->
        <ul>
        <li>DNI</li>
        <li>Nombre</li>
        <li>Email</li>
        <li>Rol</li>
    </ul>
    </p>
    <p>Luego, si nos dirigimos al partado de <em>Home</em>, veremos una pestaña muy similar a la anterior, donde
    en lugar de añadir trabajadores, añadimos productos, así como buscar entre los existentes (cuando los registres) 
    mediante el nombre y código de referencia, y ordenarlos mediante valores predeterminados. Cuando pulsamos para crear un producto, 
    nos aparecerá la siguiente ventana: </p>
    <img class="demo" src="https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/GENERAL%2F2021-06-02_18h32_36.png?alt=media&token=fb4d11be-b672-4429-8f5c-e2ea9bc4a7ea" alt="">
    <p>Como podemos observar en la imágen anterior, el botón de <em>Añadir producto</em> está deshabilitado, este se habilitará
    una vez si añada el código de referneica del producto.</p>
    <p>Todos estos elementos se pueden modificar y eliminar por el propietario de la tienda, pero existen distintos
        permisos para los usuarios dependiendo de su rol:
        <ul>
            <li>Encargado: 
            <ol style="list-style-type: lower-alpha; padding-bottom: 0;">
                <li>Puede crear productos</li>
                <li>Puede listar productos</li>
                <li>Puede editar productos</li>
                <li>Puede eliminar productos</li>
                <li>Puede listar los empleados</li>
                <li>Editar sus datos como empleado</li> 
                </ol>
            </li>
            <li>Trabajador: 
            <ol style="list-style-type: lower-alpha; padding-bottom: 0;">
                 <li>Puede listar productos</li>
                <li>Puede editar el precio y stock de los productos</li>
                <li>Puede listar los empleados</li>
                <li>Editar sus datos como empleado</li> 
                </ol>
            </li>
            <li>propietario: 
            <ol style="list-style-type: lower-alpha; padding-bottom: 0;">
                <li>Tiene todos los permisos anteriores, pero a demás puede:
                <ol style="list-style-type: lower-alpha; padding-bottom: 0;">
                <li>Añadir trabajadores</li>
                <li>Eliminar trabajadores</li>
                <li>Eliminar la tienda</li>
                </ol>
                
                </li>
                </ol>
            </li>
        </ul>
    </p>

</div>

@endsection