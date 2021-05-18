function habilitarBotonNewProduct() {
    console.log("habilitarBotonNewProduct");

    var referencia = document.getElementById("reference");
    var imgButton = document.getElementById("img-producto");
    var btnSubmit = document.getElementById("btn-submit");

    referencia.addEventListener('input', function (event) {

        if (referencia.value === '') {

            imgButton.disabled = true;
            btnSubmit.disabled = true;

        } else {

            imgButton.disabled = false;
            btnSubmit.disabled = false;
        }

    });


}

function countCharacters() {

    var textArea = document.getElementById("description");

    window.addEventListener('load', function (e) {

        document.getElementById("numberCharacters").innerText = textArea.value.length + "/300";

    });

    textArea.addEventListener('input', function (e) {

        document.getElementById("numberCharacters").innerText = textArea.value.length + "/300";

    });
}

function searchProduct($items) {

    const searchBar = document.getElementById('searchProduct');
    searchBar.addEventListener('keyup', (e) => {
        const busqueda = e.target.value.toLowerCase();
        const busquedaFiltrada = $items.filter(item => {
            return item.name.toLowerCase().includes(busqueda) || item.reference.toLowerCase().includes(busqueda);
        });
        displayFilteredProducts(busquedaFiltrada);
    });


}

function searchEmployers($items) {

    const searchBar = document.getElementById('searchEmployer');
    searchBar.addEventListener('keyup', (e) => {
        const busqueda = e.target.value.toLowerCase();
        const busquedaFiltrada = $items.filter(item => {
            return item.name.toLowerCase().includes(busqueda) || item.dni.toLowerCase().includes(busqueda) 
            || item.rol.toLowerCase().includes(busqueda) || item.email.toLowerCase().includes(busqueda)
            || item.workAt.toLowerCase().includes(busqueda);
        });
        displayFilteredEmployers(busquedaFiltrada);
    });


}

function searchShops($items) {

    const searchBar = document.getElementById('searchShop');
    searchBar.addEventListener('keyup', (e) => {
        const busqueda = e.target.value.toLowerCase();
        const busquedaFiltrada = $items.filter(item => {
            return item.nameShop.toLowerCase().includes(busqueda) || item.direction.toLowerCase().includes(busqueda) 
            || item.city.toLowerCase().includes(busqueda) || item.country.toLowerCase().includes(busqueda) 
            || item.cif.toLowerCase().includes(busqueda);
        });
        displayFilteredShops(busquedaFiltrada);
    });


}


function orderProducts($items) {

    const orderBy = document.getElementById('orderBy');
    var busquedaOrdenada = "";
    orderBy.addEventListener('change', (e) => {
        var option = e.target.value;
        console.log(option);

        switch (option) {
            case 'precioAscendente':
               
                busquedaOrdenada = $items.sort((a,b)=>(a.price > b.price) ? 1 : ((b.price > a.price) ? -1 :0));
               
                break;
            case 'precioDescendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.price < b.price) ? 1 : ((b.price < a.price) ? -1 :0));

                break;
            case 'nombreAscendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.name > b.name) ? 1 : ((b.name > a.name) ? -1 :0));

                break;
            case 'nombreDescendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.name < b.name) ? 1 : ((b.name < a.name) ? -1 :0));

                break;

            default:
                break;
        }
        displayFilteredProducts(busquedaOrdenada);
    });

}

function orderEmployers($items) {

    const orderBy = document.getElementById('orderByEmployers');
    var busquedaOrdenada = "";
    orderBy.addEventListener('change', (e) => {
        var option = e.target.value;
        console.log(option);

        switch (option) {
            case 'rol':
               
                busquedaOrdenada = $items.sort((a,b)=>(a.rol > b.rol) ? 1 : ((b.rol > a.rol) ? -1 :0));
               
                break;
           
            case 'nombreAscendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.name > b.name) ? 1 : ((b.name > a.name) ? -1 :0));

                break;
            case 'nombreDescendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.name < b.name) ? 1 : ((b.name < a.name) ? -1 :0));

                break;

            default:
                break;
        }
        displayFilteredEmployers(busquedaOrdenada);
    });

}

