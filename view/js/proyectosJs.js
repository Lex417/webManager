listaPosiblesColaboradores=[];
contLista = 0;
function obtenerVistaPreviaProyecto(){

    var formData = new FormData();
    formData.append('accion','obtenerVistaProyectos');
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json = JSON.parse(data);
            console.log(json);
            console.log(json.length);
            htmlM="";
            html="";
            generarGrafico();
            for(i=0; i<json.length;i++){
//<<<<<<< Updated upstream
                html += '<div class="col-lg-6"><div  class="au-card recent-report"><div class="au-card-inner"><h3 class="title-2">'+json[i].nomProyecto+'</h3><div style="padding: 20px"  class="chart-info"><div class="chart-info__left"><div  class="chart-note"><span class="dot dot--blue"></span><span>Nombre del Proyecto:</span></div><div class="chart-note mr-0"><span class="dot dot--green"></span><span>Fecha de Inicio:</span></div></div><div class="chart-info__right"><div class="chart-statis"><span class="label">'+json[i].nomProyecto+'</span></div><div class="chart-statis mr-0"><span class="label">'+json[i].fechaProyecto+'</span></div></div></div><div class="centrarBoton"><center><button onclick="mostrarFormularioEditaProyecto('+json[i].ideProyecto+');" type="button" class="btn btn-primary">Ver detalles</button><button style="margin:20px " onclick="redireccionarAñadirColaboradores('+json[i].ideProyecto+');" type="button" class="btn btn-primary">Añadir Colaborador</button></center></div></div></div></div>';
//=======
                //html += '<div class="col-lg-6"><div  class="au-card recent-report"><div class="au-card-inner"><h3 class="title-2">'+json[i].nomProyecto+'</h3><div style="padding: 20px"  class="chart-info"><div class="chart-info__left"><div  class="chart-note"><span class="dot dot--blue"></span><span>Nombre del Proyecto:</span></div><div class="chart-note mr-0"><span class="dot dot--green"></span><span>Fecha de Inicio:</span></div></div><div class="chart-info__right"><div class="chart-statis"><span class="label">'+json[i].nomProyecto+'</span></div><div class="chart-statis mr-0"><span class="label">'+json[i].fechaProyecto+'</span></div></div></div><div class="centrarBoton"><center><button onclick="mostrarFormularioEditaProyecto('+json[i].ideProyecto+');" type="button" class="btn btn-primary">Ver detalles</button></center></div></div></div></div>';
//>>>>>>> Stashed changes
                htmlM+='<li><a href="#">'+json[i].nomProyecto+'</a></li>'
            }

            $("#proyectoC").html(html);
            $("#proyectoMM").html(htmlM);
            $("#proyectoMD").html(htmlM);
            agregarEventos();
        }
    });
}

function generarGrafico(){

  var graphData = new FormData();
  graphData.append('accion','obtenerDatosGrafica');
  $.ajax({
      type: "POST",
      url: "../business/proyectosAction.php",
      data: graphData,
      dataType: "html",
      data: graphData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data)
      {
        var proyectos = [];
        var porcentajes = [];
        var datosParseados = JSON.parse(data);

        for(var indice in datosParseados){
          proyectos.push(datosParseados[indice].nomProyecto);
          porcentajes.push(datosParseados[indice].porcentaje);
        }

        var datosGrafico = {
          labels: proyectos,
          datasets: [
            {
              label: 'Porcentaje de completitud',
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#d27850"],
              borderColor: '#000',
              hoverBackgroundColor: [ '#3177A4', '#714B81','#30947F','#B99C94','#9C4640','#A86040' ],
              hoverBorderColor: 'rgba(200,200,200,1)',
              data: porcentajes
            }
          ]
        };

        var ctx = $("#mycanvas");

        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: datosGrafico,
          options: {
            legend: { display: false },
            responsive: true,
            title: {
                    display: true,
                    text: 'Porcentaje de completitud de los proyectos'
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 100,
                  stepSize: 20
                }
              }]
            }
          }
        });
      }
  });
}

