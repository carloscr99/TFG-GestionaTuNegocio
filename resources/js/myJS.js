

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

    imgButton.addEventListener('change', function (event) {

        if (imgButton.disabled === false || imgButton.value === "") {
            btnSubmit.disabled = false;

        } else {
            btnSubmit.disabled = true;
        }

    });

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