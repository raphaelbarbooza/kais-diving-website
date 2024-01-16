<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Locations;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function allCourses(Request $request){
        // Get All Courses
        $query = Course::where('active',1);

        $data['title'] = "Todos os Cursos";

        if($request->has('categId')){
            $query->where('category_id', $request->input('categId'));

            $categ = CourseCategory::find($request->input('categId'));
            $data['title'] = "Cursos em: ".$categ->getAttribute('title');

        }

        $data['courses'] = $query->orderBy('order','ASC')->get();

        return view('website.pages.all-courses', $data);
    }

    public function courseDetail(Course $course, Request $request){
        // Pass the course to the view
        return view('website.pages.course-detail',['course' => $course]);
    }

    public function allLocations(Request $request){
        // Get All Locations
        $data['locations'] = Locations::orderBy('created_at','DESC')->get();
        return view('website.pages.all-locations',$data);
    }

    public function locationDetail(Locations $location, Request $request){
        $random = Locations::limit(5)->inRandomOrder()->get();

        return view('website.pages.location-detail',['location' => $location, 'random' => $random]);
    }



}
