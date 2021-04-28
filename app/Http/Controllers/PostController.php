<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::latest()->paginate(5);
        $userId = Auth::id();
        // $posts = Post::select('*')->where('userId',$userId)->get();
        $posts = Post::where('userId', '=', $userId)->paginate(10);
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
 
    
    public function create()
    {
        return view('posts.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'photo'     => 'image|mimes:jpeg,png,jpg|max:2048',
            'caption'   => 'required',
            'category'  => 'required',
            // 'userId'    =>
        ]);
        $path = Storage::putFile('profile', $request->file('photo'));
        $userId = Auth::id();
        Post::create(['title'=>$request->title, 'userId'=>$userId, 'photo'=>$path, 'caption'=>$request->caption, 'category'=>$request->category]);
        
        // Post::create($request->all());
 
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }
 
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
 
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
 
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'caption' => 'required',
            'category' => 'required',
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }
 
    public function destroy(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}