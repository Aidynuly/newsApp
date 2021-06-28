<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('home', ['posts' => $posts]);
    }

    public function detail(Request $request, $id)
    {
        $detail = Post::find($id);
        $author = User::find($detail->user_id);
        $comments = Comment::where('post_id', $id)->get();
        return view('detail',['detail'=>$detail, 'author'=>$author->name, 'comments' => $comments]);
    }

    public function saveComment(Request $request, $slug, $id)
    {
        $request->validate([
            'comment'=>'required',
        ]);
        $data = new Comment();
        $data->user_id = $request->user()->id;
        $data->post_id = $id;
        $data->comment= $request->comment;
        $data->save();
        return redirect('detail/' . $id)->with('success', 'Comment has been submitted!');
    }

    public function savePost()
    {
        $categories = Category::all();
        return view('post', ['categories'=>$categories]);
    }

    public function storePost(Request $request )
    {
        $request->validate([
            'title' =>  'required',
            'announcement'  =>  'required',
            'text'  =>  'required'
        ]);
        $post = new Post();
        $post->user_id = $request->user()->id;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->announcement = $request->announcement;
        $post->text = $request->text;
        $post->save();

        return redirect('/post')->with('success', 'Post has been posted!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
