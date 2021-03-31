@extends('plantilla.master')
@section('titulo','Personas')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('persona.index') }}">Personas</a>
    </li>


    </ul>

@endsection
@section('subtitulo','Lista de Personas')

@section('contenido')

<div class="row float-left">
    <a href="{{ route('persona.create') }}" class="btn btn-info"><i class="fas fa-user-plus"></i> Nueva Persona</a>
</div>
<br>
@if(session('datos'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('datos') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


@if(session('cancelar'))
<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
{{ session('cancelar') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
  <select name="tipo" class="form-control" id="exampleFormControlSelect1">
      <option>Buscar Por:</option>
      <option>nombres</option>
      <option>apellidos</option>
      <option>dni</option>
    </select>

    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Nombre.." aria-label="Search">
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">DNI</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  @foreach($personas as $persona)
    <tr>
      <th scope="row">{{$persona->id}}</th>
      <td>{{$persona->nombres}}</td>
      <td>{{$persona->apellidos}}</td>
      <td>{{$persona->dni}}</td>
      <td>
      <a href="{{ route('persona.edit',$persona->id)}}" class="btn btn-success">
       <i class="fa fa-edit"></i> Editar  </a>
        <a href="{{ route('persona.confirm',$persona->id)}}" class="btn btn-danger">
        <i class="fa fa-trash-alt"></i> Eliminar  </a>
     </td>

    </tr>
  @endforeach
   </tbody>
   </table>
  {{$personas}}
@endsection