function registrarUsuario() {
    var username = document.getElementById("newUsername").value;
    var password = document.getElementById("newPassword").value;

    $.ajax({
        type: "POST",
        url: "php/registro.php",
        data: {
            username: username,
            password: password
        },
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            var result = JSON.parse(response);
            if (result.success) {
                document.getElementById("registroMessage").innerHTML = '<div class="alert alert-success">Usuario registrado correctamente.</div>';
            } else {
                document.getElementById("registroMessage").innerHTML = '<div class="alert alert-error">Error al registrar usuario.</div>';
            }
        }
    });
}
