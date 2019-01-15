// VARIABLES JGLOBALES, ALBERGARAN LA INFO PARSEADA DE JSON
var jsonPuestos = null; //-> Contendra los puestos
var jsonEquipo = null; //-> Contendra los equipos de trabajo

/********************************METODOS AJAX**********************************/
//inserta un usuario nuevo a la BD
function insertarUsuario() {

    var formData = new FormData();
    formData.append('accion','insertar_usuario');
    formData.append('cedula', $('#cedula').val());
    formData.append('nombre', $('#nombre').val());
    formData.append('apellido', $('#apellido').val());
    formData.append('pass', $('#pass').val());
    formData.append('puesto', $('#select-puesto option:selected').val());
    formData.append('equipo', $('#select-equipo option:selected').val());
    formData.append('tipo', $('#select-tipo option:selected').text());

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
                $('#modalAgregar').modal('hide');
                $('#mensaje-agregar').modal('show');
                desplegar_metodos();
                setTimeout(ocultar_mensaje_agregar, 1000);
            } else {alert(json[0].error + " no se agrego correctamente..");
        }
    }    
 });

}


// va a llamar a 'vista_colaborador_manager' (Modificar con base nueva)
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

// obtiene la vista para ver los usuarios por proyecto (Modificar con base nueva)
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

// buscara elementos en la BD que cumplan con el filtro especificado
function busquedaFiltro(palabra, tipoFiltro) {
    formData = new FormData();
    formData.append('accion','filtrar');
    formData.append('palabra', palabra);
    formData.append('tip_filtro', tipoFiltro);

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
            var html ="";
            $('#tabla_colaboradores tbody').empty();
            for(i = 0; i < json.length; i++) {
                html+='<tr>'+
                '<td>'+ json[i].cedulaPersona +'</td>'+
                '<td>'+ json[i].nombrePersona +'</td>'+
                '<td>'+ json[i].apellidoPersona +'</td>'+
                '<td>'+ json[i].nombrePuesto +'</td>'+
                '<td>'+ json[i].estadoColaborador +'</td>'+
                //'<td><i class="fas fa-eye"  style="font-size:24px;"></i></td>'+
                '<td><a href="#" onclick="obtenerUsuario('+json[i].cedulaPersona+');" style="color:green"><i class="fas fa-edit" style="font-size:24px;"></i></a></td>'+
                '<td><a href="#" onclick="desplegar_modal_eliminar('+json[i].cedulaPersona+');" style="color:red"><i class="fas fa-trash-alt" style="font-size:24px;"></i></a></td>'+
                '</tr>';
            }
            $('#t_body').html(html);
        }
    });
}


// retorna la cantidad de registros de 'vista_informacion'
function countUsuarios() {
    formData = new FormData();
    formData.append('accion', 'count_usuarios');

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
            var tam = parseInt(json[0].size);
            html="";
            //console.log(tam);
            var tot_filas = $('#select-resultados').children(':selected').text();
             var total_pag = (tam / tot_filas);

             for(i = 1; i <= total_pag; i++) {
                 if(i == 1) { html += '<a name="btn-pagination" class="active" id='+i+' onclick="cambia_pag('+i+');" href="#">'+i+'</a>'}
                  else { html += '<a name="btn-pagination" id='+i+' onclick="return cambia_pag('+i+');" href="#">'+i+'</a>'}
             }
             $('#pagination').html(html);
             agregar_eventos();
        }
    });
}


//cambia de pagina en la tabla
function cambia_pag(id_Pag) {

      formData = new FormData();
      var orden = $('#select-resultados').children(':selected').text(); // obtenemos lo que esta escrito en el comboBox
      formData.append('accion','cambio_pagina');
      formData.append('pagina',id_Pag);
      formData.append('limite',orden);
      $.ajax({
         type: "POST",
         url:  "../business/usuariosAction.php",
         data: formData,
         dataType: "html",
         cache: false,
         contentType: false,
         processData: false,
         success: function(respuesta) {
             //console.log(respuesta);
             var json = JSON.parse(respuesta);
             var html ="";
             //console.log(json);      
             $('#tabla_colaboradores tbody').empty(); // limpia completamente la tabla
             for(i = 0; i < json.length; i++) {
                html+='<tr>'+
                '<td>'+ json[i].cedulaPersona +'</td>'+
                '<td>'+ json[i].nombrePersona +'</td>'+
                '<td>'+ json[i].apellidoPersona +'</td>'+
                '<td>'+ json[i].nombrePuesto +'</td>'+
                '<td>'+ json[i].estadoColaborador +'</td>'+
                //'<td><i class="fas fa-eye" style="font-size:24px;"></i></td>'+
                '<td><a href="#" onclick="obtenerUsuario('+json[i].cedulaPersona+');" style="color:green"><i class="fas fa-edit" style="font-size:24px;"></i></a></td>'+
                '<td><a href="#" onclick="desplegar_modal_eliminar('+json[i].cedulaPersona+');" style="color:red"><i class="fas fa-trash-alt" style="font-size:24px;"></i></a></td>'+
                '</tr>';
             }
             $('#t_body').html(html);
         }
      });
}


