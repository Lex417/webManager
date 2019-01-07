
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

// va a llamar a 'vista_colaborador_manager'
function obtenerColaboradorManager() {
    var formData = new FormData();
    formData.append('accion','mostrar_vista_colaborador_manager');

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
            var t_body1 = document.getElementById('area_trabajo_uno');
            var t_body2 = document.getElementById('area_trabajo_dos');
            var t_body3 = document.getElementById('area_trabajo_tres');
            var t_body4 = document.getElementById('area_trabajo_cuatro');
            for(i = 0; i < json.length; i++) {
                llenar_filas_tablas_areas_trabajo(json, t_body1, t_body2, t_body3, t_body4);
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

function llenar_filas_tablas_areas_trabajo(json, t_body1, t_body2, t_body3, t_body4) {
    switch(json[i].id_Departamento) {
        case "1": //area de Desarrollo 
            var tr = document.createElement('tr');
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Usuario;
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Manager;

            t_body2.appendChild(tr);
        break;

        case "2": // area de Aseguramiento de Calidad (QA)
            var tr = document.createElement('tr');
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Usuario;
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Manager;

            t_body1.appendChild(tr);
        break;

        case "3": // Area de Liderazgo (Tech Leader)
            var tr = document.createElement('tr');
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Usuario;
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Manager;

            t_body4.appendChild(tr);
        break;

        case "4": //Area de Soporte
            var tr = document.createElement('tr');
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Usuario;
            var x = tr.insertCell(-1);
            x.innerHTML = json[i].nombre_Manager;

            t_body3.appendChild(tr);
        break;
    }

}


function getQueryVariable() {
    //ESTE METODO TOMA EL URL DE LA PAGINA Y OBTINE EL VALOR DEL PARAMETRO ID QUE NECESITAMOS PARA BUSCAR EL PROYECTO POR SU ID.
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if(pair[0] == "id") {
            return pair[1];
        }
    }
    return false;
 }
function obtenerVistaUsuariosPorProyecto() {
    var formData = new FormData();
    formData.append('accion', 'mostrar_usuarios_proyecto');
     // getQueryVariable();  CON ESTE METODO OBTENEMOS EL ID DEL PROYECTO DEL URL DE LA PAGINA.
    formData.append('id',getQueryVariable());
//AGREGANDO UNA FUNCION
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
            var t_body = document.getElementById('t_body_empleados_proyecto');
            for(i=0; i<json.length;i++) {
                llenar_fila(json, t_body);
            }
        }
    });
}