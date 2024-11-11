<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <input type="text" name="title" id="title"
                                   class="w-full form-input rounded-md shadow-sm @error('title') border border-red-500 @enderror"
                                   placeholder="Enter blog title">
                            @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Image')" />
                            <input type="file" name="image" id="image"
                                   class="w-full form-input rounded-md shadow-sm @error('image') border border-red-500 @enderror">
                            @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="body" :value="__('Body')" />
                            <textarea name="body" id="body" rows="4"
                                      class="form-input rounded-md shadow-sm w-full @error('body') border border-red-500 @enderror"
                                      placeholder="Enter blog body"></textarea>
                            @error('body')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
