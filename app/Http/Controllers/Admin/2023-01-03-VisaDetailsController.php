<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\VisaDetails;
use App\Model\VisaCountries;
use Auth;
use DB;

class VisaDetailsController extends Controller
{
    public function index() {
        $data = VisaDetails::OrderBy('id','DESC')->get();
        
        return view('admin.visadetails',['data'=>$data]);
    }

    public function create() {
        $data = DB::table('visa_countries')
            ->leftJoin('visa_details', 'visa_countries.id', '=', 'visa_details.country_id')->OrderBy('visa_countries.id','DESC')->get(['visa_countries.id AS countryid', 'visa_countries.country_name AS countryname', 'visa_details.*']);
        return view('admin.add_visadetail',['visa_countries'=>$data]);
    }

    public function store(Request $request) {
        VisaDetails::creator($request);
        return Redirect::route('visadetails.index');
    }
    
    public function edit($id) {
        $datacountries = VisaCountries::OrderBy('id','DESC')->get();
        $data = VisaDetails::find($id);
        return view('admin.edit_visadetail',['data'=>$data,'visa_countries'=>$datacountries]); 
    }

    public function update(Request $request,$id) {
        VisaDetails::updator($id,$request);
        createSiteMap();
        return Redirect::route('visadetails.index');
    }

    public function destroy($id) {
        $type = VisaDetails::find($id);
        $type->delete();
        return Redirect::route('visadetails.index');
    }


}