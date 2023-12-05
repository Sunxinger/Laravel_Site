<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        body {
            font-family: 'Figtree', sans-serif; /* 主页使用的字体 */
            color: #333;
            background-color: #f4f4f4; /* 主页背景颜色 */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="file"], input[type="text"] {
            margin-top: 10px;
            width: 80%;
            padding: 8px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload File</h1>
        <form method="POST" action="{{ url('/uploads') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="upload">
            <input type="text" name="description" placeholder="Enter image description">
            <input type="submit" value="Save Upload">
        </form>
    </div>
</body>
</html>
