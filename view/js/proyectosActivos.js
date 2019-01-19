
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

