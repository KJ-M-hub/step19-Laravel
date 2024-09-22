<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            検索結果
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <x-message :message="session('message')" />
        @foreach($posts as $post)
            <div class="mt-4 p-8 dark:bg-white w-full rounded-2xl">
                <h1 class="p-4 text-lg font-semibold">
                    件名：
                    <a href="{{ route('post.show', $post)}}" class="dark:text-blue-500">
                    {{ $post->title }}
                    </a>
                </h1>
                <hr class="w-full">
                <p class="mt-4 p-4">
                    {{ $post->body }}
                </p>
                <div class="p-4 text-sm font-semibold">
                    <p>
                        {{ $post->created_at }} / {{ $post->user->name??'匿名' }}
                    </p>
                </div>
            </div>
        @endforeach
        <div class="mb-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
