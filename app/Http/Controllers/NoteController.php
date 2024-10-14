<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class NoteController
{
    public function index()
    {
        $notes = Note::query()->orderByDesc('id')->get();

        return view('notes.index')->with('notes', $notes);
    }


    public function show(int $id)
    {
        $note = DB::table('notes')->find($id);


        abort_if($note === null, 404);

        return view('notes.show', compact('note'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => ['required', 'min:3', Rule::unique('notes')],
            'content' => 'required',
        ]);



        Note::create([

            'title' => $request->input('title'),
            'content' => $request->input('content'),

        ]);
        return to_route('notes.index');
    }


    public function edit($id)
    {

        $note =  Note::findOrFail($id);


        return 'Editar nota: ' . $note->title;
    }
}
