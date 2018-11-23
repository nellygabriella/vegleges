<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getIndex() {
		$news = News::paginate(10);
		return view('post.index')->withPosts($news);
	}
    
    public function getSingle($slug){
        $news = News::where('slug','=',$slug)->first();

        return view('post.single')->withNews($news);
    }
}
