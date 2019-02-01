<?php

namespace App\Http\Controllers\backend;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ReviewController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('backend.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.review.create');
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
            $newImage = Image::make($originalImage)->resize(80,80);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/reviews/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if(Review::create($request->all())){
            return redirect()->route('review.create')->with('success','New review Added !');
        }
        else{
            return redirect()->route('review.create')->with('error','No review Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('backend.review.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('backend.review.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $review_data = Review::findOrFail($review->id);
        if($request->hasFile('image1')){
            $originalImage= $request->file('image1');
            $newImage = Image::make($originalImage)->resize(80,80);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/reviews/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if($review_data->update($request->all())){
            return redirect()->route('review.index')->with('success','Review Updated Successfully!');
        }else{
            return redirect()->route('review.index')->with('error','Review not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review_data = Review::findOrFail($review->id);
        if($review_data->delete($review->id)){
            return redirect()->route('review.index')->with('success',$review_data->name . ' deleted Successfully!');
        }else{
            return redirect()->route('review.index')->with('error',$review_data->name . ' could not be deleted!');
        }
    }
}
