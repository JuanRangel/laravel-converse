<?php namespace Vsellis\Converse\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Vsellis\Converse\Models\Conversation;

class ConversationController
{
    public function index()
    {
        return redirect(route('conversations.show', auth()->user()->conversations->first()));
    }

    public function show(Conversation $conversation) : View
    {
        return view('converse::conversations.show', [
            'conversation' => $conversation,
            'conversations' => $conversation->users->first()->conversations,
        ]);
    }
}
