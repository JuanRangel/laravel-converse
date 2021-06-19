<?php namespace JuanRangel\Converse\Traits;

use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Presenters\UserPresenter;

trait CanConverse
{
    public function conversations()
    {
        return $this->morphToMany(Conversation::class, 'conversable')->withTimestamps();
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
