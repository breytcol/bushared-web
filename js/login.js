function iniciarSesion() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: {
            username: username,
            password: password
        },
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            var result = JSON.parse(response);
            if (result.success) {
                document.getElementById("loginMessage").innerHTML = '<div class="alert alert-success">Salida exitosa.</div>';
                mostrarInformacionUsuario(result.userInfo);
            } else {
                document.getElementById("loginMessage").innerHTML = '<div class="alert alert-error">Credenciales incorrectas.</div>';
            }
        }
    });
}

function cerrarSesion() {
    // Ocultar la información del usuario y mostrar el formulario de inicio de sesión
    document.getElementById("userInfo-container").style.display = "none";
    document.getElementById("login-container").style.display = "block";
}

function mostrarInformacionUsuario(userInfo) {
    // Mostrar la información del usuario y ocultar el formulario de inicio de sesión
    document.getElementById("userInfo-container").style.display = "block";
    document.getElementById("login-container").style.display = "none";

    // Mostrar la información del usuario
    document.getElementById("userInfo").innerHTML = "¡Bienvenido, " + userInfo.username + "!";
}
