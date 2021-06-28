<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Desk;
class DeskController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function authors()
    {
        return User::all();
    }

    public function postsAuthor($id)
    {
        $posts = Post::where('user_id', $id)->get();
        return $posts;
    }

    public function postsCategory($title)
    {
        $cat = Category::where('title', $title)->first();
        $posts = Post::where('category_id', $cat->id)->get();
        return $posts;
    }

}
