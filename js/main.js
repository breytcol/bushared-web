$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: { username: username, password: password },
            success: function(response) {
                if (response === 'cliente' || response === 'admin') {
                    // Muestra la información del usuario después del inicio de sesión
                    $('#userInfo').text('Rol: ' + response);
                    $('#login-container').hide();
                    $('#userInfo-container').show();
                } else {
                    $('#loginMessage').text('Credenciales incorrectas. Por favor, intenta de nuevo.');
                }
            }
        });
    });

    // Manejar el cierre de sesión
    $('#logout').click(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'GET',
            url: 'php/logout.php',
            success: function() {
                // Redirige a la página de inicio de sesión después del cierre de sesión
                window.location.href = 'index.html';
            }
        });
    });
});

$(document).ready(function () {
    // Verificar la autenticación al cargar la página
    checkAuthentication();

    // Manejar el envío del formulario de inicio de sesión
    $("#loginForm").submit(function (event) {
        event.preventDefault();
        loginUser();
    });

    // Manejar el clic en el botón de cerrar sesión
    $("#logout").click(function (event) {
        event.preventDefault();
        logoutUser();
    });
});

// Función para verificar la autenticación y mostrar la información del usuario
function checkAuthentication() {
    $.ajax({
        url: "php/check_auth.php",
        type: "GET",
        success: function (data) {
            if (data === "admin" || data === "cliente") {
                // El usuario está autenticado, mostrar la información del usuario
                $("#login-container").hide();
                $("#userInfo-container").show();
                $("#database-listContainer").show();
                // Llamar a la función para cargar y mostrar la lista de datos
                loadAndDisplayData();
            } else {
                // El usuario no está autenticado, mostrar el formulario de inicio de sesión
                $("#login-container").show();
                $("#userInfo-container").hide();
                $("#database-listContainer").hide();
            }
        }
    });
}

// Función para cargar y mostrar la lista de datos
function loadAndDisplayData() {
    $.ajax({
        url: "php/get_data.php",
        type: "GET",
        success: function (data) {
            // Limpiar la lista antes de agregar nuevos elementos
            $("#database-list").empty();
            // Iterar sobre los datos y agregar cada elemento a la lista
            $.each(data, function (index, item) {
                $("#database-list").append("<li>" + item.title + "</li>");
            });
        }
    });
}


function displayList(data) {
    var listContainer = document.getElementById("database-list");
    listContainer.innerHTML = ''; // Limpiar la lista antes de agregar elementos

    for (var i = 0; i < data.length; i++) {
        var item = data[i];
        var listItem = document.createElement("li");
        listItem.className = "list-item";
        listItem.id = "item-" + i; // Asigna un id único basado en el índice

        // Agrega más campos según tus necesidades
        listItem.innerHTML = `
            <strong>${item['title']}</strong><br>
            Descripción: ${item['description']}<br>
            Enlace: <a href="${item['link']}" target="_blank">${item['link']}</a><br>
			
        `;

        listContainer.appendChild(listItem);
    }
}

function confirmDeleteItem(index) {
    var confirmation = confirm("¿Seguro que deseas eliminar este elemento?");
    if (confirmation) {
        deleteItem(index);
    }
}

function deleteItem(index) {
    // Implementa la lógica de eliminación aquí
    data.splice(index, 1);
    displayList(data);

    // Muestra la notificación de guardado exitoso
    showSaveSuccessNotification();
}

function editItem(index) {
    var item = data[index];
    var editTitle = prompt("Editar título:", item.title);
    var editDescription = prompt("Editar descripción:", item.description);
    var editLink = prompt("Editar enlace:", item.link);

    // Actualiza los datos en el array y vuelve a mostrar la lista
    data[index].title = editTitle;
    data[index].description = editDescription;
    data[index].link = editLink;
    displayList(data);

    // Muestra la notificación de guardado exitoso
    showSaveSuccessNotification();
}

// Función para mostrar la notificación de guardado exitoso
function showSaveSuccessNotification() {
    var notification = document.getElementById("saveSuccessNotification");
    notification.style.display = "block";

    // Oculta la notificación después de 2 segundos
    setTimeout(function () {
        notification.style.display = "none";
    }, 2000);
}