// obtiene la informacion de un usuario
function obtenerUsuario(id) {
    //{backdrop: 'static', keyboard: false} evista que se cierre con clicks fuera del modal o tecla ESC
    $('#modalEditar').modal({backdrop: 'static', keyboard: false}, 'show');
    limpiar_form();
    formData = new FormData();
    formData.append('accion', 'obtener_usuario');
    formData.append('id', id);
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

            $('#edit-cedula').val(json[0].cedulaPersona);
            $('#edit-nombre').val(json[0].nombrePersona);
            $('#edit-apellido').val(json[0].apellidoPersona);
            //nombreEquipoTrabajo
            determinar_puesto(json[0].nombrePuesto);
            determinar_equipo(json[0].nombreEquipoTrabajo);
            determinar_tipo(json[0].tipoColaborador);
        }
    });
}

// modifica la informacion de un usuario
function modificarUsuario() {

    var id = $('#edit-cedula').val();
    var nombre = $('#edit-nombre').val();
    var apellido = $('#edit-apellido').val();
    var puesto = $('#select-edit-puesto').children(':selected').val();
    var equipo =$('#select-edit-equipo').children(':selected').val();
    var tipo = $('#select-edit-tipo').children(':selected').text();
    

    formData = new FormData();
    formData.append('accion', 'editar_usuario');
    formData.append('id', id);
    formData.append('nombre', nombre);
    formData.append('apellido', apellido);
    formData.append('puesto', puesto);
    formData.append('equipo', equipo);
    formData.append('tipo', tipo);
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
            $('#modalEditar').modal('hide');
            $('#mensaje-editar').modal('show');
            desplegar_metodos();
            setTimeout(ocultar_mensaje_modificar, 2000);
        }
    });
}

//elimina (le cambia un estado al usuario) un usuario de la BD
function eliminarUsuario() {

    var id = $('#del-input').val();
    $('#del-input').val("");
    $('#modalEliminar').modal('hide');

    formData = new FormData();
    formData.append('accion', 'eliminar_usuario');
    formData.append('id', id);
    $.ajax({
        type: "POST",
        url:  "../business/usuariosAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            var json = JSON.parse(respuesta);
            if(json.status == "true") {
                $('#modalEliminar').modal('hide');
                $('#mensaje-eliminar').modal('show');
                desplegar_metodos();
                setTimeout(ocultar_mensaje_eliminar, 2000);

            }

        }
    });

}

// obtiene los puestos disponibles
function obtenerPuestosDisponibles() {
    jsonPuestos = null; // la variable global se inicializa en null para evitar que guarde informacion vieja
    formData = new FormData();
    formData.append('accion', 'obtener_puestos');
    $.ajax({
        type: "POST",
        url:  "../business/usuariosAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            jsonPuestos = JSON.parse(respuesta);
            //console.log(jsonPuestos);
            llenar_puestos_formulario(jsonPuestos); // se agregan a los select del formulario de agregar 
        }
    });
}

// obtiene los equipos disponibles
function obtenerEquiposDisponibles() {
    jsonEquipo = null; // la variable global se inicializa en null para evitar que guarde informacion vieja
    formData = new FormData();
    formData.append('accion', 'obtener_equipos');
    $.ajax({
        type: "POST",
        url:  "../business/usuariosAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            jsonEquipo = JSON.parse(respuesta);
            //console.log(jsonEquipo);
            llenar_equipos_formulario(jsonEquipo); // se agregan a los select del formulario de agregar 
        }
    });
}
/********************************METODOS AJAX**********************************/

/*************************** METODOS ADICIONALES*******************************/

// funcion que hace que se ordenen las filas de acuerdo al combo box seleccionado
function reordenar_filas() {
    var pag_actual = $('#pagination a.active').attr('id'); //obtenemos el id del <a tag> activo
    $('#tabla_colaboradores tbody').empty(); // limpia completamente la tabla
    countUsuarios();
    cambia_pag(pag_actual);
}

