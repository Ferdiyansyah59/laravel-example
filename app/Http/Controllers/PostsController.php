<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostsController extends Controller
{
    public function index(){

        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '. $category->name;
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' by '.$user->name;
        }

        return view('posts', [
            "title" => "All Post". $title,
            // "post" => Posts::all()
            "post" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()  // Supaya nampiliin ngurut dari yang terbaru
        ]);
    }

    public function show(Post $posts){
        return view('post',[
            "title" => "Single",
            "post" => $posts
        ]);
    }
}
