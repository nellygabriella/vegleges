<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes= Note::orderBy('id', 'desc')->paginate(10);
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

        $note = new Note;
        $note->title=$request->title;
        $note->slug=$request->slug;
        $note->body=$request->body;

        $file=$request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        $location = public_path('/files');
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
        return view('notes.show')->withNote($note);
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
        return view('notes.edit')->withNote($note);
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
        $note->body=$request->input('body');
        $note->original_filename=$request->input('original_filename');


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
