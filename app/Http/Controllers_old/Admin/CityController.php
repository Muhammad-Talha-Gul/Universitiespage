<?php

namespace App\Http\Controllers\Admin;

use App\Model\City;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class CityController extends Controller
{
    /**
     * Defining scope of variable
     *
     * @access public
     * @var    array $city
     */
    protected $city;

    /**
     * Create a new controller instance.
     *
     * @param mixed $city get city model
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = City::OrderBy('id','asc')->get();   
        return view('admin.cities',['data'=>$data]);
    }
    
    public function getCharges(Request $request){
        $shipping = City::where('id',$request->id)->value('shipping_charges');
        return response()->json($shipping);
    }

    public function getChargesByName(Request $request){
        $shipping = City::where('city',$request->id)->value('shipping_charges');
        return response()->json($shipping);
    }

    public function changeToAll(Request $request){
        if($request->has('shipping_charges')){
            DB::table('pk_cities')->update(['shipping_charges' => (int)$request->shipping_charges]);
            return response()->json(1);
        }else{
            return response()->json(0);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountriesList()
    {
        //
        $data = City::OrderBy('id','asc')->get();   
        return view('admin.countries.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCountry()
    {
        //
        
        return view('admin.countries.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCountry(Request $request, City $city)
    {
        //
        $this->validate(
            $request, [
                'name'    => 'required',
                'code'    => 'required',
            ]
        );
        $this->city = $city;
        $country = $request->except('_token');
        $save = $this->city->saveCountry($country);
        if ($save['type'] == 'success') {
            Session::flash('success', 'Successfully Saved');
            return Redirect::route('countryList');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCountry($id ,Request $request)
    {
        //
        
        $this->validate(
            $request, [
                'name'    => 'required',
                'code'    => 'required',
            ]
        );
        $country = $request->except('_token');
        $save = $this->city->updateCountry($country, $id);
        if ($save['type'] == 'success') {
            Session::flash('success', 'Successfully updated');
            return Redirect::route('countryList');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCountry($id)
    {
        //
        if (!empty($id)) {
            $country = $this->city::find($id);
            if (!empty($country)) {
                return view('admin.countries.edit',['country'=>$country]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->except('_token');

        // dd($data);
        if($request->has('id')){
            DB::table('countries')->update(['selected'=> 0]);
            foreach ($data['id'] as $key => $value) {
                City::find($value)->update(['selected'=> 1]);
            }
            return response()->json(1);
        }else{
            return response()->json(0);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!empty($id)) {
            $this->city::where('id', $id)->delete();
            Session::flash('success', 'Successfully deleted');
            return Redirect::route('countryList');
            return $json;
        }
    }
}
