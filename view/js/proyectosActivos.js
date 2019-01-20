
 /*Esta serie de funciones seran una prueba, para las funcionalidades del CRUD*/
 function obtenerVistaPerfil() {
    var formData = new FormData();
    formData.append('accion', 'mostrarProyectoActivos');

    $.ajax({
        type: "POST",
        url:  "../business/perfilAction.php",
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


function obtenerInfoUsuario() {

    var cedula = $('#id-usuario').text();
    limpiar_form_perfil();
    formData = new FormData();
    formData.append('accion','ver_perfil');
    formData.append('cedula',cedula);
    $.ajax({
        type: "POST",
        url:  "../business/perfilAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);

            $('#titulo-ver-perfil').text(json[0].nombrePersona+" "+json[0].apellidoPersona+"");
            $('#cedula-perfil').val(json[0].cedulaPersona);
            $('#pass-perfil').val(json[0].passwordPersona);
            $('#estado-perfil').val(json[0].estadoPersona);
            $('#manager-perfil').val(json[0].Manager);

            $("#cedula-editar-perfil").val(json[0].cedulaPersona);
            $('#nombre-editar-perfil').val(json[0].nombrePersona);
            $('#apellido-editar-perfil').val(json[0].apellidoPersona);
            $('#pass-editar-perfil').val(json[0].passwordPersona);
            //console.log(json[0].estadoPersona );
            if(json[0].estadoPersona == 'Activo') {
                $('#select-editar-perfil').append($('<option>', {value: 0, text: json[0].estadoPersona,  selected: "true"}));
                $('#select-editar-perfil').append($('<option>', {value: 1, text: 'Inactivo'}));
            } else {
                $('#select-editar-perfil').append($('<option>', {value: 0, text: 'Activo'}));
                $('#select-editar-perfil').append($('<option>', {value: 1, text: 'Inactivo', selected: "true"}));
            }
            $('#estado-editar-perfil').val(json[0].estadoPersona);
        }
    });

}

function modificarPerfil() {

    formData = new FormData();
    formData.append('accion','editar_perfil');
    formData.append('cedula',$('#cedula-editar-perfil').val());
    formData.append('nombre', $('#nombre-editar-perfil').val());
    formData.append('apellido',$('#apellido-editar-perfil').val());
    formData.append('pass', $('#pass-editar-perfil').val());
    formData.append('estado',$('#select-editar-perfil').children(':selected').text());
    $.ajax({
        type: "POST",
        url:  "../business/perfilAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            if(json.status == "true") {
                $('#modalEditarUsuario').modal('hide');
                $('#mensaje-editar-perfil').modal('show');
                setTimeout(ocultar_modal_mensaje, 2000);
            }
        }
    });
}

function llenar_fila(json, t_body) {
    var tr = document.createElement('tr');
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].nombreProyecto;
      var x = tr.insertCell(-1);
    x.innerHTML =json[i].estadoProyecto;
    var x = tr.insertCell(-1);
    x.innerHTML =json[i].nombrePuesto;
  
    
    t_body.appendChild(tr);
}

function ocultar_modal_mensaje() {
    $('#mensaje-editar-perfil').modal('hide');
    obtenerInfoUsuario();
}


function limpiar_form_editar_perfil() {
    $('#nombre-editar-perfil').val("");
    $('#apellido-editar-perfil').val("");
    $('#pass-editar-perfil').val("");
    $('#estado-editar-perfil').val("");
    document.getElementById('select-editar-perfil').options.length = 0;
}

function limpiar_form_perfil() {
    $('#titulo-ver-perfil').text("");
    $('#cedula-perfil').val("");
    $('#pass-perfil').val("");
    $('#estado-perfil').val("");
    $('#manager-perfil').val("");

    limpiar_form_editar_perfil();
}

