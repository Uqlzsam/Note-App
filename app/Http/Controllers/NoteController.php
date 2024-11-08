<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; 

class NoteController extends Controller
{
    public function index() {
        return view('note.index', ['notes' => Note::all()]);
    }


    public function create() {
        return view('note.create');
    }
    public function store(Request $request) {
        $request->validate([
            'title'=>'nullable', 
            'content'=>'required|max:10000'
        ]);
        
        Note::create($request->input());
        return redirect()->route('note.index');
    }

    public function edit(Note $note){
        return view('note.edit', compact('note'));
    }

    public function update(Request $request, Note $note) {
        $request->validate([
            'title'=>'nullable',
            'content'=>'required|max:10000'
        ]);

        $note->update($request->all());
        return redirect()->route('note.index', $note);
    }
    public function destroy(Note $note) {
        $note->delete();
        return redirect()->route('note.index');
    }

    public function show(Note $note) {
        return view('note.show', compact('note'));
    }
}
