<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="max-w-full max-h-screen mx-auto">
                @endif

                <div class="p-6 text-gray-900">
                    <p>{{ $post->body }}</p>
                </div>

                @if($post->document)
                    <div class="p-6 text-center">
                        <a href="{{ asset('storage/' . $post->document) }}" target="_blank" class="text-blue-500">
                            <svg class="w-8 h-8 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <!-- Include a PDF icon SVG here -->
                            </svg>
                            <p class="mt-2">View PDF Document</p>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
