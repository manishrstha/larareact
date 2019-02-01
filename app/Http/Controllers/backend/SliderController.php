<?php

namespace App\Http\Controllers\backend;

use App\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::all();
        return view('backend.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image1')){
            $originalImage= $request->file('image1');
            $newImage = Image::make($originalImage)->resize(1920,712);
            $img_name = str_replace(" ", "-", $request->slogan);
            $originalPath = public_path() . "/uploads/sliders/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if(HomeSlider::create($request->all())){
            return redirect()->route('slider.create')->with('success','New slider Added !');
        }
        else{
            return redirect()->route('slider.create')->with('error','No slider Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $slider)
    {
        return view('backend.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $slider)
    {
        return view('backend.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $slider)
    {
        $slider_data = HomeSlider::findOrFail($slider->id);
        if($request->hasFile('image1')){
            $originalImage= $request->file('image1');
            $newImage = Image::make($originalImage)->resize(80,80);
            $img_name = str_replace(" ", "-", $request->slogan);
            $originalPath = public_path() . "/uploads/sliders/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if($slider_data->update($request->all())){
            return redirect()->route('slider.index')->with('success','HomeSlider Updated Successfully!');
        }else{
            return redirect()->route('slider.index')->with('error','HomeSlider not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $slider)
    {
        $slider_data = HomeSlider::findOrFail($slider->id);
        if($slider_data->delete($slider->id)){
            return redirect()->route('slider.index')->with('success',$slider_data->name . ' deleted Successfully!');
        }else{
            return redirect()->route('slider.index')->with('error',$slider_data->name . ' could not be deleted!');
        }
    }
}
