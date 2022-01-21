@extends('layouts.app')

@section('content')
<section class="relative w-full h-full py-40 min-h-screen">
    <div class="login-box">
        <div class="login-logo">
           <a href="#"> {{ __('global.login') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                            {{ __('global.login_email') }}
                        </label> --}}
                        <input id="email" name="email" type="email"
                            class="form-control {{ $errors->has('email') ? ' ring ring-red-300' : '' }}"
                            placeholder="{{ __('global.login_email') }}" required autocomplete="email" autofocus
                            value="{{ old('email') }}" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="text-red-500">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>



                    <div class="input-group mb-3">
                        {{-- <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                            {{ __('global.login_password') }}
                        </label> --}}
                        <input id="password" name="password" type="password"
                            class="form-control {{ $errors->has('password') ? ' ring ring-red-300' : '' }}"
                            placeholder="{{ __('global.login_password') }}" required autocomplete="current-password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-red-500">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input id="remember" name="remember" type="checkbox" {{-- class="" --}} {{
                                    old('remember') ? 'checked' : '' }} />
                                <label for="remember">
                                    {{ __('global.remember_me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block"> {{ __('global.login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>

                <p class="mb-1">
                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blueGray-200">
                        <small>{{ __('global.forgot_password') }}</small>
                    </a>
                    @endif
                </p>
                <p class="mb-0">
                    @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blueGray-200">
                        <small>{{ __('global.register') }}</small>
                    </a>
                    @endif
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>


</section>
@endsection