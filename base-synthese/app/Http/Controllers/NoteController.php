<?php

namespace App\Http\Controllers;

use App\Mail\NoteCreated;
use App\Mail\NoteUpdated;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("viewAny", Note::class);

        /** @var User $user */
        $user = Auth::user();

        $notes = $user->hasRole('admin')
            ? Note::all()
            : $user->notes;

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize("create", Note::class);

        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation basique à compléter
        Gate::authorize("create", Note::class);

        $data = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:5',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $note = $user->notes()->create($data);

        // 📧 Envoi email
        Mail::to($user->email)->send(new NoteCreated($note));

        return redirect()
            ->route('notes.index')
            ->with('status', 'Note créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        Gate::authorize("view", $note);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        Gate::authorize("update", $note);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        Gate::authorize('update', $note);

        // Validation basique à compléter
        $data = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:5',
        ]);

        $note->update($data);

        /** @var User $user */
        $user = Auth::user();

        // 📧 Envoi email
        Mail::to($user->email)->send(new NoteUpdated($note));

        return redirect()
            ->route('notes.index')
            ->with('status', 'Note mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Gate::authorize('delete', $note);

        $note->delete();

        return redirect()
            ->route('notes.index')
            ->with('status', 'Note supprimée avec succès.');
    }
}
