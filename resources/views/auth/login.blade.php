<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Shop</title>
    <link rel="shortcut icon" href="{{asset("uiprofile/img/vektor.png")}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
    
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a class="navbar-brand" href="/">
                    <img src="{{asset("uiprofile/img/vektor.png")}}" alt="books" width="42" height="42" class="d-inline-block mt--2 me-2">
                    <span class="text-body fs-4 fw-bolder">Books Shop</span>
                </a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Input -->
                <div class="form-group position-relative has-icon-left mb-4">
                    <x-text-input id="email" class="form-control form-control-xl" type="text" name="email" :value="old('email')" placeholder="Email" required autofocus />
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Input -->
                <div class="form-group position-relative has-icon-left mb-4">
                    <x-text-input id="password" class="form-control form-control-xl" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-check form-check-lg d-flex align-items-end">
                    <input id="remember_me" type="checkbox" class="form-check-input me-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label class="form-check-label text-gray-600" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>

            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">
                    Don't have an account? 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                    @endif
                </p>
                <p>
                    @if (Route::has('password.request'))
                        <a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.
                    @endif
                </p>
            </div>
            
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
