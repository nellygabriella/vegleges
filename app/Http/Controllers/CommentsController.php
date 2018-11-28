<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VoteComment;
use App\SpamComment;
use App\Comment;
use App\Post;
use Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question_id)
    {
        $comments = Comment::where('page_id',$question_id)->get();
		$commentsData = [];
		foreach ($comments as $key) {
			$user = User::find($key->users_id);
			$name = $user->name;
			$replies = $this->replies($key->id);
			$reply = 0;
			$vote = 0;
			$voteStatus = 0;

			if(Auth::user()) {
				$voteByUser = VoteComment::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
				if($voteByUser) {
					$vote = 1;
					$voteStatus = $voteByUser->vote;
				}
		   	}
		   	if(sizeof($replies) > 0) {
		       	$reply = 1;
		   	}
	   	}
	   	$collection = collect($commentsData);
	   	return $collection->sortBy('votes');
    }

    protected function replies($comment_id)
   	{
       	$comments = Comment::where('reply_id',$comment_id)->get();
       	$replies = [];
       	foreach ($comments as $key) {
           	$user = User::find($key->users_id);
           	$name = $user->name;
           	$vote = 0;
           	$voteStatus = 0;     
 
           	if(Auth::user()) {
               	$voteByUser = VoteComment::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
               	$spamComment = SpamComment::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
               	if($voteByUser) {
                   	$vote = 1;
                   	$voteStatus = $voteByUser->vote;
               	}
           	}
            }
               
       	$collection = collect($replies);
       	return $collection->sortBy('votes');
   	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$question_id)
    {
        $this->validate($request, [
            'comment' => 'required',
            'reply_id' => 'filled',
            'question_id' => 'filled',
            'users_id' => 'required',
        ]);

        $question = Question::find($question_id);
        $comment = Comment::create($request->all());
        $comment->question()->associate($question);

        if($comment)
        return redirect()->route('post.forumsingle', [$question->slug]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment_id, $type)
    {
        if($type == "vote"){
            $this->validate($request, [
                'vote' => 'required',
                'users_id' => 'required',
            ]);

            $comments = Comment::find($comment_id);

            $data = [
                "comment_id" => $comment_id,
                'vote' => $request->vote,
                'user_id' => $request->users_id,
            ];

            if($request->vote == "up"){
                $comment = $comments->first();
                $vote = $comment->votes;
                $vote++;
                $comments->votes = $vote;
                $comments->save();
            }

            if($request->vote == "down"){
                $comment = $comments->first();
                $vote = $comment->votes;
                $vote--;
                $comments->votes = $vote;
                $comments->save();
            }

            if(VoteComment::create($data))
            return "true";
        }

        view('comments.edit');
    }

    
}
