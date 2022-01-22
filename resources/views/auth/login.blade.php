@extends('layouts.external')

@section('content')
<div class="px-0"></div>
    <div class="row mx-0 mt-5">
        <div class="col-sm-4 pt-sm-3 text-center image-presentation">
            <h1 class="display-3">Isister</h1>
            <img src="{{URL::asset('/image/dog.svg')}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8 pt-sm-5">
            <h2 class="display-5 mt-5">{{ __('Login') }}</h2>
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-block google">
                        <i class="fab fa-google"></i>
                    </a> 
                </div>
                <div class="col-md-6 col-12">
                    <form  method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection