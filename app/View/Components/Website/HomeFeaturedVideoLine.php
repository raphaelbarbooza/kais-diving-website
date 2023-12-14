<?php

namespace App\View\Components\Website;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeFeaturedVideoLine extends Component
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
        $data['random_featured_course'] = Course::where('featured',1)->inRandomOrder()->first();

        return view('components.website.home-featured-video-line', $data);
    }
}
