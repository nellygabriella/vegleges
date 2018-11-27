<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\News;
use App\Questions;

class PostController extends Controller
{
    public function getIndex() {
        $news = News::paginate(10);
		return view('post.index')->withPosts($news);
	}
    
    public function getSingle($slug){
        $news = News::where('slug','=',$slug)->first();
        $question = Question::where('slug','=',$slug)->first();

        return view('post.single')->withNews($news)->withQuestion($question);
    }
}
