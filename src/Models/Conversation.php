<?php namespace Vsellis\Converse\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }

    public function messages(): HasMany
    {
        return $this->hasMany(config('converse.models.message'));
    }
}
