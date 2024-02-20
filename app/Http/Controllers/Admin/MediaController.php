<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\Media;
use Auth;
use Session;

class MediaController extends Controller
{
    public function sliders()
    {
        $data = Media::where('type','slider')->get();
        return view('admin.sliders',['data'=>$data]);
    }

    public function add_slider()
    {
        return view('admin.add_slider');
    }

    public function store_slider(Request $request)
    {
        $data = $request->except('slider');
        $data['type'] = 'slider';
        if($request->has('slider')) { $data['meta'] = json_encode($request->slider); }
        Media::create($data);
        return Redirect::route('sliders');
    }

    public function edit_slider($id)
    {
        $data = Media::find($id);
        $sliders = [];
        if(!empty($data['meta'])) { $sliders = json_decode($data['meta'], true); }
        return view('admin.edit_slider',['data'=>$data, 'sliders'=>$sliders]);
    }

    public function update_slider($id, Request $request)
    {
        $data = $request->except('slider');
        if($request->has('slider')) { $data['meta'] = json_encode($request->slider); }
        Media::find($id)->update($data);
        return Redirect::route('sliders');
    }

    public function delete_slider($id)
    {
        Media::destroy($id);
        return Redirect::route('sliders');
    }

    public function delete_sliders(Request $request)
    {
        $count = count($request->ids);
        Media::destroy($request->ids);
        Session::flash('success',$count." item(s) deleted");
        return redirect()->back();
    }


    public function banners()
    {
        $data = Media::where('type','banners')->get();
        return view('admin.banners',['data'=>$data]);
    }

    public function add_banner()
    {
        return view('admin.add_banners');
    }

    public function store_banner(Request $request)
    {
        $data = $request->except('banners');
        $data['type'] = 'banners';
        if($request->has('banners')) { $data['meta'] = json_encode($request->banners); }
        Media::create($data);
        return Redirect::route('banners');
    }

    public function edit_banner($id)
    {
        $data = Media::find($id);
        $banners = [];
        if(!empty($data['meta'])) { $banners = json_decode($data['meta'], true); }
        return view('admin.edit_banners',['data'=>$data, 'banners'=>$banners]);
    }

    public function update_banner($id, Request $request)
    {
        $data = $request->except('banners');
        if($request->has('banners')) { $data['meta'] = json_encode($request->banners); }
        Media::find($id)->update($data);
        return Redirect::route('banners');
    }

    public function delete_banner($id)
    {
        Media::destroy($id);
        return Redirect::route('banners');
    }

    public function delete_banners(Request $request)
    {
        $count = count($request->ids);
        Media::destroy($request->ids);
        Session::flash('success',$count." item(s) deleted");
        return redirect()->back();
    }

}