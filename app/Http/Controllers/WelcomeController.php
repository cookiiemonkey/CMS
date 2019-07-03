<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;

class WelcomeController extends Controller
{
    public function index () 
    {
        $search = request()->query('search');
        if ($search) {
            $post = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        }
        else{
            $post = Post::simplePaginate(4);
        }
        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $post);
    }
}
