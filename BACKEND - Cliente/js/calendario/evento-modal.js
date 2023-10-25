var NuevoEVento;


$('#btn-Confirmar').click(function(){
    
    var NuevoEVento={
        usuario: nombreUsuario,
        start:$('#txtFecha').val()+ " " +$('#txtHoraInicial').val()+":00",
        color:"#2471A3",
        descripcion:$('#txtDescripcion').val(),
        textColor:"#FFFFFF"
    };
    $('#CalendarioWeb').fullCalendar('renderEvent',NuevoEVento);
    $('#modal_reservas').modal('toggle');
});


function RecolectarDatosGUI(){
        NuevoEVento={
        id: $('txtID').val(),
        
        usuario: ('#txtNombre'),
        start:$('#txtFecha').val()+ " " +$('#txtHoraInicial').val()+":00",
        color:"#2471A3",
        descripcion:$('#txtDescripcion').val(),
        textColor:"#FFFFFF",
        end:$('#txtFecha').val()+ " " +$('#txtHoraInicial').val()+":00"
    };
};