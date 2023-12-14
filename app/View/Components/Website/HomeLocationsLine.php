<?php

namespace App\View\Components\Website;

use App\Models\Locations;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeLocationsLine extends Component
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
        $data['locations'] = Locations::orderBy('created_at','DESC')->limit(3)->get();
        return view('components.website.home-locations-line', $data);
    }
}
