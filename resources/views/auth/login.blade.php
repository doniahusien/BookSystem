<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .card-header {
            background-color: #17888c;
            color: #fff;
            text-align: center;
            font-size: 1.75rem;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #17888c;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #7da844;
        }

        .btn-link {
            color: #17888c;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .btn-link:hover {
            color: #7da844;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #17888c;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .register-link a:hover {
            color: #7da844;
        }
    </style>
</head>
<body>
<div class="card">
    <!--<div class="card-header">Library Login</div>-->
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link d-block text-center mt-3" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
