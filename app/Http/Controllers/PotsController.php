<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PotsController extends Controller
{
   public function show($slug){
    return Post::whereSlug($slug)->firstOrFail();
   }

   public function create(){
    return view('posts.create');
   }
   public function store(Request $request){
    $post = new Post;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->slug =Str::slug($request->title);
   //counter slug 
       // all model submit query
       //for small project
       //submit query
   /*
  
    $index =1;
    while(Post::whereSlug($post->slug)->exists()){
        $post->slug .= Str::slug($request->title) . '-' .$index++;
    }*/
    //for big project
    //plunk => wiche one column want you return
    $latestSlug = Post::whereRaw("Slug RLIKE '^{$post->slug}(-[0-9]*)?$' ")
    ->orderBy('id')
    ->pluck('slug');
  if($latestSlug){
        $pieces = explode('-',$latestSlug);
        //intval convert to integer
        $number = intval(end($pieces));
        $post->slug .= '-' . ($number+1);
    }
    $post->save();
    return $post;
   }
}
