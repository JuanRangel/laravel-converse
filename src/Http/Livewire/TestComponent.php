<?php namespace Vsellis\Converse\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TestComponent extends Component
{
    public function render() : View
    {
        return view('converse::livewire.test-component');
    }
}
