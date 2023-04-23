<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $ticket_id)
    {
        // Validate the request data
        $request->validate([
            'body' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Create a new comment for the ticket
        $comment = new Comment([
            'body' => $request->input('body'),
            'user_id' => $user->id,
            'ticket_id' => $ticket_id,
        ]);

        // Save the comment to the database
        $comment->save();

        // Redirect back to the ticket page with a success message
        return redirect()->back()->with('success', 'Comentário criado com sucesso.');
    }
}