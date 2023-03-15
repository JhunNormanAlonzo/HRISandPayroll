<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class datatable extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;

    public $columns;

    public $target;

    public $orientation;

    public $pageSize;

//    public $scroll;

    public function __construct($title, $columns, $target, $orientation, $pageSize)
    {
        $this->title = $title;
        $this->columns = $columns;
        $this->target = $target;
        $this->orientation = $orientation;
        $this->pageSize = $pageSize;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable');
    }
}
