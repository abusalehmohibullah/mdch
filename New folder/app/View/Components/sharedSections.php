<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sharedSections extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $content;
    public $slug;
    public function __construct($title, $content, $slug)
    {
        $this->title = $title;
        $this->content = $content;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared-sections');
    }
}
