<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\CustomCategory;
use App\Model\Posts;
use App\Model\Media;
use Excel;
use Session;

class CategoryController extends Controller
{
    public function index(Request $request) {
    	if($request->has('type')) {
            $data = CustomCategory::OrderBy('id','DESC')->where('custom_post_type',$request->type)->get();
        } else {
            $data = CustomCategory::OrderBy('id','DESC')->get();
        }
    	return view('admin.categories',['data'=>$data]);
    }

    public function create(Request $request) {
        if($request->has('type')) {
            $categories = CustomCategory::OrderBy('name','ASC')->where('custom_post_type',$request->type)->get();
        } else {
            $categories = CustomCategory::OrderBy('name','ASC')->get();
        }
        $sliders = Media::where('type','slider')->get();
    	return view('admin.add_category',['categories'=>$categories,'sliders'=>$sliders]);
    }

    public function store(Request $request) {
    	CustomCategory::creator($request);
    	if(isset($_GET['type'])) {
           return Redirect::route('category.index',['type' => $_GET['type']]);
        } else {
            return Redirect::route('category.index');
        }
    }
    
    public function edit($id, Request $request) {
    	$data = CustomCategory::find($id);
        if($request->has('type')) {
            $categories = CustomCategory::OrderBy('name','ASC')->where('custom_post_type',$request->type)->get();
        } else {
            $categories = CustomCategory::OrderBy('name','ASC')->get();
        }
        $sliders = Media::where('type','slider')->get();
    	return view('admin.edit_category',['data'=>$data,'categories'=>$categories,'sliders'=>$sliders]);	
    }

    public function update(Request $request,$id) {
    	CustomCategory::updator($id,$request);
    	if(isset($_GET['type'])) {
           return Redirect::route('category.index',['type' => $_GET['type']]);
        } else {
            return Redirect::route('category.index');
        }
    }

    public function destroy($id) {
    	$type = CustomCategory::find($id);
        $type->delete();
        if(isset($_GET['type'])) {
           return Redirect::route('category.index',['type' => $_GET['type']]);
        } else {
            return Redirect::route('category.index');
        }
    }

    public function downloadSample() {
        $data = ['name','sort_order','description'];
        return Excel::create('sample_categories', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('csv');
    }

    public function import(Request $request) {
        if($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($request->has('custom_product_type')) {
                        $value['custom_product_type'] = $request->custom_product_type;
                    }
                    CustomCategory::creator($value);
                }
            }
        }
        return "inserted";
    }

    public function delete_all(Request $request) {
        $count = count($request->ids);
        Posts::whereIn('category_id',$request->ids)->delete();
        CustomCategory::destroy($request->ids);
        Session::flash('success',$count." item(s) deleted");
        return redirect()->back();
    }
}
