@extends('layouts.external')

@section('content')
<div class="px-0"></div>
    <div class="row mx-0 mt-5">
        <div class="col-sm-4 pt-sm-3 text-center image-presentation">
            <h1 class="display-3">Isister</h1>
            <img src="{{URL::asset('/image/dog.svg')}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8 pt-sm-5">
            <h2 class="display-5 mt-5">{{ __('Register') }}</h2>
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-block google">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <div class="col-md-6 col-12">
                    <form  method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name')}}</label>
                            <input type="name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="name" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password"  id="password-confirm" type="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" required autocomplete="current-password"/>
                        </div>
                        <button type="submit" class="btn btn-outline-success">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->