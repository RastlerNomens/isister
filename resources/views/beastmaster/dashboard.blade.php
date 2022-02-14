@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Usuarios Registrados</h5>
                <h2 class="card-text">{{$users}}</h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Animales Registrados</h5>
                <h2 class="card-text">{{$pets}}</h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Usuarios nuevos este mes</h5>
                <h2 class="card-text">{{$users}}</h2>
            </div>
        </div>
    </div>
</div>
@endsection