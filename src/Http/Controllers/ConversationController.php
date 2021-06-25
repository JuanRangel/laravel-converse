<?php namespace JuanRangel\Converse\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JuanRangel\Converse\Models\Conversation;

class ConversationController
{
    public function index()
    {
        return view('converse::conversations.index', [
            'conversations' => auth()->user()->conversations,
        ]);
    }

    public function show(Conversation $conversation) : View
    {
        return view('converse::conversations.show', [
            'conversation' => $conversation,
        ]);
    }
}
