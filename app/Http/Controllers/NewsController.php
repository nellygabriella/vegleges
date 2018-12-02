<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Tag;
use Session;
use Image;
use Storage;
use Auth;
use App\User;
use Purifier;

class NewsController extends Controller
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
        $news= News::where('user_id','=',$user)->get();
        return view('news.index')->withNews($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();

        return view('news.create')->withTags($tags);
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
            'slug'=>'required|alpha_dash|min:5|max:255|unique:news,slug',
            'body'=>'required',
            'featured_image' => 'sometimes|image'
        ));

        
        $news = new News;
        $news->user_id=$request->user()->id;
        $news->title=$request->title;
        $news->slug=$request->slug;
        $news->body=Purifier::clean($request->body);;

        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $news->image=$filename;
        }

        $news->save();

        $news->tags()->sync($request->tags, false);

        Session::flash('success','A bejegyzés sikeresen el lett mentve.');

        return redirect()->route('news.show',$news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::find($id);
        return view('news.show')->withNews($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }
        return view('news.edit')->withNews($news)->withTags($tags2);
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
        $news = News::find($id);

        if($request->input('slug')== $news->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        }else{
        
            $this -> validate($request, array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:news,slug'.$id,
                'body'=>'required'
            ));
        }

        $news=News::find($id);
        
        $news->title=$request->input('title');
        $news->slug=$request->input('slug');
        $news->body=Purifier::clean($request->input('body'));

        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldfilename =$news->image;

            $news->image=$filename;

            Storage::delete($oldfilename);
        }

        $news->save();

        $news->tags()->sync($request->tags,false);

        if(isset($request->tags)){
            $news->tags()->sync($request->tags);
        } else {
            $news->tags()->sync(array());
        }

        Session::flash('success','A post sikeresen mentve.');

        return redirect()->route('news.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->tags()->detach();
        Storage::delete($news->image);

        $news -> delete();

        Session::flash('succes','A post sikeresen törölve.');
        return redirect()->route('news.index');
    }
}
