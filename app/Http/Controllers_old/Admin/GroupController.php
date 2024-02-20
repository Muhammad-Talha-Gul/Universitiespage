<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\UserGroups;
use App\Model\CustomPostType;
use App\Model\GroupModules;
use Auth;
use App\User;

class GroupController extends Controller
{
    public function index() {
    	$data = UserGroups::OrderBy('id','DESC')->get();
    	return view('admin.user-groups',['data'=>$data]);
    }

    public function create() {
    	$types = CustomPostType::where('is_active',1)->OrderBy('sort_order','ASC')->get();
        return view('admin.add_group',['types'=>$types]);
    }

    public function store(Request $request) {
        $group = UserGroups::create(['name'=>$request->name]);
        if($request->has('modules')) {
            foreach ($request->modules as $key => $value) {
                GroupModules::create([
                    'group_id'=>$group['id'],
                    'module'=>$key,
                    '_show'=>(isset($value['_show']))?1:0,
                    '_create'=>(isset($value['_create']))?1:0,
                    '_edit'=>(isset($value['_edit']))?1:0,
                    '_delete'=>(isset($value['_delete']))?1:0,
                    '_import'=>(isset($value['_import']))?1:0,
                    'show_email'=>(isset($value['show_email']))?1:0,
                    'show_phone'=>(isset($value['show_phone']))?1:0,
                ]);
            }
        }
    	return Redirect::route('groups.index');
    }
    
    public function edit($id) {
    	$data = UserGroups::find($id);
        $modules = [];
        if(GroupModules::where('group_id',$id)->count()>0) {
            $modules = GroupModules::where('group_id',$id)->get()->groupBy('module')->toArray();
        }
        $types = CustomPostType::where('is_active',1)->OrderBy('sort_order','ASC')->get();
        return view('admin.edit_group',['data'=>$data,'types'=>$types,'modules'=>$modules]);    	
    }

    public function update(Request $request,$id) {
    	UserGroups::find($id)->update(['name'=>$request->name]);
        GroupModules::where('group_id',$id)->delete();
        if($request->has('modules')) {
            foreach ($request->modules as $key => $value) {
                GroupModules::create([
                    'group_id'=>$id,
                    'module'=>$key,
                    '_show'=>(isset($value['_show']))?1:0,
                    '_create'=>(isset($value['_create']))?1:0,
                    '_edit'=>(isset($value['_edit']))?1:0,
                    '_delete'=>(isset($value['_delete']))?1:0,
                    '_import'=>(isset($value['_import']))?1:0,
                    'show_email'=>(isset($value['show_email']))?1:0,
                    'show_phone'=>(isset($value['show_phone']))?1:0,
                ]);
            }
        }
        return Redirect::route('groups.index');
    }

    public function destroy($id) {
        $user = User::where('group_id', (int)$id)->pluck('id')->toArray();
        foreach($user as $key=>$value){
            $u = User::find($value);
            $u->group_id = null;
            $u->save();
        }
        GroupModules::where('group_id', $id)->delete();
        UserGroups::find($id)->delete();
        return Redirect::route('groups.index');

    }
}