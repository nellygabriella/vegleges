<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Auth;
use Purifier;

class NotesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user()->id;
        $notes= Note::where('user_id','=',$user)->get();
        return view('notes.index')->withNotes($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
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
        $note = new Note;
        $note->user_id=$request->user()->id;
        $note->title=$request->title;
        $note->slug=$request->slug;
        $note->body=Purifier::clean($request->body);

        $file=$request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $note->filemime = $file->getClientMimeType();
        $note->original_filename = $file->getClientOriginalName();
        $note->filename = $file->getFilename().'.'.$extension;

        $note->save();

        return redirect()->route('notes.show',$note->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note=Note::find($id);
        
        if(Auth::id() == $note->user_id){
            return view('notes.show')->withNote($note);
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
        $note = Note::find($id);

        if(Auth::id() == $note->user_id){
            return view('notes.edit')->withNote($note);
        }else{
            return view('error.owner');
        }

    }

    public function get_file($filename){
    
        $note = Note::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($note->filename);

        return (new Response($file, 200))
              ->header('Content-Type', $note->mime);
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
        $note = Note::find($id);

        $note->title=$request->input('title');
        $note->slug=$request->input('slug');
        $note->body=Purifier::clean($request->input('body'));
        $file=$request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $note->filemime = $file->getClientMimeType();
        $note->original_filename = $file->getClientOriginalName();
        $note->filename = $file->getFilename().'.'.$extension;

        $note->save();


        return redirect()->route('notes.show',$note->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->tags()->detach();
        

        $note -> delete();

        Session::flash('succes','A post sikeresen törölve.');
        return redirect()->route('notes.index');
    }
}
