<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\CustomPostType;
use App\Model\CustomAttribute;

class PostTypeController extends Controller
{
    public function index() {
    	$data = CustomPostType::OrderBy('id','DESC')->get();
    	return view('admin.post_types',['data'=>$data]);
    }

    public function create() {
    	return view('admin.add_post_type');
    }

    public function store(Request $request) {
    	CustomPostType::creator($request);
    	return Redirect::route('post_type.index');
    }

    public function edit($id) {
    	$data = CustomPostType::find($id);
    	return view('admin.edit_post_type',['data'=>$data]);	
    }

    public function update(Request $request,$id) {
    	CustomPostType::updator($id,$request);
    	return Redirect::route('post_type.index');
    }

    public function destroy($id) {
    	$type = CustomPostType::find($id);
        CustomAttribute::where('custom_post_type',$id)->delete();
        $type->delete();
        return Redirect::route('post_type.index');
    }
}