function orderShops($items) {

    const orderBy = document.getElementById('orderByShops');
    var busquedaOrdenada = "";
    orderBy.addEventListener('change', (e) => {
        var option = e.target.value;
        console.log(option);

        switch (option) {
            case 'nombreAscendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.nameShop > b.nameShop) ? 1 : ((b.nameShop > a.nameShop) ? -1 :0));

                break;
            case 'nombreDescendente':

                busquedaOrdenada = $items.sort((a,b)=>(a.nameShop < b.nameShop) ? 1 : ((b.name < a.nameShop) ? -1 :0));

                break;
                case 'cifAscendente':

                    busquedaOrdenada = $items.sort((a,b)=>(a.cif > b.cif) ? 1 : ((b.cif > a.cif) ? -1 :0));
    
                    break;
                case 'cifDescendente':
    
                    busquedaOrdenada = $items.sort((a,b)=>(a.cif < b.cif) ? 1 : ((b.cif < a.cif) ? -1 :0));
    
                    break;

            default:
                break;
        }
        displayFilteredShops(busquedaOrdenada);
    });

}



function displayFilteredProducts($busquedaFiltrada) {

    const list = document.getElementById("producto");

    const htmlFiltered = $busquedaFiltrada.map(($busquedaFiltrada) => {
        return `<div class="col-md-5 mb-5">
        <div class="card h-100">
            <img class="card-img-top" src="${$busquedaFiltrada.urlImagen}" alt="">
            <div class="card-body">
                <h4 class="card-title">${$busquedaFiltrada.name}</h4>
                <p class="card-text">${$busquedaFiltrada.reference}</p>
                <p class="card-text">${$busquedaFiltrada.description}
                </p>
            </div>
            <div class="card-footer">
            <a href="ProductEdit/${$busquedaFiltrada.reference}" class="btn btn-primary">Editar
            producto</a>
    </div>
    <a onclick="deleteProduct('${$busquedaFiltrada.reference}', '{{Auth::user()->workAt}}', '{{Auth::user()->rol}}')"
        class="btn btn-danger">Eliminar producto</a>
            </div>
            </div>
        </div>`;
    });

    list.innerHTML = htmlFiltered;

}

function displayFilteredEmployers($busquedaFiltrada) {

    const list = document.getElementById("empleado");

    const htmlFiltered = $busquedaFiltrada.map(($busquedaFiltrada) => {
        return `<div class="col-md-5 mb-5">
        <div class="card h-100">
            <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
            <div class="card-body">
                <h4 class="card-title">${$busquedaFiltrada.name}</h4>
                <p class="card-text">${$busquedaFiltrada.dni}</p>
                <p class="card-text">${$busquedaFiltrada.email} </p>
                <p class="card-text">${$busquedaFiltrada.rol} </p>
                <p class="card-text">${$busquedaFiltrada.workAt} </p>
            </div>
            <div class="card-footer">
            <a href="EmployerEdit/${$busquedaFiltrada.dni}" class="btn btn-primary">Editar
            empleado</a>
    </div>
    <a onclick="deleteEmployer('${$busquedaFiltrada.dni}', '{{Auth::user()->workAt}}', '{{Auth::user()->rol}}')"
        class="btn btn-danger">Eliminar empleado</a>
            </div>
            </div>
        </div>`;
    });

    list.innerHTML = htmlFiltered;

}

