<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;
class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();
    return view('home.index', compact('posts'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:100',
      'body' => 'required',
    ]);
    Post::create($request->all());
    return redirect()->route('home.index')
      ->with('success', 'Post created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|max:100',
      'body' => 'required',
    ]);
    $post = Post::find($id);
    $post->update($request->all());
    return redirect()->route('home.index')
      ->with('success', 'Post updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $comments = Comment::where('post_id', $id)->get();
    if($comments!==null){
    foreach($comments as $comment){
        $comment->delete();
    }
}
    
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('home.index')
      ->with('success', 'Post deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('posts.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    $comments = Comment::where('post_id', $id)->get() ?? collect();
    return view('posts.show', compact('post',"comments"));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);
    return view('posts.edit', compact('post'));
  }
}