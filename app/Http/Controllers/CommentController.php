<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
  

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'comment'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return redirect()->route('posts.show',$input['post_id'])
      ->with('success', 'Comment created successfully.');
    }
    public function destroy($id)
  {
    $post = Comment::find($id);
    $post->delete();
    return redirect()->route('posts.show',$post['post_id'])
      ->with('success', 'Comment deleted successfully');
  }
  // r
}
