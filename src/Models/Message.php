<?php namespace Vsellis\Converse\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vsellis\Converse\Traits\Encryptable;

class Message extends Model
{
    use Encryptable;

    protected $guarded = ['id'];

    protected $dontThrowDecryptException = true;

    public function conversation() : BelongsTo
    {
        return $this->belongsTo(config('converse.models.conversation'));
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}
