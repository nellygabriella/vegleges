<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\News;
use App\Question;
use App\Comment;
use App\Note;
use App\Project;
use App\Job;

class PostController extends Controller
{

    public function getNewsIndex() {
        $news = News::paginate(5);
		return view('post.newsindex')->withNews($news);
	}
    
    public function getNewsSingle($slug){
        $news = News::where('slug','=',$slug)->first();

        return view('post.newssingle')->withNews($news);
    }

    public function getNotesIndex() {
        $notes = Note::orderBy('created_at', 'desc')->get();
		return view('post.notesindex')->withNotes($notes);
    }
    
    public function getNotesSingle($slug){
        
        $note = Note::where('slug','=',$slug)->first();

        return view('post.notessingle')->withNote($note);
    }
    
    public function getProjectsIndex() {

        $projects = Project::paginate(5);
		return view('post.projectsindex')->withProjects($projects);
    }
    
    public function getProjectSingle($slug){

        $project = Project::where('slug','=',$slug)->first();

        return view('post.newssingle')->withProject($project);
    }

    public function getJobsIndex() {

        $jobs = Job::paginate(5);
		return view('post.jobsindex')->withJobs($jobs);
    }

    public function getJobSingle($slug){

        $job = Job::where('slug','=',$slug)->first();

        return view('post.jobsingle')->withJob($job);
    }
    
    public function getQuestionIndex() {

        $questions = Question::paginate(5);
		return view('post.forumindex')->withQuestions($questions);
    }
    
    public function getQuestionSingle($slug){
        $question = Question::where('slug','=',$slug)->first();

        return view('post.forumsingle')->withQuestion($question);
    }

}
