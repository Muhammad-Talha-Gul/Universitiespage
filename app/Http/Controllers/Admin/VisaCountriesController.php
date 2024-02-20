<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\VisaCountries;
use Auth;

class VisaCountriesController extends Controller
{
    public function index() {
        $data = VisaCountries::OrderBy('id','DESC')->get();

        return view('admin.visacountries',['data'=>$data]);
    }

    public function create() {
        return view('admin.add_visacountry');
    }

    public function store(Request $request) {
        VisaCountries::creator($request);
        return Redirect::route('visacountries.index');
    }
    
    public function edit($id) {
        $data = VisaCountries::find($id);
        return view('admin.edit_visacountry',['data'=>$data]); 
    }

    public function update(Request $request,$id) {
        VisaCountries::updator($id,$request);
        createSiteMap();
        return Redirect::route('visacountries.index');
    }

    public function destroy($id) {
        $type = VisaCountries::find($id);
        $type->delete();
        return Redirect::route('visacountries.index');
    }


}