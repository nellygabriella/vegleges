<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Tag;
use Session;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs= Job::orderBy('id', 'desc')->paginate(5);
        return view('jobs.index')->withJobs($jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('jobs.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'position' => 'required|max:500',
            'company'=> 'sometimes|max:1000',
            'city'=> 'sometimes|max:1000',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:jobs,slug',
            'body' => 'required'
        ));
        
        $job = new Job;
        $job->position = $request->position;
        $job->company = $request->company;
        $job->city = $request->city;
        $job->slug = $request->slug;
        $job->body = $request->body;

        
        $job->save();
        $job->tags()->sync($request->tags, false);
        Session::flash('success', 'A poszt sikeresen mentve');
        return redirect()->route('jobs.show', $job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job=Job::find($id);
        return view('jobs.show')->withJob($job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }
        return view('jobs.edit')->withJob($job)->withTags($tags2);
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
        $job = Job::find($id);

        if($request->input('slug')== $job->slug){
            $this->validate($request, array(
                'position' => 'required|max:500',
                'company'=> 'sometimes|max:1000',
                'city'=> 'sometimes|max:1000',
                'body' => 'required'
            ));
        }else{
        
            $this -> validate($request, array(
                'position' => 'required|max:500',
                'company' => 'sometimes|max:1000',
                'city' => 'sometimes|max:1000',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:jobs,slug',
                'body' => 'required'
            ));
        }

        $job=Job::find($id);
        
        $job->position = $request->position;
        $job->company = $request->company;
        $job->city = $request->city;
        $job->slug = $request->slug;
        $job->body = $request->body;

        $job->save();

        $job->tags()->sync($request->tags,false);

        if(isset($request->tags)){
            $job->tags()->sync($request->tags);
        } else {
            $job->tags()->sync(array());
        }

        Session::flash('success','A post sikeresen mentve.');

        return redirect()->route('jobs.show', $job->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->tags()->detach();

        $job -> delete();

        Session::flash('succes','A post sikeresen törölve.');
        return redirect()->route('jobs.index');
    }
}
