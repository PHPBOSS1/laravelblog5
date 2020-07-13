<?php

namespace App\Http\Controllers;

use App\Article;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    public function index()
    {
        //
        return view('blog.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }


    public function create()
    {
        return view('blog/create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug'   =>  'required|unique:posts',
            'text'  =>  'required',
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->text = $request->input('text');
        $post->published = $request->input('published');
        $post->save();
        return redirect('/blog/create')->with('info', 'Данные сохранены');
    }


    public function edit($id)
    {
        //
        return view('blog.edit', [
            'post' => Post::where('id',$id)->first(),
        ]);

    }

    public function edit_store(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug'   =>  "required|unique:posts,slug,$id",
            'text'  =>  'required',
        ]);
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->text = $request->input('text');
        $post->published = $request->input('published');
        $post->save();
        return redirect('/blog/edit/'.$post->id)->with('info', 'Данные сохранены');
    }


    public function destroy($id)
    {
        //
        $post = Post::find($id);

//        $post->detach();
        $post->delete();

//        Post::find($id)->remove();
        return redirect('/blog')->with('a', "Пост номер $id удалён");
    }





}