// INICIA CODIGO HECHO POR JOSE OCAMPO
function agregarEventos(){
    var botones =  document.getElementsByName("botonesDetallesProyectos");
   for(var i=0; i<botones.length; i++){
       botones[i].addEventListener("click",enviarIdProyecto,true);
   }
}



function insertarProyecto() {

    var formData = new FormData();
    formData.append('accion','insertarProyecto');
    formData.append('id_Proyecto', $('#id_Proyecto').val());
    formData.append('nombre_Proyecto', $('#nombre_Proyecto').val());
    formData.append('inicio_Proyecto', $('#inicio_Proyecto').val());
    formData.append('fin_Proyecto', $('#fin_Proyecto').val());
    formData.append('desc_Proyecto', $('#desc_Proyecto').val());
    formData.append('estado_Proyecto', $('#estado_Proyecto option:selected').text());
    formData.append('id_Proyect_Manager', $('#id_Proyect_Manager option:selected').text());

    $.ajax({
        type: "POST",
        url:  "../business/proyectosAction.php",
        data: formData,
        cache: false,
        dataType: "html",
        contentType: false,
        processData: false,
        success :function (respuesta) {
            console.log(respuesta);
            json = JSON.parse(respuesta);
            if(json.status == "true") {
                localStorage.setItem("idProyecto",$('#id_Proyecto').val());
				location.href="añadirColaboradoresProyecto.php";

            } else {alert(json[0].error + " no se agrego correctamente..");
        }

    }
 });


}

function enviarIdProyecto(event){
    //TOMA EL ID DEL PROYECTO Y LO ENVIA A LA PAGINA DE DITAR DATOS PROYECTO.
    var obj = event.target;
    mostrarFormularioEditaProyecto(obj.id);

}
function mostrarFormularioEditaProyecto(id){
    //CARGA LA PAGINA CON EL FORM PARA EDITAR LOS DATOS DEL PROYECTO.
    location.href = "detallesProyecto.php?id="+id;

}
function getQueryVariable() {
    //ESTE METODO TOMA EL URL DE LA PAGINA Y OBTINE EL VALOR DEL PARAMETRO ID QUE NECESITAMOS PARA BUSCAR EL PROYECTO POR SU ID.
    var query = window.location.search.substring(1);
    console.log(query);
    var vars = query.split("&");
    for (var i=0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if(pair[0] == "id") {
            return pair[1];
        }
    }
    return false;
 }

