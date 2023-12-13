<?php

namespace App\View\Components\Website;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        /**
         * Get All Sliders
         */
        $data['slides'] = \App\Models\HomeSlider::orderBy('order','ASC')->get()->toArray();
        return view('components.website.home-slider', $data);
    }
}
