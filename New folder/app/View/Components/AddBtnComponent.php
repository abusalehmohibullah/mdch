<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddBtnComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $route;
    public $icon;
    public $type;
    public function __construct($title, $route, $icon, $type)
    {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-btn-component');
    }
}
