
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