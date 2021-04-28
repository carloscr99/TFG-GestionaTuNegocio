function habilitarBotonNewProduct() {
    console.log("habilitarBotonNewProduct");

    var referencia = document.getElementById("reference");
    var imgButton = document.getElementById("img-producto");
    var btnSubmit = document.getElementById("btn-submit");

    referencia.addEventListener('change', function (event) {

        if (referencia.value === '') {

            imgButton.disabled = true;

        } else {

            imgButton.disabled = false;
        }

    });

    if (imgButton) {
        imgButton.addEventListener('change', function (event) {

            if (imgButton.disabled === false || imgButton.value === "") {
                btnSubmit.disabled = false;

            } else {
                btnSubmit.disabled = true;
            }

        });

    }

}

function deleteProduct($referenciaProducto, $cifEmpresa, $rol) {

    if ($rol === 'trabajador') {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',

        })

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

    if ($rolLogeado == 'trabajador') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',

        })
    } else {

        if ($rol === 'propietario') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puedes eliminar al propietario!',

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
                                'Producto eliminado correctamente ',
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

function deleteShop($cif) {

    var route = "../shopDelete/";

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta opción no tiene vuelta atrás!\nEstás apunto de eliminar tu tienda con cif: "+ $cif,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro!',
        cancelButtonText: 'No estoy seguro!'
      }).then((result) => {
        $.ajax({
            type: 'DELETE',
            url: route + $cif,
            data: { "_token": $("meta[name='csrf-token']").attr("content") },
            success: function (data) {

              window.location = 'welcome';

            }
        });
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

    if ($rol === 'trabajador' || $rol == 'encargado') {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',

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


