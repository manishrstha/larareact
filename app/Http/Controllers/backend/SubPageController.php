<?php

namespace App\Http\Controllers\backend;

use App\SubPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SubPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_pages = SubPage::all();
        return view('backend.subpages.index',compact('sub_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('backend.subpages.create');
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
            $newImage = Image::make($originalImage)->resize(700,500);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/subpages/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if(SubPage::create($request->all())){
            return redirect()->back()->with('success','New Subpage Added !');
        }
        else{
            return redirect()->back()->with('error','No Subpage Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function show(SubPage $subPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function edit(SubPage $subPage,$id)
    {
        $subPage = Subpage::findOrFail($id);
        return view('backend.subpages.edit',compact('subPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubPage $subPage,$id)
    {
        $sub_pages = $subPage->findOrFail($id);
        if($request->hasFile('image1')){
            $originalImage= $request->file('image1');
            $newImage = Image::make($originalImage)->resize(700,500);
            $img_name = str_replace(" ", "-", $request->name);
            $originalPath = public_path() . "/uploads/subpages/$img_name." . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['image'=>$img_name . '.' . $originalImage->getClientOriginalExtension()]);
        }
        if($sub_pages->update($request->all())){
            return redirect()->route('page.show',$sub_pages->page_id)->with('success','Sub page updated Successfully!');
        }else{
            return redirect()->back()->with('error','Sub page not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubPage $subPage,$id)
    {
        $sub_page_data = SubPage::findOrFail($id);
        if($sub_page_data->delete($id)){
            return redirect()->back()->with('success',$sub_page_data->name . ' deleted Successfully!');
        }else{
            return redirect()->back()->with('error',$sub_page_data->name . ' could not be deleted!');
        }
    }
}
