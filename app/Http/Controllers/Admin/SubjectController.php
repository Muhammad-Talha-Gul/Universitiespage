<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Model\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{


    public function index() {
        $data = Subject::OrderBy('name')->get();
        return view('admin.subjects',['data'=>$data]);
    }

    public function create() {
        // return view('admin.add_subject');
    }

    public function store(Request $request) {
        $data = $request->all();
        Subject::create($data);
        return redirect()->back();
    }
    
    public function edit($id) {
        // $data = Subject::find($id);
        // return view('admin.edit_subject',['data'=>$data]); 
    }

    public function update(Request $request,$id) {
        $data = $request->all();
        Subject::find($id)->update($data);
        return Redirect::route('subject.index');
    }

    public function destroy($id) {
        $type = Subject::find($id);
        $type->delete();
        return Redirect::route('subject.index');
    }
}
