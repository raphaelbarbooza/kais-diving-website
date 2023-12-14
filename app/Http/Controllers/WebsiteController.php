<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function courseDetail(Course $course, Request $request){
        // Pass the course to the view
        return view('website.pages.course-detail',['course' => $course]);
    }

}
