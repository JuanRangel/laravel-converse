<?php namespace Vsellis\Converse\Traits;

use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Presenters\UserPresenter;

trait CanConverse
{
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->withTimestamps();
    }

    public function present()
    {
        return new UserPresenter($this);
    }

    public function inConversation($id)
    {
        return $this->conversations->contains('id', $id);
    }
}
