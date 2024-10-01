<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            // 検索条件がある場合は、検索結果を取得
        if ($request->has('search') && !empty($request->search)) {
            $posts = Post::where('title', 'like', "%{$request->search}%")
                ->orWhere('body', 'like', "%{$request->search}%")
                ->paginate(10); // ページネーションを適用
        } else {
            // 検索条件がない場合は全ての投稿を取得
            $posts = Post::paginate(10);
        }
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);
        $validated['user_id'] = auth()->id();
        Post::create($validated);

        $request->session()->flash('message', '保存しました');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // 一覧に戻るボタンからのリクエストの場合はバリデーションをスキップ
        if ($request->has('back_to_index')) {
            return redirect()->route('post.index');
        }
        
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);
        $validated['user_id'] = auth()->id();
        $post->update($validated);

        $request->session()->flash('message', '更新しました');
        return redirect()->route('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('post.index');
    }

    
}
