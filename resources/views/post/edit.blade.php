<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <x-input-label for="title">Title</x-input-label>
                            <input type="text" name="title" class="w-full form-input rounded-md shadow-sm @error('title') border border-red-500 @enderror" placeholder="enter blog title" value="{{ old('title') ?? $post->title }}">
                            @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <x-input-label for="title">Image</x-input-label>
                            <input type="file" name="image" class="w-full form-input rounded-md shadow-sm @error('image') border border-red-500 @enderror">
                            @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <x-input-label for="title">Document</x-input-label>
                            <input type="file" name="document" accept=".pdf" class="w-full form-input rounded-md shadow-sm @error('document') border border-red-500 @enderror">
                            @error('document')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <x-input-label for="body">Body</x-input-label>
                            <textarea name="body" id="body" rows="4" class="form-input rounded-md shadow-sm w-full @error('body') border border-red-500 @enderror" placeholder="enter blog body">
                                {{ old('body') ?? $post->body }}
                            </textarea>
                            @error('body')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
