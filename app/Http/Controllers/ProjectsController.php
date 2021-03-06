<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Tag;
use Session;
use Image;
use Storage;
use Auth;
use App\User;
use Purifier;

class ProjectsController extends Controller
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
        $projects= Project::where('user_id','=',$user)->get();
        
        return view('projects.index')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();

        return view('projects.create')->withTags($tags);
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
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:projects,slug',
            'body'=>'required',
            'featured_image' => 'sometimes|image'
        ));

        $project = new Project;
        $project->user_id=$request->user()->id;
        $project->title=$request->title;
        $project->slug=$request->slug;
        $project->body=Purifier::clean($request->body);

        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(730,384)->save($location);

            $project->image=$filename;
        }

        $project->save();

        $project->tags()->sync($request->tags, false);

        Session::flash('success','A bejegyzés sikeresen el lett mentve.');

        return redirect()->route('projects.show',$project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Project::find($id);
        if(Auth::id() == $project->user_id){
            return view('projects.show')->withProject($project);
        }else{
            return view('error.owner');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }

        if(Auth::id() == $project->user_id){
            return view('projects.edit')->withProject($project)->withTags($tags2);
        }else{
            return view('error.owner');
        }
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
        $project = Project::find($id);

        if($request->input('slug')== $project->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        }else{
        
            $this -> validate($request, array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:projects,slug',
                'body'=>'required'
            ));
        }

        $project=Project::find($id);
        
        $project->title=$request->input('title');
        $project->slug=$request->input('slug');
        $project->body=Purifier::clean($request->input('body'));

        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(730,384)->save($location);
            $oldfilename =$project->image;

            $project->image=$filename;

            Storage::delete($oldfilename);
        }

        $project->save();

        $project->tags()->sync($request->tags,false);

        if (isset($request->tags)) {
            $project->tags()->sync($request->tags);
        } else {
            $project->tags()->sync(array());
        }

        Session::flash('success','A post sikeresen módosítva.');

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->tags()->detach();
        Storage::delete($project->image);

        $project -> delete();

        Session::flash('succes','A bejegyzés sikeresen törölve.');
        return redirect()->route('projects.index');
    }
}
