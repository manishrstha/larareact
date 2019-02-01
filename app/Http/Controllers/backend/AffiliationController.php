<?php

namespace App\Http\Controllers\backend;

use App\Affiliation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliations = Affiliation::all();
        return view('backend.affiliation.index',compact('affiliations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.affiliation.create');
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
            $newImage = Image::make($originalImage)->resize(300,300);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/affiliation/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if(Affiliation::create($request->all())){
            return redirect()->back()->with('success','New Affiliation Added !');
        }
        else{
            return redirect()->back()->with('error','No Affiliation Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliation $affiliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function edit(Affiliation $affiliation)
    {
        return view('backend.affiliation.edit',compact('affiliation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affiliation $affiliation)
    {
        if($request->hasFile('image1')){
            $originalImage= $request->file('image1');
            $newImage = Image::make($originalImage)->resize(300,300);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/affiliation/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if($affiliation->update($request->all())){
            return redirect()->route('affiliation.index')->with('success','Affiliation updated Successfully!');
        }else{
            return redirect()->back()->with('error','Affiliation not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affiliation $affiliation)
    {
        if($affiliation->delete($affiliation->id)){
            return redirect()->back()->with('success',$affiliation->name . ' deleted Successfully!');
        }else{
            return redirect()->back()->with('error',$affiliation->name . ' could not be deleted!');
        }
    }
}
