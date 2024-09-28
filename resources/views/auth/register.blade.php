<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Book Shop</title>
    
    
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
            {{-- <div class="auth-logo">
                <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
            </div> --}}
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email -->
                <div class="form-group position-relative has-icon-left mb-4">
                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                    <input id="email" type="email" class="form-control form-control-xl" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Username -->
                <div class="form-group position-relative has-icon-left mb-4">
                    {{-- <x-input-label for="name" :value="__('Name')" /> --}}
                    <input id="name" type="text" class="form-control form-control-xl" name="name" :value="old('name')" required autocomplete="name" placeholder="Name">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group position-relative has-icon-left mb-4">
                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}
                    <input id="password" type="password" class="form-control form-control-xl" name="password" required autocomplete="new-password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group position-relative has-icon-left mb-4">
                    {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}
                    <input id="password_confirmation" type="password" class="form-control form-control-xl" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Role Selection -->
                <div class="form-group">
                    <label for="role">Register sebagai</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="-- Pilih --">-- Pilih --</option>
                        <option value="penulis">Penulis</option>
                        <option value="pelanggan">Pelanggan</option>
                    </select>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">
                    Already have an account? 
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-bold">Log in</a>.
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