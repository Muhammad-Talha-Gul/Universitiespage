<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\CustomAttribute;

class AttributeController extends Controller
{
    public function index() {
    	$data = CustomAttribute::OrderBy('id','DESC')->get();
    	return view('admin.attributes',['data'=>$data]);
    }

    public function create() {
    	return view('admin.add_attributes');
    }

    public function store(Request $request) {
    	CustomAttribute::creator($request);
    	return Redirect::route('attribute.index');
    }
    
    public function edit($id) {
    	$data = CustomAttribute::find($id);
    	return view('admin.edit_attribute',['data'=>$data]);	
    }

    public function update(Request $request,$id) {
    	CustomAttribute::updator($id,$request);
    	return Redirect::route('attribute.index');
    }

    public function destroy($id) {
    	$type = CustomAttribute::find($id);
        $type->delete();
        return Redirect::route('attribute.index');
    }
}
