<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style> 
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .thumbnail {
            width: 50px;
            height: auto;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px; /* 调整字体大小以匹配查看按钮 */
        }
        .button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545; /* 删除按钮的背景颜色 */
        }
        .delete-button:hover {
            background-color: #c82333;
        }

        .home-button {
            position: absolute;
            top: 20px; 
            left: 40px; 
            background-color: #28a745; /* 主页按钮的背景颜色 */
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px; /* 添加一些间距 */
        }
        .home-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Uploaded Files</h1>

        <a href="{{ url('/') }}" class="button home-button">Return to Home</a>

        <table>
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>File Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uploads as $upload)
                    <tr>
                        <td><img src="{{ Storage::url($upload->path) }}" alt="Thumbnail" class="thumbnail"></td>
                        <td>{{ $upload->originalName }}</td>
                        <td>
                            <a href="{{ Storage::url($upload->path) }}" class="button" target="_blank">View</a>
                            <form method="POST" action="{{ url('/uploads/' . $upload->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete-button" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
