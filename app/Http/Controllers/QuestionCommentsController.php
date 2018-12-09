<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\QestionComment;
use App\Question;
use Auth;
use Session;
use Purifier;

class QuestionCommentsController extends Controller
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
        $comment = new QestionComment;
        $comment->comment = Purifier::clean($request->get('comment_body'));
        $comment->user()->associate($request->user());
        $news = Question::find($request->get('post_id'));
        $news->comments()->save($comment);

        return back();
    }

    public function delete($id)
    {
        $comment = QestionComment::find($id);
        
        return view('comments.delete')->withComment($comment);
    }

    public function destroy($id)
    {
        $comment = QestionComment::find($id);
        $comment->delete();
        Session::flash('success','A hozzászólás sikeresen törölve.');
        return view('comments.delete')->withComment($comment);
    }

    
}
