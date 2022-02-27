@extends('layouts.dashboard')

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Google ID</th>
        <th scope="col">Zoologic?</th>
        <th scope="col">Roles</th>
        <th scope="col">Actions</th>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->google_id}}</td>
            <td>@if ($user->zoologic) Yes @else No @endif</td>
            <td>
                @foreach ($user->roles as $role) 
                    {{$role->name}}
                @endforeach
            </td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fal fa-eye"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection