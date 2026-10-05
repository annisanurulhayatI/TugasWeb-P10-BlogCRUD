@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <h1>Daftar Post</h1>

    <x-alert />

    <a href="{{ route('posts.create') }}">Tambah Post</a>

    @forelse ($posts as $post)
        <x-card :title="$post->title">
            {{ Str::limit($post->body, 100) }}

            <br>

            <a href="{{ route('posts.show', $post) }}">Lihat</a>
            <a href="{{ route('posts.edit', $post) }}">Edit</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit">Hapus</button>
            </form>
        </x-card>
    @empty
        <p>Belum ada post.</p>
    @endforelse

    {{ $posts->links() }}
@endsection