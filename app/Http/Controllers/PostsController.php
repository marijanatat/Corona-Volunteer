<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Post;
use GuzzleHttp\Middleware;
use Intervention\Image\Facades\Image;



class PostsController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }
   public function create()
   {
       return view('posts.create');
   }

   public function store()
   {
    request()->validate([
        'caption'=>'required',
        'image'=>['required','image']
    ]);    
    
    $imagePath=request('image')->store('uploads','public');
    // composer require intervention/image
    $image=Image::make(public_path("storage/$imagePath"))->fit(350,350);
  $image->save();
    //auth()->user()->posts()->create($data);
    Post::create([
        'user_id'=>auth()->id(),
         'caption'=>request('caption'),
         'image'=>$imagePath
     ]);
     //return redirect();
     return redirect('/profile/'.auth()->user()->id);
       
   }

   public function show( Post $post)
   {
       
       return view('posts.show',compact('post'));
   }
}
