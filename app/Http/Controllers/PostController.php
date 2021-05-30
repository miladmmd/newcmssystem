<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session; 

class PostController extends Controller
{

  public function index(){
 
    // $posts = Post::all();
    $posts = auth()->user()->posts;
    return view('admin.posts.index',['posts'=>$posts]);
  }
  public function show(Post $post){
    
      return view('blog-post',['post'=>$post]);
  }

  public function create() {
    $this->authorize('create',Post::class);
    return view('admin.posts.create');
  }

  public function store(){
    // auth()->user();
    // dd(request()->all());
    $this->authorize('create',Post::class);
    $inputs = request() -> validate([
      'title' => 'required|min:8|max:255',
      // 'post_image' => 'mimes:jpeg,png',
      'post_image' => 'file',
      'body'=>'required'
    ]);

    if(request('post_image')){
      $inputs['post_image'] = request('post_image')->store('images');
    }
    // dd($request -> post_image);
    session()->flash('post-created-message','Post'.$inputs['title'].'was created'); 
    auth()->user()->posts()->create($inputs);
    return redirect()->route('post.index');   
  } 

  public function edit(Post $post) {
    return view('admin.posts.edit',['post'=>$post]);
  }

  public function update(Post $post){
    $inputs = request() -> validate([
      'title' => 'required|min:8|max:255',
      // 'post_image' => 'mimes:jpeg,png',
      'post_image' => 'file',
      'body'=>'required'
    ]);
   

    if(request('post_image')){
      $inputs['post_image'] = request('post_image')->store('images');
      $post->post_image = $inputs['post_image'];
    }
    $post->title = $inputs['title'];
    $post->body = $inputs['body'];
    // auth()->user()->posts()->save($post);
    $post->update();
    session()->flash('post-created-updated','Post'.$inputs['title'].'was updated'); 
    return redirect()->route('post.index');
  }

  public function destroy(Post $post) {
    $post->delete();

     session()->flash('message','Post was deleted');
    // Session::flash('message','Post was deleted');
    return redirect()->route('post.index');
  }


}
