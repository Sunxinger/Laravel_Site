<!DOCTYPE html>
<html>
<head>
    <title>Image Details</title>
    <!-- 添加一些基本的样式 -->
</head>
<body>
    <div>
        <img src="{{ Storage::url($upload->path) }}" alt="Uploaded Image">
        <p>{{ $upload->description }}</p>
        {{-- <p>Uploaded by: {{ $upload->user->name }}</p> --}}
    </div>
</body>
</html>
