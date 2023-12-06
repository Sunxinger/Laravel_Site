{{-- resources/views/uploads/search.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if($uploads->isNotEmpty())
        <div class="uploads-grid">
            @foreach ($uploads as $upload)
                <div class="upload-item">
                    <img src="{{ Storage::url($upload->path) }}" alt="Uploaded Image" style="max-width: 100%; height: auto;">
                    <p>{{ $upload->description }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No images found for '{{ request('query') }}'</p>
    @endif
</div>
@endsection

@section('styles')
<style>
    .uploads-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 15px;
    }
    .upload-item {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }
</style>
@endsection
