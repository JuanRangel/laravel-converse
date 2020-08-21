<?php namespace Vsellis\Converse\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    protected $guarded = [];
    
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(config('converse.models.user'));
    }

    public function participants()
    {
        return $this->belongsToMany(config('converse.models.secondary_user'));
    }

    public function messages(): HasMany
    {
        return $this->hasMany(config('converse.models.message'));
    }
    
    public function addParticipant($user)
    {
        $this->participants()->attach($user);
    }
}
