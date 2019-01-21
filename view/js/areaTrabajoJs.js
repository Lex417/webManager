/*****************VARIABLES GLOBALES**************/
var seleccion_actual = 0;
/******************METODOS AJAX******************/

function mostrarDepDesarrollo(id_pag) {

    var orden = $('#select-resultados-area').children(':selected').text();
    formData = new FormData();
    formData.append('accion','mostrar_dep_desarrollo');
    formData.append('pagina',id_pag);
    formData.append('limite',orden);
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            html="";
            $('#t_body_departamentos').empty();
            for(i = 0;i < json.length; i++) {
                html+='<tr>'+
                '<td>'+json[i].nombrePersona+' '+json[i].apellidoPersona+'</td>'+
                '<td>'+json[i].Manager+'</td>'+
                '<td>'+json[i].nombreEquipoTrabajo+'</td>'+
                '</tr>';
            }
            $('#t_body_departamentos').html(html);
        }
    });
}

function mostrarDepSoporte(id_pag) {
    var orden = $('#select-resultados-area').children(':selected').text();
    formData = new FormData();
    formData.append('accion','mostrar_dep_soporte');
    formData.append('pagina',id_pag);
    formData.append('limite',orden);
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            html="";
            $('#t_body_departamentos').empty();
            for(i = 0;i < json.length; i++) {
                html+='<tr>'+
                '<td>'+json[i].nombrePersona+' '+json[i].apellidoPersona+'</td>'+
                '<td>'+json[i].Manager+'</td>'+
                '<td>'+json[i].nombreEquipoTrabajo+'</td>'+
                '</tr>';
            }
            $('#t_body_departamentos').html(html);
        }
    });
}

function mostrarDepQa(id_pag) {
    var orden = $('#select-resultados-area').children(':selected').text();
    formData = new FormData();
    formData.append('accion','mostrar_dep_qa');
    formData.append('pagina',id_pag);
    formData.append('limite',orden);
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            html="";
            $('#t_body_departamentos').empty();
            for(i = 0;i < json.length; i++) {
                html+='<tr>'+
                '<td>'+json[i].nombrePersona+' '+json[i].apellidoPersona+'</td>'+
                '<td>'+json[i].Manager+'</td>'+
                '<td>'+json[i].nombreEquipoTrabajo+'</td>'+
                '</tr>';
            }
            $('#t_body_departamentos').html(html);
        }
    });
}

function mostrarDepTeamLeader(id_pag) {
    var orden = $('#select-resultados-area').children(':selected').text();
    formData = new FormData();
    formData.append('accion','mostrar_dep_leadership');
    formData.append('pagina',id_pag);
    formData.append('limite',orden);
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            html="";
            $('#t_body_departamentos').empty();
            for(i = 0;i < json.length; i++) {
                html+='<tr>'+
                '<td>'+json[i].nombrePersona+' '+json[i].apellidoPersona+'</td>'+
                '<td>'+json[i].Manager+'</td>'+
                '<td>'+json[i].nombreEquipoTrabajo+'</td>'+
                '</tr>';
            }
            $('#t_body_departamentos').html(html);
        }
    });
}

function countDesarrollo() {
    formData = new FormData();
    formData.append('accion','count_departamentos');
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            var tam = parseInt(json[0].size);
            html="";
            var tot_filas = $('#select-resultados-area').children(':selected').text();
            var total_pag = Math.ceil((tam / tot_filas));
            $('#pagination').empty();
            if(total_pag == 0) {
                $('#mensaje-dep-vacio').modal('show');
                setTimeout(ocultar_mensaje_dep_vacios, 2000);
            }
            else if(total_pag == 1) {
                html += '<a name="btn-pagination" class="active" id='+1+' onclick="mostrarDepDesarrollo('+1+');" href="#">'+1+'</a>'
            } else {
                for(i = 1; i <= total_pag; i++) {
                    if(i == 1) { html += '<a name="btn-pagination" class="active" id='+i+' onclick="mostrarDepDesarrollo('+i+');" href="#">'+i+'</a>'}
                    else { html += '<a name="btn-pagination" id='+i+' onclick="mostrarDepDesarrollo('+i+');" href="#">'+i+'</a>'}
                }
            }
            $('#pagination').html(html);
            agregar_eventos();
        }
    });  
}

