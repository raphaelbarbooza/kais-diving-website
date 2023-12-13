<?php

namespace App\View\Components\Website;

use App\Models\CourseCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeServicesLine extends Component
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
        $data['categories'] = CourseCategory::orderBy('order','ASC')->get()->toArray();
        return view('components.website.home-services-line', $data);
    }
}