function editarDatosProyecto(){
    //ESTA FUNCION ES LLAMADA EN EL onload  DE LA PAGINA CON EL FORMULARIO DE EDITAR LOS DATOS DE UN PROYECTO.
     //ESTA FUNCION HACE LA LOGICA DE CONECTARSE A LA
    // BASE DE DATOS Y TRAER LOS DATOS DEL PROYECTO BUSCADO Y LLENAR LOS CAMPOS CON LOS DATOS DEL PROYECTO.

    var id_Proyecto = document.getElementById("id_Proyecto");
    var nombre_Proyecto = document.getElementById("nombre_Proyecto");
    var inicio_Proyecto = document.getElementById("inicio_Proyecto");
    var fin_Proyecto = document.getElementById("fin_Proyecto");
    var desc_Proyecto = document.getElementById("desc_Proyecto");

    var estado_Proyecto_select = document.getElementById("estado_Proyecto");
    var estado_activo = document.createElement("OPTION");
    var estado_inactivo = document.createElement("OPTION");

    estado_activo.value="activo";
    estado_inactivo.value="inactivo";
    estado_activo.innerText="activo";
    estado_inactivo.innerText="inactivo";

    estado_Proyecto_select.appendChild(estado_activo);
    estado_Proyecto_select.appendChild(estado_inactivo);

    var formData = new FormData();
    formData.append('accion','editarDatosProyecto');
    // getQueryVariable();  CON ESTE METODO OBTENEMOS EL ID DEL PROYECTO DEL URL DE LA PAGINA.
    var s = getQueryVariable();
    formData.append('id',getQueryVariable());
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json = JSON.parse(data);
            console.log(json.length);
            htmlM="";
            html="";
            for(i=0; i<1;i++){

                 id_Proyecto.value= json[i].idProyecto;
                 nombre_Proyecto.value= json[i].nomProyecto;
                 inicio_Proyecto.value= json[i].fechaInicio;
                 fin_Proyecto.value= json[i].fechaFinal;
                 desc_Proyecto.value= json[i].descripProyecto;
                 if(json[i].estado_Proyecto=="activo"){
                     estado_activo.setAttribute("selected","selected");

                 }else{
                     estado_inactivo.setAttribute("selected","selected");

                 }


            }

            $("#proyectoC").html(html);
            $("#proyectoMM").html(htmlM);
            $("#proyectoMD").html(htmlM);
        }
    });

}
function editarEstadoProyecto(){
    var btGuardarCambios = document.getElementById("btGuardarCambios");

    if(btGuardarCambios){
        btGuardarCambios.disabled=false;
    }
}
function editarNombreProyecto(){
    var nombre_Proyecto = document.getElementById("nombre_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");

    if(nombre_Proyecto && btGuardarCambios){
        nombre_Proyecto.disabled=false;
        btGuardarCambios.disabled=false;
    }
}
function editarFechasProyecto(){
    var inicio_Proyecto = document.getElementById("inicio_Proyecto");
    var fin_Proyecto = document.getElementById("fin_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");
    if(inicio_Proyecto && fin_Proyecto && btGuardarCambios){
        inicio_Proyecto.disabled=false;
        fin_Proyecto.disabled=false;
        btGuardarCambios.disabled=false;
    }
}
function editarDescripcionProyecto(){
    var desc_Proyecto = document.getElementById("desc_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");
    if(desc_Proyecto && btGuardarCambios){
        desc_Proyecto.disabled=false;
        btGuardarCambios.disabled=false;
    }
}


function detenerEditarNombreProyecto(){
    var nombre_Proyecto = document.getElementById("nombre_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");

    if(nombre_Proyecto && btGuardarCambios){
        nombre_Proyecto.disabled=true;
        btGuardarCambios.disabled=true;
    }
}
function detenerEditarFechasProyecto(){
    var inicio_Proyecto = document.getElementById("inicio_Proyecto");
    var fin_Proyecto = document.getElementById("fin_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");
    if(inicio_Proyecto && fin_Proyecto && btGuardarCambios){
        inicio_Proyecto.disabled=true;
        fin_Proyecto.disabled=true;
        btGuardarCambios.disabled=true;
    }
}
function detenerEditarDescripcionProyecto(){
    var desc_Proyecto = document.getElementById("desc_Proyecto");
    var btGuardarCambios = document.getElementById("btGuardarCambios");
    if(desc_Proyecto && btGuardarCambios){
        desc_Proyecto.disabled=true;
        btGuardarCambios.disabled=true;
    }
}


