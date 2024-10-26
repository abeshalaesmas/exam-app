<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NoteController extends Controller
{


    public function index()
    {
    $notes = Auth::user()->notes;
    return view('dashboard', ['notes'=>$notes]);
        
    }
    //CREATE
    public function create(){
        return view('notes.create-note');

    }
    public function store(Request $request){
        $validation = $request->validate([

            'title' => 'required',
            'content' => 'required',
        ]);

        $note = New Note();
        $note->title = $validation['title'];
        $note->content = $validation['content'];
        $note->user_id = Auth::id();

        return redirect()->route('notes.index')->with('success','Note created successfully!');

    }


}
