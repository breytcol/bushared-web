var historial = [];

function agregarAlHistorial(accion, detalle) {
    var fecha = new Date();
    var registro = {
        fecha: fecha.toLocaleString(),
        accion: accion,
        detalle: detalle
    };
    historial.push(registro);
    // Puedes guardar el historial en el servidor si es necesario
    console.log("Historial actualizado:", historial);
}