@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
    <h1>Tambah Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Judul</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
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
            >{{ old('body') }}</textarea>

            @error('body')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('posts.index') }}">Kembali</a>
    </form>
@endsection