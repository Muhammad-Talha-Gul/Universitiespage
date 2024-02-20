<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\CustomPostType;
use App\Model\Pages;
use App\Model\PageComponents;
use App\Model\CustomCategory;
use App\Model\PagesLogs;
use App\Model\ComponentsLogs;
// use App\Model\Brands;
use App\Model\Media;
use Session;
use Auth;

class PageController extends Controller
{
    public function dynamicPages()
    {
        $homepage = Pages::where('is_home',1)->first();
        $data = Pages::where('is_home',0)->OrderBy('id','DESC')->get();    
        return view('admin.pages',['data'=>$data, 'homepage'=>$homepage]);
    }

    public function createPage()
    {
        $sliders = Media::where('type','slider')->get();
        return view('admin.create_page',compact('sliders'));
    }

    public function storePage(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $data = $request->except('components');
        $page = Pages::create($data);
        $comps = [];
        if($request->has('components')) {
            foreach($request->components as $value) {
                $comps[] = $value;
            }
        }
        
        if(!empty($comps)) {
            foreach ($comps as $key => $value) {
                foreach($value as $k => $val) {
                    PageComponents::create([
                        'page_id'=>$page['id'],
                        'type'=>$k,
                        'title'=>(isset($val['title']))?$val['title']:null,
                        'meta'=>json_encode($val),
                        'sort_order'=>$key,
                    ]);
                }
            }
        }
        PagesLogs::create([
            'user_id'=>Auth::user()->id,
            'page_id'=>$page['id'],
            'type'=>'create',
        ]);
        return Redirect::route('dynamicPages');
    }

    public function editPage($id, Request $request)
    {
        $type = CustomPostType::where('slug','products')->value('id');
        $data = Pages::find($id);
        if($request->has('log')) {
            $components = ComponentsLogs::where('log_id',$request->log)->where('page_id',$id)->OrderBy('sort_order','ASC')->get();
        } else {
            $components = PageComponents::where('page_id',$id)->OrderBy('sort_order','ASC')->get();
        }
        $categories = CustomCategory::where('custom_post_type',$type)->where('is_active',1)->OrderBy('name','ASC')->get();
        $banners = Media::where('type','banners')->get();
        $sliders = Media::where('type','slider')->get();
        $brands = [];
        return view('admin.edit_page',['data'=>$data,'components'=>$components,'categories'=>$categories,'banners'=>$banners,'sliders'=>$sliders,'brands'=>$brands]);
    }

    public function updatePage($id,Request $request)
    {
        $page = Pages::find($id);
        $log = PagesLogs::create([
            'user_id'=>Auth::user()->id,
            'page_id'=>$id,
            'type'=>'edit',
        ]);
        $old_components = PageComponents::where('page_id',$id)->OrderBy('sort_order','ASC')->get();
        if(!empty($old_components)) {
            foreach ($old_components as $key => $value) {
                ComponentsLogs::create([
                    'log_id'=>$log['id'],
                    'page_id'=>$id,
                    'type'=>$value->type,
                    'title'=>$value->title,
                    'meta'=>$value->meta,
                    'sort_order'=>$value->sort_order,
                ]);
            }
        }
        PageComponents::where('page_id',$id)->delete();
        $data = $request->except('components');
        $comps = [];
        if($request->has('components')) {
            foreach($request->components as $value) {
                $comps[] = $value;
            }
        }
        if(!empty($comps)) {
            foreach ($comps as $key => $value) {
                foreach($value as $k => $val) {
                    PageComponents::create([
                        'page_id'=>$page['id'],
                        'type'=>$k,
                        'title'=>(isset($val['title']))?$val['title']:null,
                        'meta'=>json_encode($val),
                        'sort_order'=>$key,
                    ]);
                }
            }
        }
        $page->update($data);
        //return Redirect::route('dynamicPages');
        return redirect()->back();
    }

