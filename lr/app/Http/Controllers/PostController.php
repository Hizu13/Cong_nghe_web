<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::all();//lấy tất cả sử dingj
    return view("home", compact("posts"));//trả về view home
    }
}
