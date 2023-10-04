@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="">
                    <div class="bigTitle">
                        <h1>Login Form</h1>
                    </div>
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="formsContainer">
                            <div class="imgContainerKey">
                                <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santa.png" alt="coolsanta">
                            </div>
                            <form method="POST" action="/logindata">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

