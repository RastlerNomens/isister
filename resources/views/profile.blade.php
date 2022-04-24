@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('profile.particular')}}" >
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nameLabel">{{ __('Name') }}</span>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}" aria-describedby="nameLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="emailLabel">{{ __('Email') }}</span>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}" aria-describedby="emailLabel">
                        </div>
                        <hr/>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="passwordLabel">{{ __('Password') }}</span>
                            <input type="password" class="form-control" id="password" name="password" value="*********" aria-describedby="passwordLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="confirmPasswordLabel">{{ __('Confirm Password') }}</span>
                            <input type="password" class="form-control" id="confirm_password" name="confirmPassword" value="*********" aria-describedby="confirmPasswordLabel">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="zoological">{{ __('Zoological') }}</label>
                        <input class="form-check-input" type="checkbox" id="zoological" @if ($user['zoologic']) checked @endif>
                    </div>
                </div>

                <div class="card-body" id="zoologic_form" @if ($user['zoologic']) style="display:block;" @else style="display:none;" @endif>
                    <form method="POST" action="{{route('profile.zoological')}}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="zoological_nameLabel">{{ __('Name') }}</span>
                            <input type="text" class="form-control" id="zoological_name" name="zoological_name" value="{{$user['zoological_name']}}" aria-describedby="zoological_nameLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="zoological_coreLabel">{{ __('Core') }}</span>
                            <input type="text" class="form-control" id="zoological_core" name="zoological_core" value="{{$user['zoological_core']}}" aria-describedby="zoological_coreLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="zoological_directionLabel">{{ __('Direction') }}</span>
                            <input type="text" class="form-control" id="zoological_direction" name="zoological_direction" value="{{$user['zoological_direction']}}" aria-describedby="zoological_directionLabel">
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="public">{{ __('Public view') }}</label>
                                <input class="form-check-input" type="checkbox" name="public" id="public" @if ($user['public']) checked @endif>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    document.querySelector('#zoological').addEventListener('change', (event) => {
        var url = "{{route('profile.is_zoological') }}";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url);

        xhr.setRequestHeader("Accept", "application/json");
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log(xhr.responseText);
        }};


        if (document.querySelector('#zoological').checked) {
            document.querySelector('#zoologic_form').style.display = "block";
            var data = `{ "zoological": true, "_token": "{{ csrf_token() }}" }`;
        } else {
            document.querySelector('#zoologic_form').style.display = "none";
            var data = `{ "zoological": false, "_token": "{{ csrf_token() }}" }`;
        }
        xhr.send(data);
    });
</script>
@endsection