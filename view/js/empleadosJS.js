
 /*Esta serie de funciones seran una prueba, para las funcionalidades del CRUD*/
 function obtenerVistaUsuarios() {
    var formData = new FormData();
    formData.append('accion', 'mostrar_usuario');

    $.ajax({
        type: "POST",
        url:  "../business/usuariosAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
             var json = JSON.parse(respuesta);
             console.log(json);
            var t_body = document.getElementById('t_body');
            for(i=0; i<json.length;i++) {
                llenar_fila(json, t_body);
            }
        }
    });
}

//inserta un usuario nuevo a la BD
function insertarUsuario() {

    var formData = new FormData();
    formData.append('accion','insertar_usuario');
    formData.append('cedula', $('#cedula').val());
    formData.append('nombre', $('#nombre').val());
    formData.append('apellido', $('#apellido').val());
    formData.append('pass', $('#pass').val());
    formData.append('puesto', $('#select-puesto option:selected').text());
    formData.append('tipo', $('#tipo').val());
    formData.append('estado',$('#estado').val());

    $.ajax({
        type: "POST",
        url:  "../business/usuariosAction.php",
        data: formData,
        cache: false,
        dataType: "html",
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log(respuesta);
            json = JSON.parse(respuesta);
            if(json.status == "true") {
                alert("listo");
            } else {alert(json[0].error + " no se agrego correctamente..");
        }
    }    
 });

}

// modifica la informacion de un usuario
function modificarUsuario() {

}

//elimina un usuario de la BD
function eliminarUsuario() {

}

//funcion de prueba
function sayHello() {
    alert("holis");
}
 // inserta la informacion en cada fila y la agraga a una tabla.
function llenar_fila(json, t_body) {
    var tr = document.createElement('tr');
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].id_Usuario;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].nombre_Usuario;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].apellido_Usuario;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].puesto_Usuario;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].tipo_Usuario;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].estado_Usuario;

    t_body.appendChild(tr);
}


