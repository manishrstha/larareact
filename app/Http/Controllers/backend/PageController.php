<?php

namespace App\Http\Controllers\backend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('backend.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Page::create($request->all())){
            return redirect()->route('page.create')->with('success','New Page Added !');
        }
        else{
            return redirect()->route('page.create')->with('error','No Page Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('backend.page.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page_data = Page::findOrFail($page->id);
        if($page_data->update($request->all())){
            return redirect()->route('page.index')->with('success','Page Info Updated Successfully!');
        }else{
            return redirect()->route('page.index')->with('error','Page not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page_data = Page::findOrFail($page->id);
        if($page_data->delete($page->id)){
            return redirect()->route('page.index')->with('success',$page_data->page_name . ' deleted Successfully!');
        }else{
            return redirect()->route('page.index')->with('error',$page_data->page_name . ' could not be deleted!');
        }
    }
}
