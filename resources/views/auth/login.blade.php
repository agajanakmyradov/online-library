<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Giriş</title>

    <style>
        @media (max-width: 400px) {
            .catImage {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-5" style="background:#f8f8ff">
            <div class="col-md-8 shadow rounded p-2" >
                <h3 class="text-center">Kitaphana</h3>
                <div class=" d-flex ">
                    <div class="catImage">
                        <img src="{{ asset('images/cat.png') }}" alt="" style="max-width: 240px; ">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class=" mb-3">
                                <label for="email" class="" >@lang('auth.email')</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label for="password" >@lang('auth.password')</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ">

                              <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            @lang('auth.remember')
                                        </label>
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <div>
                                        <a href="{{route('register')}} " class="link">@lang('auth.register')</a>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="link" href="{{ route('password.request') }}">
                                                @lang('auth.forgot')
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('buttons.login')
                                    </button>
                                    <a href="{{route('home')}}" class="btn btn-danger">@lang('buttons.cancel')</a>
                               </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
