@extends('plantilla.master')

@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('titulo','Modificar Persona')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('persona.index') }}">Personas</a>
    </li>
    </ul>

@endsection
@section('subtitulo','Modificar Persona')

@section('contenido')
<hr>

<center>
<div id="divmsg" style="display:none" class="alert alert-primary" role="alert">
</div>
</center>

<form>
<!--@csrf--> <!-- Crea el token en un input de tipo hidden -->
<!--{{csrf_token()}} <= Imprime el token en pantalla--> 

    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" value="{{$persona->nombres}}" id="nombres" name="nombres"">
    </div>
    <div class="form-group">
       <p>Apellidos:</p>
       <input type="text" class="form-control" value="{{$persona->apellidos}}" id="apellidos" name="apellidos"">
    </div>
    <div class="form-group">
       <p>DNI:</p>
       <input type="text" class="form-control" value="{{$persona->dni}}" id="dni" name="dni"">
    </div>
    <button type="submit" class="btn btn-info btnenviar"><i class="fas fa-save"></i> Actualizar</button>
     <a href="{{ route('cancelar_persona') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
</form>

<script type="text/javascript">
   

   
   function mostrarMensaje(mensaje){
       $("#divmsg").empty(); //limpiar div
       $("#divmsg").append("<p>"+mensaje+"</p>");
       $("#divmsg").show(500);
       $("#divmsg").hide(3000);
   }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btnenviar").click(function(e){
  
        e.preventDefault();
   
        var nombres = $("input[name=nombres]").val();
        var apellidos = $("input[name=apellidos]").val();
        var dni = $("input[name=dni]").val();
   
        $.ajax({
           type:'PUT',
           url:"{{ route('persona.update', $persona->id) }}",
           data:{nombres:nombres, apellidos:apellidos, dni:dni},
           success:function(data){
              
              mostrarMensaje(data.mensaje);
             
           }
        });
  
	});
</script>


@endsection