<?php

namespace App\Http\Controllers;
use App\Page;
use App\SubPage;
use App\Review;
use App\SiteInfo;
use App\HomeSlider;
use App\Affiliation;
use Illuminate\Http\Request;
use Response;

class FrontEndController extends Controller
{
    public function get_index(){
    	$pages = Page::all();
    	$sub_pages = SubPage::all();
    	$reviews = Review::all();
    	$company_info = SiteInfo::all()->first();
    	$home_sliders = HomeSlider::all();
    	$courses = Page::where('page_name','Courses')->get()->first();
		$destinations = Page::where('page_name','Destination')->get()->first();
    	return view('welcome',compact(['pages','sub_pages','reviews','company_info','home_sliders','courses','destinations']));
    }
    public function get_contact(){
    	$company_info = SiteInfo::all()->first();
    	return view('contact',compact('company_info'));
    }
    public function get_pages($id){
    	$data = Page::findOrFail($id);
    	return view('page',compact('data'));
    }
    public function get_sub_pages($id){
    	$data = SubPage::findOrFail($id);
        $page = Page::findOrFail($data->page_id);
    	return view('page',compact(['data','page']));
    }
    public function get_all_data(){
        $pages = Page::all();
        $sub_pages = SubPage::all();
        $reviews = Review::all();
        $company_info = SiteInfo::all()->first();
        $home_sliders = HomeSlider::all();
        $affiliation = Affiliation::all();
        $courses = Page::where('page_name','Courses')->get()->first();
        $destinations = Page::where('page_name','Destination')->get()->first();
        $about_us = Page::where('page_name','About Us')->get()->first();
        return Response::json(array(
            'pages' => $pages,
            'subPages' => $sub_pages,
            'reviews' => $reviews,
            'companyInfo' => $company_info,
            'homeSliders' => $home_sliders,
            'affiliation' => $affiliation,
            'courses' => $courses,
            'destinations' => $destinations,
            'about_us' => $about_us
        ));
    }
}
