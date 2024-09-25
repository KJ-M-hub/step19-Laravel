<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                投稿一覧
            </h2>
            <div class="">
                <form  action="{{route('post.index')}}" method="GET">
                    @csrf
                    <input type="search" name="search" class="bg-gray-200 w-auto py-2 border border-gray-300 rounded-md" value="{{ request('search') }}" placeholder="検索ワードを入力">
                    <input type="submit" value="検索" class="dark:bg-blue-500 dark:hover:bg-blue-300 dark:text-white rounded-md p-2">
                </form>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        {{-- @if(session('message'))
            <div class="dark:text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif --}}
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
