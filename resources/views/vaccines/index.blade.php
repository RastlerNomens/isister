@extends('layouts.app')

@section('content')
<div class="row text-center">
@if (count($vaccines)==0)
    <div class="card col-10 mx-auto">
        <div class="card-body d-grid gap-2">
            <h3>{{$pet['name']}} aún no ha sido vacunado/a.</h3>
            <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#addVaccine">Agregar vacuna</button>
        </div>
    </div>
@else
    <div class="card col-10 mx-auto">
        <div class="card-body d-grid gap-2">
            <h3>Historial de vacunas: {{$pet['name']}}</h3>
            <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#addVaccine">Agregar vacuna</button>
        </div>
    </div>
    @foreach ($vaccines as $vaccine)
    <div class="card col-10 col-md-3 mx-auto p-0">
        <div class="card-header">
            @foreach ($diseases as $disease)
                @if ($disease['id'] == $vaccine['type'])
                    {{$disease['name']}}
                @endif
            @endforeach
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Fecha Dosis: {{$vaccine['date']}}</li>
            <li class="list-group-item">Proxima Dosis: {{$vaccine['next']}}</li>
        </ul>
    </div>
    @endforeach
@endif
<!-- Agregar vacuna -->
<div class="modal fade" id="addVaccine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vacunar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('vacunas.store')}}" >
          <input type="hidden" name="pet" id="pet" value="{{$pet['id']}}" />
        <div class="modal-body">
        @csrf
            <div class="form-group">
                <label for="type">Vacuna</label>
                <select name="type" id="type" class="form-select">
                    <option>Seleccione enfermedad</option>
                    @foreach ($diseases as $disease)
                    <option value="{{$disease['id']}}">{{$disease['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Fecha de aplicación</label>
                <input type="date" class="form-control" name="date" id="date" />
            <div>
            <div class="form-group">
                <label for="next">Proxima Dosis</label>
                <input type="date" class="form-control" name="next" id="next" />
            </div>
            <div class="form-group">
                <label for="weight">Peso</label>
                <input type="number" class="form-control" name="weight" id="weight" step="any" />
            </div>
            <div class="form-group">
                <label for="batch">Nº Lote</label>
                <input type="number" class="form-control" name="batch" id="batch" />
            </div>
            <div class="form-group">
                <label for="veterinary">Nº Veterinario</label>
                <input type="number" class="form-control" name="veterinary" id="veterinary" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Vacunar</button>
        </div>
    </form>
    </div>
  </div>
</div>

@endsection