<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .card h2 {
            margin-top: 0;
        }
        .card p {
            color: #666;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: white;
        }
        .auth-buttons {
            position: absolute;
            top: 40px;
            right: 20px;
        }
        .auth-button {
            background-color: white;
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
            border: 1px solid #007bff; 
            transition: background-color 0.3s ease;
        }
        .auth-button:hover {
            background-color: #0056b3;
        }

        .upload-button {
            position: absolute;
            top: 40px; 
            left: 20px; 
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .upload-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>IMAGEING®</h1>
        <h3>Welcome to Sunxing's Picture Site</h3>
    </div>

    <a href="/uploads/create" class="upload-button">Upload File</a>


    <div class="auth-buttons">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="auth-button">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="auth-button">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-button">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <div class="container">
        @foreach ($uploads as $upload)
            <div class="card">
                <img src="{{ Storage::url($upload->path) }}" alt="Uploaded Image" style="max-width: 100%; height: auto;">
                <p>{{ $upload->description }}</p>
            </div>
        @endforeach
    </div>

    <div class="footer">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</body>
</html>
