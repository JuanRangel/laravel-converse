<?php namespace JuanRangel\Converse\Models;

use App\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JuanRangel\Converse\Traits\Encryptable;

class Message extends Model
{
    use Encryptable;

    protected $guarded = ['id'];

    protected $dontThrowDecryptException = true;

    public function conversation() : BelongsTo
    {
        return $this->belongsTo(config('converse.models.conversation'));
    }

    public function participant() : BelongsTo
    {
        return $this->belongsTo(config('converse.models.secondary_user'));
    }
    public function messageable()
    {
        return $this->morphTo();
    }
}