function displayFilteredShops($busquedaFiltrada) {

    const list = document.getElementById("shop");

    const htmlFiltered = $busquedaFiltrada.map(($busquedaFiltrada) => {
        return `<div class="col-md-5 mb-5">
        <div class="card h-100">
            <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
            <div class="card-body">
                <h4 class="card-title">${$busquedaFiltrada.nameShop}</h4>
                <p class="card-text">${$busquedaFiltrada.direction}</p>
                <p class="card-text">${$busquedaFiltrada.cif} </p>             
            </div>
            <div class="card-footer">
            <a href="shop/${$busquedaFiltrada.cif}" class="btn btn-primary">Editar
            tienda</a>
            </div>
            </div>
            </div>
        </div>`;
    });

    list.innerHTML = htmlFiltered;

}

function deleteProduct($referenciaProducto, $cifEmpresa, $rol) {

    if ($rol === 'trabajador') {

        errorPermisos();

    } else {

        var route = "ProductDelete/";

        Swal.fire({
            title: '¿Estás seguro?',
            text: "No es posible deshacer esta función!\n Vas a eliminar el producto con referencia: " + $referenciaProducto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: route + $referenciaProducto,
                    data: { "_token": $("meta[name='csrf-token']").attr("content") },
                    success: function (data) {
                        deleteImageProduct($cifEmpresa, $referenciaProducto);
                        Swal.fire(
                            'Eliminado!',
                            'Producto eliminado correctamente',
                            'success'
                        ).then(function () {
                            window.location = "home";
                        });
                    }
                });


            }
        })

    }

}

function deleteImageProduct($cifEmpresa, $referenciaProducto) {

    var storage = firebase.storage();

    var storageRef = storage.ref();

    // Create a reference to the file to delete
    var desertRef = storageRef.child($cifEmpresa + '/' + $referenciaProducto);

    // Delete the file
    desertRef.delete().then(function () {
        // File deleted successfully

    }).catch(function (error) {
        // Uh-oh, an error occurred!
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se ha podido eliminar la imagen del producto de la base de datos.',
        }).then(function () {
            window.location = "home";
        });
    });

}

function deleteEmployer($dni, $rol, $rolLogeado,) {

    if ($rolLogeado == 'trabajador' || $rolLogeado === 'encargado') {

        errorPermisos();

    } else {

        if ($rol === 'propietario') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puedes eliminar al propietario!\n Para eliminarlo, tienes que borrar su tienda.',

            })
        } else {
            var route = "EmployerDelete/";

            Swal.fire({
                title: '¿Estás seguro?',
                text: "No es posible deshacer esta función!\n Vas a eliminar el empleado con DNI: " + $dni,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: route + $dni,
                        data: { "_token": $("meta[name='csrf-token']").attr("content") },
                        success: function (data) {
                            Swal.fire(
                                'Eliminado!',
                                'Empleado eliminado correctamente ',
                                'success'
                            ).then(function () {
                                window.location = "Employers";
                            });
                        }
                    });
                }
            })
        }
    }
}

function deleteShop($cif, $rol) {

    var route = "../shopDelete/";

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta opción no tiene vuelta atrás!\nEstás  apunto de eliminar tu tienda con cif: " + $cif,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro!',
        cancelButtonText: 'No estoy seguro!'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                type: 'DELETE',
                url: route + $cif,
                data: { "_token": $("meta[name='csrf-token']").attr("content") },
                success: function (data) {

                    if($rol === 'superadmin'){
                        window.location = "../shops";
                    }else{
                        window.location = "logout";
                    }
    
                }
            });
        }
    })

}


function autorizadoCreateProducto($rol) {

    if ($rol === 'trabajador') {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',

        })

    } else {

        window.location = "NewProduct";
    }

}

function autorizadoCreateEmployer($rol) {

    if ($rol != 'propietario') {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto, eso es cosa del propietario',

        })

    } else {

        window.location = "NewEmployer";

    }

}

function restorePasswordDNINotValid() {

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'En DNI que acabas de introducir no es valido',

    })

}

function errorPermisos() {

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No tienes permisos para hacer esto...',

    })

}


