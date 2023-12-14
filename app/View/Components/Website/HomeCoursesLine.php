<?php

namespace App\View\Components\Website;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeCoursesLine extends Component
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
        // Get some courses
        $data['courses'] = Course::where('home_slider','1')->orderBy('order','ASC')->limit(10)->get();
        return view('components.website.home-courses-line', $data);
    }
}
