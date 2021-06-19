<?php namespace Vsellis\Converse\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Vsellis\Converse\Models\Conversation;

class ConversationController
{
    public function index()
    {
        return view('converse::conversations.index');
    }

    public function show(Conversation $conversation) : View
    {
        return view('converse::conversations.show', [
            'conversation' => $conversation,
            'conversations' => auth()->user()->conversations,
        ]);
    }
}