function actualizarDatosProyectoBD(){
    //MANDA A ACTUALIZAR LOS DATOS DE UN PROYECTO ESPECIFICO EN LA BASE DE DATOS.
    var id_Proyecto = document.getElementById("id_Proyecto").value;
    var nombre_Proyecto = document.getElementById("nombre_Proyecto").value;
    var inicio_Proyecto = document.getElementById("inicio_Proyecto").value;
    var fin_Proyecto = document.getElementById("fin_Proyecto").value;
    var desc_Proyecto = document.getElementById("desc_Proyecto").value;

    var estado_Proyecto_select = document.getElementById("estado_Proyecto");
    var estado_Proyecto = estado_Proyecto_select.options[estado_Proyecto_select.selectedIndex].value;


    var selectNombresManagers = document.getElementById("selectNombresManagers");
    var manager_Id = selectNombresManagers.options[selectNombresManagers.selectedIndex].id;

    var formData = new FormData();
    formData.append('accion','actualizarDatosProyectoBD');

    formData.append('id_Proyecto',id_Proyecto);
    formData.append('nombre_Proyecto',nombre_Proyecto);
    formData.append('inicio_Proyecto',inicio_Proyecto);
    formData.append('fin_Proyecto',fin_Proyecto);
    formData.append('desc_Proyecto',desc_Proyecto);
    formData.append('estado_Proyecto',estado_Proyecto);
    formData.append('manager_Id',manager_Id);




    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            /*console.log(data);
            json = JSON.parse(data);
            console.log(json.length);
            htmlM="";
            html="";
            for(i=0; i<1;i++){

                id_Proyecto.value= json[i].idProyecto;
                nombre_Proyecto.value= json[i].nomProyecto;
                inicio_Proyecto.value= json[i].fechaInicio;
                fin_Proyecto.value= json[i].fechaFinal;
                desc_Proyecto.value= json[i].descripProyecto;

            }

 */

            $("#proyectoC").html(html);
            $("#proyectoMM").html(htmlM);
            $("#proyectoMD").html(htmlM);
        }
    });

    // LLAMAMOS ESTOS METODOS PARA QUE LOS CAMPOS Y EL BOTON VUELVAN A QUEDAR NO EDITABLES
    detenerEditarNombreProyecto();
    detenerEditarFechasProyecto();
    detenerEditarDescripcionProyecto();



}

//FIN DE CODIGO HEHO POR JOSE OCAMPO


function insertarProyecto() {

    var formData = new FormData();
    formData.append('accion','insertarProyecto');
    formData.append('id_Proyecto', $('#id_Proyecto').val());
    formData.append('nombre_Proyecto', $('#nombre_Proyecto').val());
    formData.append('inicio_Proyecto', $('#inicio_Proyecto').val());
    formData.append('fin_Proyecto', $('#fin_Proyecto').val());
    formData.append('desc_Proyecto', $('#desc_Proyecto').val());
    formData.append('estado_Proyecto', $('#estado_Proyecto option:selected').text());
    formData.append('id_Proyect_Manager', $('#id_Proyect_Manager option:selected').text());

    $.ajax({
        type: "POST",
        url:  "../business/proyectosAction.php",
        data: formData,
        cache: false,
        dataType: "html",
        contentType: false,
        processData: false,
        success :function (respuesta) {
            console.log(respuesta);
            json = JSON.parse(respuesta);
            if(json.status == "true") {


            } else {alert(json[0].error + " no se agrego correctamente..");
        }

    }
 });


}


function insertarColaboradoresProyecto(){
    var formData = new FormData();
    formData.append('accion','insertarColaboradoresProyecto');
    formData.append('accion','insertarColaboradoresProyecto');
}

function cargarDepartamentos(){
    var formData = new FormData();
    formData.append('accion','cargarDepartamentos');
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json = JSON.parse(data);
            htmlM="";
            html="<option value='0'>Todos los departamentos</option>";
            for(i=0; i<json.length;i++){
                html += '<option value="'+json[i].idD+'">'+json[i].nombreD+'</option>';
            }

            $("#departamentoSelect").html(html);
        }
    });

}

function cargarSkills(){
    var formData = new FormData();
    formData.append('accion','cargarHabilidades');
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json = JSON.parse(data);
            htmlM="";
            html="<option value='0'>Todas las habilidades</option>";
            for(i=0; i<json.length;i++){
                html += '<option value="'+json[i].idH+'">'+json[i].nombreH+'</option>';
            }

            $("#habilidadSelect").html(html);

        }
    });

}

