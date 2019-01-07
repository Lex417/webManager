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
            htmlM="";
            html="";
            for(i=0; i<json.length;i++){
                html += '<div class="col-lg-6"><div  class="au-card recent-report"><div class="au-card-inner"><h3 class="title-2">'+json[i].nomProyecto+'</h3><div style="padding: 20px"  class="chart-info"><div class="chart-info__left"><div  class="chart-note"><span class="dot dot--blue"></span><span>Nombre del Proyecto:</span></div><div class="chart-note mr-0"><span class="dot dot--green"></span><span>Fecha de Inicio:</span></div></div><div class="chart-info__right"><div class="chart-statis"><span class="label">'+json[i].nomProyecto+'</span></div><div class="chart-statis mr-0"><span class="label">'+json[i].fechaProyecto+'</span></div></div></div><div class="centrarBoton"><center><button type="button" class="btn btn-primary">Ver detalles</button></center></div></div></div></div>';              
                htmlM+='<li><a href="#">'+json[i].nomProyecto+'</a></li>'
            }  

            $("#proyectoC").html(html);
            $("#proyectoMM").html(htmlM);
            $("#proyectoMD").html(htmlM);
        }
    });
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
            location.href="dashProyectos.php"
            
        }
    });
}