<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\Suppliers;
use Session;

class SupplierController extends Controller
{
    public function index()
    {
    	$data = Suppliers::OrderBy('id','DESC')->get();
    	return view('admin.suppliers',['data'=>$data]);
    }

    public function create()
    {
    	return view('admin.add_supplier');
    }

    public function store(Request $request) 
    {
    	Suppliers::create($request->all());
    	return Redirect::route('suppliers.index');
    }

    public function edit($id)
    {
    	$data = Suppliers::find($id);
    	return view('admin.edit_supplier',['data'=>$data]);
    }

    public function update($id,Request $request)
    {
    	$data = Suppliers::find($id);
    	$data->update($request->all());
    	return Redirect::route('suppliers.index');
    }

    public function destroy($id,Request $request)
    {
    	Suppliers::destroy($id);
    	return Redirect::route('suppliers.index');
    }

    public function delete_all(Request $request) {
        $count = count($request->ids);
        Suppliers::destroy($request->ids);
        Session::flash('success',$count." item(s) deleted");
        return redirect()->back();
    }
}