function cargarColaboradoresFiltro(){

    var formData = new FormData();
    formData.append('accion','cargarColaboradoresFiltro');
    formData.append('nombreUsuario', $('#nombreU').val());
    formData.append('departamento', $('#departamentoSelect').val());
    formData.append('habilidad', $('#habilidadSelect').val());
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json = JSON.parse(data);
            html="";
            for(i=0; i<json.length;i++){
                //variables = '"'+json[i].nomUsu+" "+json[i].apeUsu+',"'+json[i].nomD+'"';
                localStorage.setItem(i.toString(),JSON.stringify(json[i]))
                html += '<tr><td>'+json[i].nomUsu+" "+json[i].apeUsu+'</td><td>'+json[i].nomD+'</td><td>'+json[i].nomS+'</td><td>'+json[i].nomM+" "+json[i].apeM+ '</td><td><button type="button" class="btn btn-outline-success" onclick="agregarColaborador('+i+')">Agregar</button></td></tr>';

            }
            $("#tablaPosibles").html(html);

        }
    });
}

function agregarColaborador(i){
    json = JSON.parse(localStorage.getItem(i.toString()));
    listaPosiblesColaboradores.push(json);
    html="";
    for(i=0; i<listaPosiblesColaboradores.length;i++){
        html += '<tr><td>'+listaPosiblesColaboradores[i].nomUsu+" "+listaPosiblesColaboradores[i].apeUsu+'</td><td>'+listaPosiblesColaboradores[i].nomD+'</td><td>'+listaPosiblesColaboradores[i].nomS+'</td><td>'+listaPosiblesColaboradores[i].nomM+" "+listaPosiblesColaboradores[i].apeM+ '</td><td><button type="button" onclick="eliminarLista('+i+')" class="btn btn-outline-success">Eliminar</button></td></tr>';

    }
    $("#tablaAgregados").html(html);
}

function eliminarLista(cont){
    listaPosiblesColaboradores.splice(cont, 1);
    html="";
    for(i=0; i<listaPosiblesColaboradores.length;i++){
        html += '<tr><td>'+listaPosiblesColaboradores[i].nomUsu+" "+listaPosiblesColaboradores[i].apeUsu+'</td><td>'+listaPosiblesColaboradores[i].nomD+'</td><td>'+listaPosiblesColaboradores[i].nomS+'</td><td>'+listaPosiblesColaboradores[i].nomM+" "+listaPosiblesColaboradores[i].apeM+ '</td><td><button type="button" onclick="eliminarLista('+i+')" class="btn btn-outline-success">Eliminar</button></td></tr>';

    }
    $("#tablaAgregados").html(html);
}


function agregarColaboradoresProyecto(){
    var formData = new FormData();
    formData.append('accion','agregarColaboradoresProyecto');
    formData.append('json', JSON.stringify(listaPosiblesColaboradores));
    formData.append('idProyecto', localStorage.getItem("idProyecto"));
    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            json=JSON.parse(data);
            mensajeSweetAlert(json[0].mensaje, json[0].status)
            //location.href="dashProyectos.php"

        }
    });
}

function redireccionarAñadirColaboradores(idProyecto){
    localStorage.setItem("idProyecto",idProyecto);
     location.href="añadirColaboradoresProyecto.php";

}

function verTodosProyectosTabla(){
     var formData = new FormData();
    formData.append('accion','cargarTodosProyectos');

    $.ajax({
        type: "POST",
        url: "../business/proyectosAction.php",
        data: formData,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            console.log(data);
            listaProyectos = JSON.parse(data);
            html="";

            for(i=0; i<listaProyectos.length;i++){
                 html += '<tr><td>'+listaProyectos[i].nomP+'</td><td>'+listaProyectos[i].fechIP+'</td><td>'+listaProyectos[i].fechFP+'</td><td>'+listaProyectos[i].nomM+'</td><td>'+listaProyectos[i].progreso+'</td></tr>';

            }
            $("#tablaProyectos").html(html);
        }
    });
}
//Funcion de SweetAlert , la variable estado debe ser "success" o "error"
function mensajeSweetAlert(titulo, estado){
    swal({
      text: titulo,
      type: estado,
      button: "Aceptar",
    });
}
