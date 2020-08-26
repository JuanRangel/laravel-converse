<?php namespace Vsellis\Converse\Presenters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserPresenter
{

    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function name() : string
    {
//        if ($this->model->id === auth()->id()) {
//            return 'You';
//        }

        if(isset($this->model->first_name) && isset($this->model->last_name)) {
            return $this->model->first_name . ' ' . $this->model->last_name;
        }

        return Str::of($this->model->name)->limit(15);
    }
}
