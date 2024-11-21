<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome, ") . Auth::user()->name }}
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700 text-base">
                                {{ Str::limit($post->body, 100) }}
                            </p>
                            <a href="{{ route('post.show', $post->id) }}" class="text-blue-500 mt-4 inline-block">
                                Read more
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
