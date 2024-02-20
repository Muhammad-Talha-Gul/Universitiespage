<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductImageGallery;
use response;

class GalleryController extends Controller
{
    public function ajax_destroy(Request $request)
    {
        $object = ProductImageGallery::find($request->id);
        unlink(public_path('uploads/'.$request->type.'/gallery/').$object->product_image_name);
        $object->delete();
        $resp['status'] = 'removed';
        return response($resp);
    }

    public function ajax_getImages($type,$prd_id,Request $request)
    {
        $data = ProductImageGallery::where('product_id',$prd_id)->get();
        return response()->view('admin.ajax_get_gallery_images', compact('data','type'));
    }
}
