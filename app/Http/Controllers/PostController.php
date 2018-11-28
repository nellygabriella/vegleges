<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\News;
use App\Question;
use App\Comment;
use App\Note;

class PostController extends Controller
{

    public function getQuestionSingle($slug){
        $question = Question::where('slug','=',$slug)->first();

        return view('post.forumsingle')->withQuestion($question);
    }

    public function getNotesSingle($slug){
        
        $note = Note::where('slug','=',$slug)->first();

        return view('post.notessingle')->withNote($note);
    }


}
