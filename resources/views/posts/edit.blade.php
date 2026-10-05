@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Judul</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}"
            >

            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="body">Isi Post</label>
            <textarea
                id="body"
                name="body"
                rows="8"
            >{{ old('body', $post->body) }}</textarea>

            @error('body')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('posts.show', $post) }}">Batal</a>
    </form>
@endsection