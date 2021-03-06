@extends('layouts.app')

@section('content')
<div class="row text-center">
@if (count($pets)==0)
    <div class="card col-10 mx-auto">
        <div class="card-body d-grid gap-2">
            <h3>Actualmente no tienes ninguna mascota.</h3>
            <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#createPet">Agregar mascota</button>
        </div>
    </div>
@else
    <div class="card col-10 mx-auto mb-3">
        <div class="card-body d-grid gap-2">
            <h3>Mascotas en propiedad: {{count($pets)}}</h3>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#createPet">Agregar mascota</button>
        </div>
    </div>
    @foreach ($pets as $pet)
    <div class="card col-12 col-md-3 mx-auto p-0">
        <img src="/storage/{{$pet['image']}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$pet['name']}}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            @switch($pet['race'])
                @case(0)
                    Perro
                    @break
                @case(1)
                    Gato
                    @break
                @case(2)
                    Hurón
                    @break
            @endswitch
            </li>
            <li class="list-group-item">
            @switch($pet['gender'])
                @case(0)
                    Masculino
                    @break;
                @case(1)
                    Femenino
                    @break;
            @endswitch
            </li>
            <li class="list-group-item">{{$pet['birthday']}}</li>
        </ul>
        <form method="post" action="{{route('mascotas.destroy',$pet['id'])}}" id="delete{{$pet['birthday']}}"> 
            @csrf
            @method('DELETE')
        </form>
        <div class="card-body d-flex justify-content-around">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarPet{{$pet['id']}}">Editar</button>
                <a href="{{route('vacunas.index',$pet['id'])}}" class="btn btn-primary">Vacunas</a>
                <a href="{{route('vacunas.report',$pet['id'])}}" class="btn btn-primary">PDF</a>
                <button type="submit" form="delete{{$pet['birthday']}}" class="btn btn-danger">Dar de baja</button>
            </div>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                <p>{{$pet['code_chip']}}</p>
                <p>Creado: {{$pet['created_at']}}</p>
            </small>
        </div>
    </div>
    @endforeach
@endif
</div>
<!--
@role('developer')

Hello developer

@endrole
-->
<!-- Modal Create -->
<div class="modal fade" id="createPet" tabindex="-1" aria-labelledby="createPetLabel" aria-hidden="true">
    <form method="POST" action="{{route('mascotas.store')}}" enctype="multipart/form-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPetLabel">Crear Mascota</h5>
      </div>
      <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required/>
                <small id="nameHelp" class="form-text text-muted">El nombre de la mascota</small>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control" name="image" id="image" />
            </div>
            <div class="form-group">
                <label for="race">Especie</label>
                <select name="race" id="race" class="form-select form-select-sm">
                    <option>Seleccione una</option>
                    <option value="0">Perro</option>
                    <option value="1">Gato</option>
                    <option value="2">Hurón</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Genero</label>
                <select name="gender" id="gender" class="form-select form-select-sm">
                    <option>Seleccione el sexo</option>
                    <option value="0">Masculino</option>
                    <option value="1">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthday">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="birthday" id="birthday"/>
            </div>
            <div class="form-group">
                <label for="code">Codigo del chip</label>
                <input type="number" id="code" name="code" class="form-control" aria-describedby="codeHelp" required/>
                <small id="codeHelp" class="form-text text-muted">Formato FXD-B 15 digitos. Formato FXD-A 10 digitos.</small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
</div>
</form>
</div>

<!-- ModalUpdate -->
@foreach ($pets as $pet)
<div class="modal fade" id="editarPet{{$pet['id']}}" tabindex="-1" aria-labelledby="editarPetLabel" aria-hidden="true">
    <form method="POST" action="{{route('mascotas.update',$pet['id'])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarPetLabel">Editando: {{$pet['name']}}</h5>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input value="{{$pet['name']}}" type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required/>
                <small id="nameHelp" class="form-text text-muted">El nombre de la mascota</small>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control" name="image" id="image" />
            </div>
            <div class="form-group">
                <label for="race">Especie</label>
                <select name="race" id="race" class="form-select form-select-sm">
                    <option>Seleccione una</option>
                    <option value="0" @if ($pet['race'] == '0') selected @endif>Perro</option>
                    <option value="1" @if ($pet['race'] == '1') selected @endif>Gato</option>
                    <option value="2" @if ($pet['race'] == '2') selected @endif>Hurón</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Genero</label>
                <select name="gender" id="gender" class="form-select form-select-sm">
                    <option>Seleccione el sexo</option>
                    <option value="0" @if ($pet['gender'] == '0') selected @endif>Masculino</option>
                    <option value="1" @if ($pet['gender'] == '1') selected @endif>Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthday">Fecha de nacimiento</label>
                <input value="{{$pet['birthday']}}" type="date" class="form-control" name="birthday" id="birthday"/>
            </div>
            <div class="form-group">
                <label for="code_chip">Codigo del chip</label>
                <input value="{{$pet['code_chip']}}" type="number" id="code_chip" name="code_chip" class="form-control" aria-describedby="codeHelp" required/>
                <small id="codeHelp" class="form-text text-muted">Formato FXD-B 15 digitos. Formato FXD-A 10 digitos.</small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Modificar</button>
        </div>
    </div>
</div>
</form>
</div>
@endforeach
@endsection