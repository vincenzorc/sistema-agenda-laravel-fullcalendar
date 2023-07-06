@extends('layouts.app')

@section('content')

<div class="container">

     <div id="agenda">
          
     </div>

</div>

<!-- Modal -->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Datos del evento</h5>
                         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
               </div>
               <div class="modal-body">
                    

                    <form action="" id="formularioEventos">

                         {!! csrf_field() !!}
                         

                         <div class="form-group d-none">
                           <label for="id" class="form-label">ID</label>
                           <input type="text"
                             class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                         </div>

                         <div class="form-group">
                           <label for="title" class="form-label">Titulo</label>
                           <input type="text"
                             class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe un titulo...">
                         </div>

                         <div class="form-group">
                           <label for="description" class="form-label">Descripción</label>
                           <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                         </div>

                         <div class="form-group">
                           <label for="start" class="form-label">start</label>
                           <input type="date"
                             class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                         </div>

                         <div class="form-group">
                              <label for="end" class="form-label">end</label>
                              <input type="date"
                                class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                         </div>
                    </form>


               </div>
               <div class="modal-footer">
                    <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
                    <button type="button" id="btnEditar" class="btn btn-warning">Modificar</button>
                    <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               </div>
          </div>
     </div>
</div>
     
@endsection