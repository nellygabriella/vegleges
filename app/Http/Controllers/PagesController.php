<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Note;
use Mail;
use Session;
use Purifier;

class PagesController extends Controller
{
    public function getIndex(){
                
        $news=News::orderBy('created_at','desc')->limit(4)->get();
        $notes=Note::orderBy('created_at','desc')->limit(3)->get();
        return view('pages.welcome')->withNews($news)->withNotes($notes);
    }
    

    public function getContact(){
        return view('pages.contact');
    }
    
    public function postContact(Request $request){
        $this->validate ($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => Purifier::clean($request->message) 
        );
        Mail::send('emails.contact',$data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('admin@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Az email el lett küldve');
        return redirect('/');
    }
}
