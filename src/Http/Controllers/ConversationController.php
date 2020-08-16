<?php namespace Vsellis\Converse\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Vsellis\Converse\Models\Conversation;

class ConversationController
{
    public function index()
    {
        return view('converse::conversations.index', [
            'conversations' => Auth::user()->conversations,
        ]);
    }

    public function show(Conversation $conversation)
    {
        return view('converse::conversations.show', [
            'conversation' => $conversation,
            'conversations' => Auth::user()->conversations,
        ]);
    }
}
