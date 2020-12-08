<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Gate;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function create()
  {
    $comment = new Comment;
    $comment->content = request()->content;
    $comment->article_id = request()->article_id;
    $comment->user_id = auth()->user()->id;
    $comment->save();

    return back()->with('info','A comment added');
  }

  public function delete($id)
  {
    $comment = Comment::find($id);

    if(Gate::allows('comment-delete', $comment)){
            $comment->delete();
            return redirect('/articles')->with('info', 'A comment deleted.');
        }

    return back()->with('info', 'Unauthorize to delete');

  }

}
