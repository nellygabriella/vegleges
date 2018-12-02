<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Tag;
use Session;
use Auth;
use Purifier;

class QuestionsController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user()->id;
        $questions= Question::where('user_id','=',$user)->get();
        return view('questions.index')->withQuestions($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();

        return view('questions.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $this->validate($request,array(
            'question'=>'required|max:5000',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:questions,slug',
            'body'=>'required',
        ));

        $question = new Question;
        $question->user_id=$request->user()->id;
        $question->question=$request->question;
        $question->slug=$request->slug;
        $question->body=Purifier::clean($request->body);

        

        $question->save();

        $question->tags()->sync($request->tags, false);

        Session::flash('success','A bejegyzés sikeresen el lett mentve.');

        return redirect()->route('questions.show',$question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);
        return view('questions.show')->withQuestion($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }
        return view('questions.edit')->withQuestion($question)->withTags($tags2);
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
        $question = Question::find($id);

        if($request->input('slug')== $question->slug){
            $this->validate($request, array(
                'question' => 'required|max:5000',
                'body' => 'required'
            ));
        }else{
        
            $this -> validate($request, array(
                'question'=>'required|max:5000',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:questions,slug'.$id,
                'body'=>'required'
            ));
        }

        $question=Question::find($id);
        
        $question->question=$request->input('question');
        $question->slug=$request->input('slug');
        $question->body=Purifier::clean($request->input('body'));

        $question->save();

        $question->tags()->sync($request->tags,false);

        if (isset($request->tags)) {
            $question->tags()->sync($request->tags);
        } else {
            $question->tags()->sync(array());
        }

        Session::flash('success','A post sikeresen módosítva.');

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->tags()->detach();
        

        $question -> delete();

        Session::flash('succes','A post sikeresen törölve.');
        return redirect()->route('questions.index');
    }
}
