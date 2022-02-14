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
        </tr>
    @endforeach
    </tbody>
</table>
@endsection