    public function logs(Request $request)
    {
        $data = PagesLogs::OrderBy('id','DESC')->paginate(8);
        $users = User::where('user_type','!=','webnet')->where('user_type','!=','customer')->OrderBy('first_name','ASC')->get();
        if($request->has('dates')) {
            $request['start'] = explode('-',$request->dates)[0]; $request['end'] = explode('-',$request->dates)[1];
            $from = new Carbon($request->start);
            $from = $from->format('Y-m-d')." 00:00:00";
            $to = new Carbon($request->end);
            $to = $to->format('Y-m-d')." 23:59:59";
            if($request->user_id==null) {
                $data = PagesLogs::whereBetween('created_at', [$from, $to])->OrderBy('id','DESC')->paginate(8)->appends('user_id', request('user_id'))->appends('dates', request('dates'));                
            } else {                
                $data = PagesLogs::where('user_id',$request->user_id)->whereBetween('created_at', [$from, $to])->OrderBy('id','DESC')->paginate(8)->appends('user_id', request('user_id'))->appends('dates', request('dates'));                
            }
            return view('admin.pages-logs',['data'=>$data,'users'=>$users]);
        }
        return view('admin.pages-logs',['data'=>$data,'users'=>$users]);
    }

    public function restore_log($id)
    {
        $log = PagesLogs::find($id);
        if($log['type']=='edit') {
            return redirect(route('editPage',$log['page_id']).'?log='.$log['id']);
        }
    }

    public function deletePage($id,Request $request)
    {
        PageComponents::where('page_id',$id)->delete();
        Pages::destroy($id);
        return Redirect::route('dynamicPages');
    }

    public function duplicate(Request $request)
    {
        $page = Pages::find($request->id);
        $comps = PageComponents::where('page_id',$request->id)->get();        
        $duplicator = $page->replicate();
        $duplicator->title = $request->title;
        $duplicator->slug = str_slug($request->title);
        $duplicator->save();
        foreach($comps as $value) {
            PageComponents::create([
                'page_id'=>$duplicator['id'],
                'type'=>$value->type,
                'title'=>$value->title,
                'meta'=>$value->meta,
                'sort_order'=>$value->sort_order,
            ]);
        }
        return redirect()->back();
    }

    public function getComponent(Request $request) 
    {
        $rand = rand(1,200);
        $type = CustomPostType::where('slug','products')->value('id');
        if($request->comp=="search") {
            return view('admin.components.search',compact('rand'))->render();
        } elseif($request->comp=="buttons") {
            return view('admin.components.buttons',compact('rand'))->render();
        } elseif($request->comp=="slider") {
            $sliders = Media::where('type','slider')->get();
            return view('admin.components.slider',compact('rand','sliders'))->render();
        } elseif($request->comp=="programs") {
            $sliders = Media::where('type','slider')->get();
            return view('admin.components.programs',compact('rand', 'sliders'))->render();
        } elseif($request->comp=="banner") {
            return view('admin.components.banner',compact('rand'))->render();
        } elseif($request->comp=="editor") {
            return view('admin.components.editor',compact('rand'))->render();
        } elseif($request->comp=="blog") {
            return view('admin.components.blog',compact('rand'))->render();
        } elseif($request->comp=="popular") {
            return view('admin.components.popular',compact('rand'))->render();
        } elseif($request->comp=="consultant") {
            return view('admin.components.consultant',compact('rand'))->render();
        } elseif($request->comp=="spacer") {
            return view('admin.components.spacer',compact('rand'))->render();
        } elseif($request->comp=="institution") {
            return view('admin.components.institution',compact('rand'))->render();
        } elseif($request->comp=="contact") {
            return view('admin.components.contact',compact('rand'))->render();
        } elseif($request->comp=="login") {
            return view('admin.components.login',compact('rand'))->render();
        } elseif($request->comp=="register") {
            return view('admin.components.register',compact('rand'))->render();
        }elseif($request->comp=="forum") {
            return view('admin.components.forum',compact('rand'))->render();
        }elseif($request->comp=="guide") {
            return view('admin.components.guide',compact('rand'))->render();
        }elseif($request->comp=="courses") {
            return view('admin.components.courses',compact('rand'))->render();
        }

    }
    
    public function icons()
    {
        return view('admin.icons');
    }

    public function make_home($id)
    {
        Pages::where('is_home',1)->update(['is_home'=>0]);
        Pages::find($id)->update(['is_home'=>1]);
        return redirect()->back();
    }
}
