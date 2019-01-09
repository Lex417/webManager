// funcioin que se encarga del manejo de la sesion de un usuario.
function login(){
  var formData = new FormData();
    formData.append('action', 'login_user');
    $.ajax({
        type: "POST",
        url:  "../business/login.php",
        data: formData,
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
          return true;
        }
    });
}

