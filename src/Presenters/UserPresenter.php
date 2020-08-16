<?php namespace Vsellis\Converse\Presenters;

use Illuminate\Database\Eloquent\Model;

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

    public function name()
    {
        if($this->model->id === auth()->id()) {
            return 'You';
        }

        return $this->model->name;
    }
}
