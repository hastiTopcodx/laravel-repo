<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
//    public function home()
//    {
//        dd('you are active');
//    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $userdata= Post::with(['tags'])->simplepaginate(5);

        return view('posts.index', compact('userdata'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|min:10'

        ]);
        $data = $request->all();

        $post = Post::create($data);

        $post->tags()->sync($data['tag']);
//        $post->tags()->attach($data['tag']);
//        $post->tags()->detach($data['tag']);

        return redirect()->route('posts.store');
    }

    public function show(Post $post)
    {
        $post->load('tags');

        return view('posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit',compact('post','tags'));
    }

    public function update(Post $post, Request  $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'description' => 'required|min:10'
        ]);

        $data = $request->all();
        $post->update($data);

        $post->tags()->sync((array)$request->input('tag'));

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function postCommentStore(Request $request , $id)
    {
        $input= $request->all();
        Comment::create([
            'comment'=> $input['comment'],
            'post_id'=> $id,
        ]);

        return redirect()->route('posts.show', $id)->with('Success','Your Comment is Created Successfully...');
    }
}
