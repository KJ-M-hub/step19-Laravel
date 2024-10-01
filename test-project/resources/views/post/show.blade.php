<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            個別表示
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <x-message :message="session('message')" />
       <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold dark:text-blue-500">
                    {{ $post->title}}
                </h1>
                <div class="text-right flex">
                    <a href="{{ route('post.edit', $post)}}" class="flex-1">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>
                    <form method="post" action="{{ route('post.destroy', $post)}}">
                        @csrf
                        @method('delete')
                        <x-primary-button class="ml-2 dark:bg-red-500 dark:hover:bg-red-300">
                            削除
                        </x-primary-button>
                    </form>
                </div>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{ $post->body }}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p>{{$post->created_at}} </p>
                </div>
             </div>
        </div>
    </div>
</x-app-layout>
