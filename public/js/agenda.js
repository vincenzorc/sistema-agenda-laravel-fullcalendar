
document.addEventListener('DOMContentLoaded', function() {

     let formulario = document.querySelector("#formularioEventos");

     var calendarEl = document.getElementById('agenda');

     var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          displayEventTime: false,

          headerToolbar: {
               left: 'prev,next today',
               center: 'title',
               right: 'dayGridMonth'
          },

          //events: "http://127.0.0.1:8000/event/mostrar",

          eventSources: {
               url: baseURL+"/event/mostrar",
               method: "POST",
               extraParams: {
                    _token: formulario._token.value,
               }
          },

          dateClick: function(info) {
               formulario.reset();

               formulario.start.value=info.dateStr;
               formulario.end.value=info.dateStr;

               $("#event").modal('show');
          },

          eventClick: function(info) {
               var evento = info.event;
               console.log(evento);

               axios.post(baseURL+"/event/editar/"+info.event.id)
               .then(
                    (respuesta) => {
                         formulario.id.value = respuesta.data.id;
                         formulario.title.value = respuesta.data.title;
                         formulario.description.value = respuesta.data.description;
                         formulario.start.value = respuesta.data.start;
                         formulario.end.value = respuesta.data.end;
                         $("#event").modal('show');
                    }
                    ).catch(
                         error => {
                              if(error.response) {
                                   console.log(error.response.data);
                              }
                         }
                    )
          }
     });

     calendar.render();

     document.getElementById("btnGuardar").addEventListener("click", function() {
          enviarDatos('/event/agregar');
     });

     document.getElementById("btnEliminar").addEventListener("click", function() {
          enviarDatos('/event/borrar/'+formulario.id.value);
     });

     document.getElementById("btnEditar").addEventListener("click", function() {
          enviarDatos('/event/actualizar/'+formulario.id.value);
     });

     function enviarDatos(url) {
          const datos = new FormData(formulario);

          const nuevaURL = baseURL+url;

          axios.post(nuevaURL, datos)
          .then(
               (respuesta) => {
                    calendar.refetchEvents();
                    $("#event").modal('hide');
               }
               ).catch(
                    error => {
                         if(error.response) {
                              console.log(error.response.data);
                         }
                    }
               )
     }
});