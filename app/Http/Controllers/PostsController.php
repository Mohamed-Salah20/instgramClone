<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = auth()->user()->following()->pluck('profiles.user_id');
        // dd($users);
        $posts = Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->simplePaginate(5);// or use latest() instead of orderBy , use paginate(num) instead of get()
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    public function create(){
        return view('posts.create'); //or use posts/create
    }


    public function store(){
        $data=request()->validate([
            'caption'=>'required',
            'image'=>'required|image',
        ]);
        // Post::create($data); error
       $imagePath = request('image')->store('uploads','public');

       $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

       // auth()->user()->posts()->create($data);

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        // dd(request()->all());
        return redirect('/profile'.'/'. auth()->user()->id);
    }

    public function show(Post $post){
        // dd($post);
        return view('posts.show',//compact('post'));
        [
            'post'=>$post,
        ]);
    }
}
