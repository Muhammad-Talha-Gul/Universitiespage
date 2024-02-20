<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\CMS;
use App\Model\Team;
use App\Model\Testimonials;
use App\Model\FAQs;
use App\Model\FAQCategories;
use App\Model\Preferences;
use App\Model\Logos;
use App\Model\Pages;
use App\Model\CustomCategory;
use App\Model\Menus;
use App\Model\MenuItems;
use App\Model\CustomPostType;
// use App\Model\Brands;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;

class CMSController extends Controller
{

   /*********************************************************
                        Footer
    *********************************************************/
    public function footer()
    {
        $data = Preferences::find(1);
        $data['footer_meta'] = json_decode($data['footer_meta'],true);
        $data['contact_meta'] = json_decode($data['contact_meta'],true);
        $data['contact_social'] = json_decode($data['contact_social'],true);
        $menus = Menus::OrderBy('id','DESC')->get();
        return view('admin.footer',['data'=>$data,'menus'=>$menus]);
    }

    public function update_footer(Request $request)
    {
        $data = $request->all();
        $data['footer_meta'] = json_encode($data['footer_meta']);
        $data['contact_social'] = json_encode($data['contact_social']);
        Preferences::find(1)->update($data);
        Session::flash('success','Changes updated!');
        return redirect()->back();
    }
                 

}
