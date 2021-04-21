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

    if($rol === 'trabajador'){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',
            
          })

    }else{

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
        var desertRef = storageRef.child($cifEmpresa + '/'+ $referenciaProducto);
    
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

function deleteEmployer($dni, $rol, $rolLogeado, ) {

    if($rolLogeado == 'trabajador'){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',
            
          })
    }else{

        if($rol === 'propietario'){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puedes eliminar al propietario!',
                
              })
        }else{
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
                                    'Producto eliminado correctamente',
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

function autorizadoCreateProducto($rol){

    if($rol === 'trabajador'){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',
            
          })

    }else{
        
        window.location = "NewProduct";

    }

 
}

function autorizadoCreateEmployer($rol){

    if($rol === 'trabajador'  || $rol == 'encargado'){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No tienes permisos para hacer esto...',
            
          })

    }else{
        
        window.location = "NewEmployer";

    }


}


//De moment sense aplicar, está en newProductBlade.php
function addImageToFirebase() {
    console.log("hola addImageToFirebase");
    // Script para subir la imagen a google Firebase
    var imagenASubir = document.getElementById("img-producto");
    var cif = document.getElementById("cif").value;
    console.log(cif);


    console.log("SUBO IMAGEN!!!");
    //Obtenemos la referencia del producto indicada por el usuario
    var referencia = document.getElementById("reference").value;
    console.log(referencia);
    //Obtenemos el fichero
    var file = e.target.files[0];

    //Creamos la referencia de almacenaje
    var storageRef = firebase.storage().ref(cif + "/" + referencia);

    //Subimos la imagen
    var uploadTask = storageRef.put(file);

    uploadTask.on('state_changed', function (snapshot) {
        // Observe state change events such as progress, pause, and resume
        // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log('Upload is ' + progress + '% done');
        switch (snapshot.state) {
            case firebase.storage.TaskState.PAUSED: // or 'paused'
                console.log('Upload is paused');
                break;
            case firebase.storage.TaskState.RUNNING: // or 'running'
                console.log('Upload is running');
                break;
        }
    }, function (error) {
        // Handle unsuccessful uploads
        return (false);
    }, function () {
        // Handle successful uploads on complete
        // For instance, get the download URL: https://firebasestorage.googleapis.com/...
        uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
            console.log('File available at', downloadURL);
            document.getElementById("urlProducto").value = downloadURL;
            return (true);

        });
    });



}