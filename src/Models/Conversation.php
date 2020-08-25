<?php namespace Vsellis\Converse\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    protected $guarded = [];

    public function messages() : HasMany
    {
        return $this->hasMany(config('converse.models.message'));
    }

    public function getParticipantsAttribute()
    {
        $all = collect();

        foreach (config('converse.models.conversables') as $name => $conversable) {
            $all->push($this->$name);
        }

        return $all->flatten();
    }
    
    public function addParticipant($conversable)
    {
        return $conversable->conversations()->attach($this);
//        return $this->
    }

    protected static function boot()
    {
        parent::boot();

        foreach (config('converse.models.conversables') as $name => $conversable) {
            self::resolveRelationUsing($name, function ($model) use ($conversable) {
                return $model->morphedByMany($conversable, 'conversable');
            });
        }
    }
}