// despliega el modal de confirmacion por si desea eliminar el usuario.
function desplegar_modal_eliminar(id) {
    $('#del-input').val(id);
    $('#modalEliminar').modal({backdrop: 'static', keyboard: false}, 'show');
}

// esta funcion encapsula los metodos iniciales importantes para informacion.php (paginacion, filtros, tabla, etc)
function desplegar_metodos() {
    inicializar_variables_globales();
    filtro_tabla_usuarios();
    limpiar_form();
    limpiar_form_agregar();
    countUsuarios();
    cambia_pag(1);
}

 // agrega informacion a las varaibles globales 
function inicializar_variables_globales() {
    obtenerPuestosDisponibles();
    obtenerEquiposDisponibles();
}

//llena el select de puestos del formulario agregar colaborador
function llenar_puestos_formulario(json) {
    console.log(json);
    for(i = 0; i < json.length; i++) {
        $('#select-puesto').append($('<option>', {value: json[i].idPuesto, text: json[i].nombrePuesto}));
    }
}

//llena el select de equipos del formulario agregar colaborador
function llenar_equipos_formulario(json) {
    console.log(json);
    for(i = 0; i < json.length; i++) {
        $('#select-equipo').append($('<option>', {value: json[i].idEquipoTrabajo, text: json[i].nombreEquipoTrabajo}));
        //select-equipo
    }
}
// funcion que se encarga de llenar el select de puesto_usuario, de acuerdo a el puesto del usuario actual
function determinar_puesto(puesto) {

    for(i = 0; i < jsonPuestos.length; i++) {
        if(jsonPuestos[i].nombrePuesto == puesto){
            $('#select-edit-puesto').append($('<option>', {value: jsonPuestos[i].idPuesto, text: puesto, selected: "true"}));
        } else {
            $('#select-edit-puesto').append($('<option>', {value: jsonPuestos[i].idPuesto, text: jsonPuestos[i].nombrePuesto}));
        }
    }
}

// funcion que se encarga de llenar el select de tipo_usuario, de acuerdo a el puesto del usuario actual
function determinar_equipo(nombre_equipo) {

    for(i = 0; i < jsonEquipo.length; i++) {
        if(jsonEquipo[i].nombreEquipoTrabajo == nombre_equipo){
            $('#select-edit-equipo').append($('<option>', {value: jsonEquipo[i].idEquipoTrabajo, text: nombre_equipo, selected: "true"}));
        } else {
            $('#select-edit-equipo').append($('<option>', {value: jsonEquipo[i].idEquipoTrabajo, text: jsonEquipo[i].nombreEquipoTrabajo}));
        }
    }
}

// como no hay tabla que llene esto en BD, se hizo de esta forma. igual son estados que no van a cambiar.
function determinar_tipo(tipo) {

    switch(tipo) {
        case "Invitado":
        $('#select-edit-tipo').append($('<option>', {value: 0, text: "Invitado", selected: "true"}));
        $('#select-edit-tipo').append($('<option>', {value: 1, text: "Colaborador",}));
        $('#select-edit-tipo').append($('<option>', {value: 2, text: "Team Manager",}));
        $('#select-edit-tipo').append($('<option>', {value: 3, text: "Proyect Manager"}));
        break;
        case "Colaborador":
        $('#select-edit-tipo').append($('<option>', {value: 0, text: "Invitado",}));
        $('#select-edit-tipo').append($('<option>', {value: 1, text: "Colaborador", selected: "true"}));
        $('#select-edit-tipo').append($('<option>', {value: 2, text: "Team Manager",}));
        $('#select-edit-tipo').append($('<option>', {value: 3, text: "Proyect Manager"}));
        break;
        case "Team Manager":
        $('#select-edit-tipo').append($('<option>', {value: 0, text: "Invitado",}));
        $('#select-edit-tipo').append($('<option>', {value: 1, text: "Colaborador",}));
        $('#select-edit-tipo').append($('<option>', {value: 2, text: "Team Manager", selected: "true"}));
        $('#select-edit-tipo').append($('<option>', {value: 3, text: "Proyect Manager"}));
        break;
        case "Proyect Manager":
        $('#select-edit-tipo').append($('<option>', {value: 0, text: "Invitado",}));
        $('#select-edit-tipo').append($('<option>', {value: 1, text: "Colaborador",}));
        $('#select-edit-tipo').append($('<option>', {value: 2, text: "Team Manager",}));
        $('#select-edit-tipo').append($('<option>', {value: 3, text: "Proyect Manager", selected: "true"}));
        break;
    }

}

