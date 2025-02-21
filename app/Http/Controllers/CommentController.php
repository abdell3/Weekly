<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Announcement;
use Illuminate\Container\Attributes\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($announcementId)
    {
        $annonce = Announcement::with('comments.user')->findOrFail($announcementId);
        return view('comments.index', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($announcementId)
    {
        return view('comments.create', compact('announcementId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, $annonceId)
    {
        Comment::create([
            'contenu' => $request->contenu,
            'user_id' => Auth::id(),
            'annonce_id' => $annonceId
        ]);

        return redirect('comments.index')->back()->with('success', 'Commentaire ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