function countSoporte() {
    formData = new FormData();
    formData.append('accion','count_departamentos');
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            var tam = parseInt(json[0].size);
            html="";
            var tot_filas = $('#select-resultados-area').children(':selected').text();
            var total_pag = Math.ceil((tam / tot_filas));
            $('#pagination').empty();
            if(total_pag == 0) {
                $('#mensaje-dep-vacio').modal('show');
                setTimeout(ocultar_mensaje_dep_vacios, 2000);
            }
            else if(total_pag == 1) {
                html += '<a name="btn-pagination" class="active" id='+1+' onclick="mostrarDepSoporte('+1+');" href="#">'+1+'</a>'
            } else {
                for(i = 1; i <= total_pag; i++) {
                    if(i == 1) { html += '<a name="btn-pagination" class="active" id='+i+' onclick="mostrarDepSoporte('+i+');" href="#">'+i+'</a>'}
                    else { html += '<a name="btn-pagination" id='+i+' onclick="mostrarDepSoporte('+i+');" href="#">'+i+'</a>'}
                }
            }
            $('#pagination').html(html);
            agregar_eventos();
        }
    });  
}

function countQa() {
    formData = new FormData();
    formData.append('accion','count_departamentos');
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            var tam = parseInt(json[0].size);
            html="";
            var tot_filas = $('#select-resultados-area').children(':selected').text();
            var total_pag = Math.ceil((tam / tot_filas));
            
            $('#pagination').empty();
            if(total_pag == 0) {
                $('#mensaje-dep-vacio').modal('show');
                setTimeout(ocultar_mensaje_dep_vacios, 2000);
            }
            else if(total_pag == 1) {
                html += '<a name="btn-pagination" class="active" id='+1+' onclick="mostrarDepQa('+1+');" href="#">'+1+'</a>'
            } else {
                for(i = 1; i <= total_pag; i++) {
                    if(i == 1) { html += '<a name="btn-pagination" class="active" id='+i+' onclick="mostrarDepQa('+i+');" href="#">'+i+'</a>'}
                    else { html += '<a name="btn-pagination" id='+i+' onclick="mostrarDepQa('+i+');" href="#">'+i+'</a>'}
                }
            }
            $('#pagination').html(html);
            agregar_eventos();
        }
    });  
}

function countLeadership() {
    formData = new FormData();
    formData.append('accion','count_departamentos');
    formData.append('departamento',seleccion_actual);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            var tam = parseInt(json[0].size);
            html="";
            var tot_filas = $('#select-resultados-area').children(':selected').text();
            var total_pag = Math.ceil((tam / tot_filas));
            console.log(total_pag);
            $('#pagination').empty();

            if(total_pag == 0) {
                $('#mensaje-dep-vacio').modal('show');
                setTimeout(ocultar_mensaje_dep_vacios, 2000);
            }
            else if(total_pag == 1) {
                html += '<a name="btn-pagination" class="active" id='+1+' onclick="mostrarDepTeamLeader('+1+');" href="#">'+1+'</a>'
            } else {
                for(i = 0; i <= total_pag; i++) {
                    if(i == 1) { html += '<a name="btn-pagination" class="active" id='+i+' onclick="mostrarDepTeamLeader('+i+');" href="#">'+i+'</a>'}
                    else { html += '<a name="btn-pagination" id='+i+' onclick="mostrarDepTeamLeader('+i+');" href="#">'+i+'</a>'}
                }
            }
            $('#pagination').html(html);
            agregar_eventos();
        }
    });  
}

