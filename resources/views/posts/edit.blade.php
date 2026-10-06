<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-semibold mb-6">Edit Post</h1>

                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block mb-2">Judul</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $post->title) }}"
                                class="w-full border-gray-300 rounded-md"
                            >

                            @error('title')
                                <div class="text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block mb-2">Isi Post</label>
                            <textarea
                                id="content"
                                name="content"
                                rows="8"
                                class="w-full border-gray-300 rounded-md"
                            >{{ old('content', $post->content) }}</textarea>

                            @error('content')
                                <div class="text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md"
                        >
                            Update
                        </button>

                        <a
                            href="{{ route('dashboard') }}"
                            class="ml-2 px-4 py-2 bg-gray-200 text-gray-800 rounded-md"
                        >
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>