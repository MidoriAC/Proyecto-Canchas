$(document).ready(function(){
    $('#CalendarioWeb').fullCalendar({
        header:{
            left: 'prev,next,today,Miboton', /*Antes de Next Puede ir prev*/
            center:'title',
            right: 'agendaDay,agendaWeek' /*'month,basicWeek,basicDay,agendaDay,agendaWeek'*/ 
        },
        /* customButtons:{
            Miboton:{
                text:"Boton 1",
                click:function(){
                    alert("Accion")
                }
            }
        },*/
        dayClick:function(date, jsEvent,view){
           // $('#txtFecha').val(date.format());
            $("#exampleModal").modal();
            
        },
        events: "http://localhost/DesarrolloWeb/Proyecto-Canchas-Cliente/BACKEND/controller/eventos.php",
        /*eventSources:[{
            events:
            [
            {
                title:'Evento 1, ',
                descripcion:"Hola Mundo",
                start:'2023-10-02',
                color:"#FF0F0",
                textColor:"#FFFFFF"
            },
            {
                title:'Evento 2, hOLA MUNDO ',
                start:'2023-10-09',
                descripcion:"Hola Todos",
                end:'2023-10-11',
            },
            {
                title:'Evento 3, Bienvenida',
                descripcion:"Hola",
                start:'2023-10-12T12:30:00',
                end:'2023-10-12T14:30:00',
                allDay:false
            },
            {
                title:'Evento 4, Bienvenida',
                descripcion:"Hello",
                start:'2023-10-12T14:30:00',
                end:'2023-10-12T17:30:00',
                allDay:false
            }
        ],
        color:"black",
        textColor:"yellow"
        }],*/
        eventClick:function(calEvent,jsEvent,view){
            $('#tituloEvento').html(calEvent.usuario);
            $('#descripcionEvento').html(calEvent.descripcion);
            $('#exampleModal').modal();
        }
        
    });
});