function busquedaFiltro(palabra,dep) {
    formData = new FormData();
    formData.append('accion','filtro_areas');
    formData.append('departamento',dep);
    formData.append('palabra',palabra);
    $.ajax({
        type: "POST",
        url:  "../business/areaTrabajoAction.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            var json = JSON.parse(respuesta);
            console.log(json);
            html="";
            $('#tabla-areas-trabajo tbody').empty();
            for(i = 0; i < json.length; i++) {
                html+='<tr>'+
                '<td>'+json[i].nombrePersona+' '+json[i].apellidoPersona+'</td>'+
                '<td>'+json[i].Manager+'</td>'+
                '<td>'+json[i].nombreEquipoTrabajo+'</td>'+
                '</tr>';
            }
            $('#t_body_departamentos').html(html);
        }
    });
}
/******************METODOS AJAX******************/

/*************METODOS ADICIONALES****************/
function desplegar_metodos2() {
    filtro_colaborador();
    filtro_manager();
    filtro_equipo();
}

function filtro_colaborador() {
    $('#input-busqueda1').on('keyup',function () {
        $('#tabla-areas-trabajo tbody').empty();
        var pag_actual = $('#pagination a.active').attr('id'); 
        var search = $('#input-busqueda1').val();
        if(search == "") {
            $('#tabla-areas-trabajo tbody').empty();
        } else {
            busquedaFiltro(search, 1);
        }
    })
}

function filtro_manager() {
    $('#input-busqueda2').on('keyup',function () {
        $('#tabla-areas-trabajo tbody').empty();
        var pag_actual = $('#pagination a.active').attr('id');
        var search = $('#input-busqueda2').val();
        if(search == "") {
            $('#tabla-areas-trabajo tbody').empty();
        } else {
            busquedaFiltro(search, 2);
        } 
    })
}

function filtro_equipo() {
    $('#input-busqueda3').on('keyup',function () {
        $('#tabla-areas-trabajo tbody').empty();
        var pag_actual = $('#pagination a.active').attr('id');
        var search = $('#input-busqueda3').val();
        if(search == "") {
            $('#tabla-areas-trabajo tbody').empty();
        } else {
            busquedaFiltro(search, 3);
        } 
    })
}

function reordenar_filas() {
    var pag_actual = $('#pagination a.active').attr('id'); //obtenemos el id del <a tag> activo
    $('#tabla-areas-trabajo tbody').empty(); // limpia completamente la tabla
    if(seleccion_actual == 1) {
        countDesarrollo();
        mostrarDepDesarrollo(pag_actual);

    } else if(seleccion_actual == 2) {
        countSoporte();
        mostrarDepSoporte(pag_actual);
    } else if(seleccion_actual == 3) {
        countQa();
        mostrarDepQa(pag_actual);
    } else if(seleccion_actual == 4) {
        countLeadership();
        mostrarDepTeamLeader(pag_actual);
    }
}

function desplegar_dep_desarrollo() {
     seleccion_actual = 1;
     countDesarrollo();
    mostrarDepDesarrollo(1);

}

function desplegar_dep_soporte() {
    seleccion_actual = 2;
    countSoporte();
    mostrarDepSoporte(1);
    
}

function desplegar_dep_qa() {
    seleccion_actual = 3;
    countQa();
    mostrarDepQa(1);
    
}

function desplegar_dep_liderazgo() {
    seleccion_actual = 4;
    countLeadership();
    mostrarDepTeamLeader(1);
    
}


function ocultar_mensaje_dep_vacios() {
    $('#mensaje-dep-vacio').modal('hide');
}

function agregar_eventos() {
    var botones = $("[name='btn-pagination']");
    for( i = 0; i < botones.length; i++) {
        botones[i].addEventListener('click',function(){
            $('#pagination a').removeClass('active');
            $(this).addClass('active');
        });
    }
}
function reset_valor_global() {
    seleccion_actual = 0;
}
/*************METODOS ADICIONALES****************/