// limpia el formulario para editar un usuario
function limpiar_form() {
    $('#edit-cedula').val("");
    $('#edit-nombre').val("");
    $('#edit-apellido').val("");
    document.getElementById('select-edit-puesto').options.length = 0;
    document.getElementById('select-edit-equipo').options.length = 0;
}

// limpia el formulario para agregar un usuario
function limpiar_form_agregar() {
    $('#cedula').val("");
    $('#nombre').val("");
    $('#apellido').val("");
    $('#pass').val("");   
}


//Filtra la tabla de usuarios, puede buscar cualqueir campo de la tabla.
function filtro_tabla_usuarios() {

    $('.search').on('keyup',function() {
        $('#tabla_colaboradores tbody').empty(); // limpia completamente la tabla
        var pag_actual = $('#pagination a.active').attr('id'); //obtenemos el id del <a tag> activo
        var cond_filtro = $('input[name="inline-radios"]:checked').val(); //obtiene el value de los radios
        var search = $('#input-busqueda').val(); //obtenemos el valor del imput
        if(search == "") { cambia_pag(pag_actual);}
         else { busquedaFiltro(search,cond_filtro);}
    });
}


// agrega eventos de tipo 'click' a los botones de paginacion ya creados.
function agregar_eventos() {
    var botones = $("[name='btn-pagination']");
    for( i = 0; i < botones.length; i++) {
        botones[i].addEventListener('click',function(){
            $('#pagination a').removeClass('active');
            $(this).addClass('active');
        });
    }
}


// llena las filas de las areas de trabajo para mostrarlas en las tablas (Modificar con base nueva)
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

/***********************MENSAJES*****************************/
    function ocultar_mensaje_agregar() {
        $('#mensaje-agregar').modal('hide');
    }

    function ocultar_mensaje_modificar() {
        $('#mensaje-editar').modal('hide');
    }

    function ocultar_mensaje_eliminar() {
        $('#mensaje-eliminar').modal('hide');
    }
/***********************MENSAJES*****************************/

//ESTE METODO TOMA EL URL DE LA PAGINA Y OBTINE EL VALOR DEL PARAMETRO ID QUE NECESITAMOS PARA BUSCAR EL PROYECTO POR SU ID.
function getQueryVariable() {
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
 /*************************** METODOS ADICIONALES*******************************/
 /******************************VALIDACIONES************************************/
 //add event construct for modern browsers or IE
//which fires the callback with a pre-converted target reference
  function addEvent(node, type, callback) {
    if (node.addEventListener) {
      node.addEventListener(
         type,
         function(e) {
          callback(e, e.target);
         },
         false
       );
     } else if (node.attachEvent) {
       node.attachEvent("on" + type, function(e) {
         callback(e, e.srcElement);
       });
     }
   }

// //identify whether a field should be validated
// //ie. true if the field is neither readonly nor disabled,
// //and has either "pattern", "required" or "aria-invalid"
 function shouldBeValidated(field) {
   return (
     !(field.getAttribute("readonly") || field.readonly) &&
     !(field.getAttribute("disabled") || field.disabled) &&
     (field.getAttribute("pattern") || field.getAttribute("required"))
   );
 }

function instantValidation(field) {
    //if the field should be validated
    if (shouldBeValidated(field)) {
      //the field is invalid if:
      //it's required but the value is empty
      //it has a pattern but the (non-empty) value doesn't pass
      var invalid =
        (field.getAttribute("required") && !field.value) ||
        (field.getAttribute("pattern") &&
          field.value &&
          !new RegExp(field.getAttribute("pattern")).test(field.value));
  
      //add or remove the attribute is indicated by
      //the invalid flag and the current attribute state
      if (!invalid && field.getAttribute("aria-invalid")) {
        field.removeAttribute("aria-invalid");
      } else if (invalid && !field.getAttribute("aria-invalid")) {
        field.setAttribute("aria-invalid", "true");
      }
    }
  }
  
  //now bind a delegated change event
  //== THIS FAILS IN INTERNET EXPLORER <= 8 ==//
  //addEvent(document, 'change', function(e, target)
  //{
  //  instantValidation(target);
  //});
  
  //now bind a change event to each applicable for field
  var fields = [
    document.getElementsByTagName("input"),
  ];
  for (var a = fields.length, i = 0; i < a; i++) {
    for (var b = fields[i].length, j = 0; j < b; j++) {
      addEvent(fields[i][j], "change", function(e, target) {
        instantValidation(target);
      });
    }
  }
 /******************************VALIDACIONES************************************/
