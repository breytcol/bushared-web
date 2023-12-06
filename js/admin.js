// Código completo para admin.js

// Función para cargar y mostrar los datos para administradores
function loadAndDisplayAdminData() {
    $.ajax({
        url: "php/get_admin_data.php", // Ajusta la URL según tu estructura
        type: "GET",
        success: function (response) {
            // Supongamos que la respuesta es un array JSON llamado 'adminData'
            var adminData = response.adminData;

            // Limpia la lista actual antes de agregar elementos nuevos
            $("#adminList").empty();

            // Itera sobre los datos y agrega elementos a la lista
            adminData.forEach(function (item) {
                var listItem = $("<li>").html(item.title + " - " + item.link);

                // Agrega botones de edición y eliminación solo para administradores
                var editButton = $("<button>").html("Editar").click(function () {
                    openEditForm(item);
                });

                var deleteButton = $("<button>").html("Eliminar").click(function () {
                    deleteData(item.id);
                });

                listItem.append(editButton).append(deleteButton);

                // Agrega el elemento a la lista
                $("#adminList").append(listItem);
            });
        }
    });
}

// Función para abrir el formulario de edición con los datos del elemento seleccionado
function openEditForm(item) {
    // Rellena el formulario con los datos del elemento seleccionado
    $("#editTitle").val(item.title);
    $("#editLink").val(item.link);
    $("#editDescription").val(item.description);

    // Muestra el formulario de edición
    $("#editFormContainer").show();
}

// Función para guardar cambios en un elemento
function saveChanges(id, updatedData) {
    $.ajax({
        url: "php/save_changes.php", // Ajusta la URL según tu estructura
        type: "POST",
        data: { id: id, updatedData: updatedData },
        success: function (response) {
            if (response.success) {
                alert("Cambios guardados correctamente");
                loadAndDisplayAdminData(); // Recarga y muestra la lista actualizada
                closeEditForm(); // Cierra el formulario de edición
            } else {
                alert("Error al guardar cambios");
            }
        }
    });
}

// Función para eliminar un elemento por su ID
function deleteData(id) {
    $.ajax({
        url: "php/delete_data.php", // Ajusta la URL según tu estructura
        type: "POST",
        data: { id: id },
        success: function (response) {
            if (response.success) {
                alert("Elemento eliminado correctamente");
                loadAndDisplayAdminData(); // Recarga y muestra la lista actualizada
            } else {
                alert("Error al eliminar el elemento");
            }
        }
    });
}

// Evento de clic en el botón "Guardar Cambios" en el formulario de edición
$("#saveEdit").click(function () {
    var id = /* obtener el ID del elemento actual */;
    var updatedData = {
        title: $("#editTitle").val(),
        link: $("#editLink").val(),
        description: $("#editDescription").val(),
        // Otros campos según tu estructura
    };

    saveChanges(id, updatedData);
});

// Evento de clic en el botón "Cancelar" en el formulario de edición
$("#cancelEdit").click(function () {
    closeEditForm();
});

// Función para cerrar el formulario de edición
function closeEditForm() {
    // Limpia el formulario
    $("#editTitle").val("");
    $("#editLink").val("");
    $("#editDescription").val("");

    // Oculta el formulario de edición
    $("#editFormContainer").hide();
}

// Llama a la función para cargar y mostrar datos al cargar la página
$(document).ready(function () {
    loadAndDisplayAdminData();
});
