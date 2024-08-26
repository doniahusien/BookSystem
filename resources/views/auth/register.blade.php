<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Book Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .card-image {
            flex: 1;
            background: url('/images/reg.jpeg') no-repeat center center;
            background-size: 350px 500px;
            border-radius: 15px 0 0 15px;
        }

        .card-body {
            flex: 1;
            padding: 30px;
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
            background-color: #17888c;
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
            margin-right: 50px;
        }

        .register-link a:hover {
            color: #7da844;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-image"></div>
        <div class="card-body">
            <div class="card-header">Register</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="col-form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="register-link">
                <a href="{{ route('login') }}">Already have an account? Login here</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
