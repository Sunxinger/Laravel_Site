<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=65717accd945ce0012dd93b7&product=inline-share-buttons&source=platform" async="async"></script>
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
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px 0;
        }

        .logo-and-title {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-and-title .logo {
            height: 50px; /* 调整 logo 大小 */
            margin-right: 10px; /* 在 logo 和标题之间添加一些间距 */
        }


        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            column-count: 3; /* Adjust the number of columns here */
            column-gap: 20px;
        }
        .card {
            break-inside: avoid-column; /* This prevents the cards from being split across columns */
            margin-bottom: 20px; /* Space between cards */
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card p {
            padding: 0 20px 20px; /* Add padding inside the card for the text */
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

        .auth-actions {
            display: flex;
            align-items: center; /* 垂直居中 */
            justify-content: flex-start; /* 从左侧开始排列 */
            gap: 10px; /* 元素之间的间隙 */
        }

        .sharethis-inline-share-buttons {
            /* 如果需要，可以添加额外的样式来调整分享按钮的外观 */
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

        .search-container {
            position: absolute;
            top: 110px; 
            left: 20px;
        }

        .search-input,
        .search-button {
            margin-bottom: 10px; 
        }

        .search-input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .search-button {
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 1000px) {
            .container {
                column-count: 2;
            }
        }

        @media (max-width: 600px) {
            .container {
                column-count: 1;
            }
        }

    </style>
</head>
<body>
    <div class="header">
        <div class="logo-and-title">
            <img src="{{ Storage::url('uploads/Screenshot_2023-12-06_at_11.32.54-removebg-preview.png') }}" alt="Logo" class="logo">
            <h1>IMAGEING®</h1>
        </div>
        <h3>Welcome to Sunxing's Laravel Site</h3>
    </div>

    <a href="/uploads/create" class="upload-button">Upload File</a>

    <div class="search-container">
        <form action="{{ url('/search') }}" method="GET">
            <input type="text" name="query" placeholder="Search by image description...">
            <button type="submit">Search</button>
        </form>
    </div>
    

    <div class="auth-buttons">
        @if (Route::has('login'))
            @auth
                <div class="auth-actions">
                    <div class="sharethis-inline-share-buttons"></div>
                    <a href="{{ url('/dashboard') }}" class="auth-button">Dashboard</a>
                </div>
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
                <a href="{{ route('images.show', $upload->id) }}">
                    <img src="{{ Storage::url($upload->path) }}" alt="Uploaded Image">
                </a>
                <p>{{ $upload->description }}</p>
            </div>
        @endforeach
    </div>

    
    <div class="footer">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</body>
</html>
