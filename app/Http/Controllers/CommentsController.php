<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\News;
use App\Project;
use Auth;
use Session;
use Purifier;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = Purifier::clean($request->get('comment_body'));
        $comment->user()->associate($request->user());
        $news = News::find($request->get('post_id'));
        $news->comments()->save($comment);

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        
        return view('comments.delete')->withComment($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Session::flash('success','A hozzászólás sikeresen törölve.');
        return view('comments.delete')->withComment($comment);
    }

    
}
