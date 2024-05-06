<?php

namespace App\Http\Controllers;

use Image;
use App\Utils\ImageUpload;
use App\Models\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashbord\SettingUpdateRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Dashboard.settings.index');
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
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, $settings)
    {

        //  dd($request->faveicon);
        settings::where('id',$settings)->update($request->validated());

      if($request->has('logo'))
      {
       $logo= ImageUpload::UploadImage($request->logo,100,200,'logo/');
        settings::where('id', $settings)->update(['logo' => $logo]);
        // dd($logo);
      }

      if($request->has('favicon'))
      {
        $faveicon= ImageUpload::UploadImage($request->favicon,32,32,'favicon/');
        settings::where('id', $settings)->update(['favicon' => $faveicon]);
      }

        return redirect()->back()->with('success','Settings Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(settings $settings)
    {
        //
    }
}
