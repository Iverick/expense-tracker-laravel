@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">


            <div class="col-6 text-center">
                    <form method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf

                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                        <div class="form-group row justify-content-center mb-3">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       placeholder="Email address"
                                       required
                                       autocomplete="email"
                                       autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-3">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password"
                                       type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-3">
                                <div class="checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="mr-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-info" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
    </div>
@endsection
