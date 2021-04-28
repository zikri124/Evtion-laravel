<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('home.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function showhome(Post $post)
    {
        return view('home.show',compact('post'));
    }
}