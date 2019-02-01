<?php

namespace App\Http\Controllers\backend;

use App\SiteInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = SiteInfo::limit(1)->first();
        return view('backend.info.dashboard',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function show(SiteInfo $siteInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteInfo $siteInfo,$id)
    {
        $site_infos = $siteInfo->findOrFail($id);
        return view('backend.info.edit',compact('site_infos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteInfo $siteInfo,$id)
    {
        $site_infos = $siteInfo->findOrFail($id);
        if($request->hasFile('logo1')){
            $originalImage= $request->file('logo1');
            $newImage = Image::make($originalImage)->resize(186,50);
            $originalPath = public_path().'/uploads/logo/logo.' . $originalImage->getClientOriginalExtension();
            $newImage->save($originalPath);
            $request->merge(['logo'=>'logo.'.$originalImage->getClientOriginalExtension()]);
        }
        if($site_infos->update($request->all())){
            return redirect()->route('dashboard.index')->with('success','Info Updated Successfully!');
        }else{
            return redirect()->route('dashboard.index')->with('error','Info not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteInfo $siteInfo)
    {
        //
    }
}
