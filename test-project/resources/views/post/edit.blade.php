<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            編集画面
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="dark:text-red-400 font-bold mt-4">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{route('post.update', $post)}}">
            @csrf
            @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4 text-gray-200">件名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" id="title" name="title" class="bg-gray-200 w-auto py-2 border border-gray-300 rounded-md" value="{{old('title', $post->title)}}"/>
                </div>
            </div>

            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4 text-gray-200">本文</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <textarea id="body" name="body" class="bg-gray-200 w-auto py-2 border border-gray-300 rounded-md" cols="30" rows="5">{{old('body', $post->body)}}</textarea>
            </div>
            <div class="mt-8 flex">
                <x-primary-button class="mt-4">
                    更新する
                </x-primary-button>
                <a href="{{route('post.index')}}" class="mt-4 ml-8">
                    <x-primary-button  name="back_to_index" class="dark:bg-green-500 dark:hover:bg-green-200">
                        一覧に戻る
                    </x-primary-button>
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
