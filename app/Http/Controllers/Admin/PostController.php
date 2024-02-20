<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\CustomPostType;
use App\Model\CustomCategory;
// use App\Model\Brands;
use App\Model\Posts;
use App\Model\PostLogs;
use App\Model\Orders;
use App\Model\Transfers;
use App\Model\TransferItems;
use App\Model\IssuedItems;
use App\Model\OrderDetail;
use App\Model\PostComponents;
use App\Model\Media;
use Carbon\Carbon;
use Excel;
use Auth;
use Session;

class PostController extends Controller
{
    public function index($type, Request $request) {
        $type = CustomPostType::where('slug',$type)->first();
        if($request->has('q')) {
            $data = Posts::where('post_type',$type['id'])->where('title','like','%'.$request->q.'%')->OrderBy('id','DESC')->paginate(10)->appends('q', request('q'));
        } else {
            $data = Posts::where('post_type',$type['id'])->OrderBy('id','DESC')->paginate(10);
        }
        return view('admin.posts',['type'=>$type,'data'=>$data]);
    }

    public function create($type) {
        $type = CustomPostType::where('slug',$type)->first();
        $categories = CustomCategory::whereNull('parent_id')->where('is_active',1)->where('custom_post_type',$type['id'])->get();
        $brands = [];
        return view('admin.add_post',['type'=>$type,'categories'=>$categories,'brands'=>$brands]);
    }

    public function store(Request $request) {
        $type = CustomPostType::find($request->custom_post_type);
        $data = $request->except('gallery','attributes','related');
        if($request->has('attributes')) {
            $data['attributes'] = json_encode($request->get('attributes'));
        }
        if($request->has('gallery')) {
            $data['gallery'] = json_encode($request->gallery);
        }
        if($request->has('related')) {
            $data['related'] = json_encode($request->gallery);
        }
        $data['slug'] = str_slug($request->title);
        $data['post_type'] = $request->custom_post_type;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        $data['best_seller'] = ($request->has('best_seller'))?1:0;
        $data['top_rated'] = ($request->has('top_rated'))?1:0;
        $post = Posts::create($data);
        PostLogs::create([
            'type'=>'created',
            'post_type'=>$type['id'],
            'post_id'=>$post['id'],
            'post_title'=>$post['title'],
            'user_id'=>Auth::user()->id,
        ]);

        return Redirect::route('posts_lists',$type['slug']);
    }

    public function edit($type,$id)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $categories = CustomCategory::whereNull('parent_id')->where('is_active',1)->where('custom_post_type',$type['id'])->get();
        $data = Posts::find($id);
        $components = PostComponents::where('post_id',$id)->OrderBy('sort_order','ASC')->get();
        $attributes = [];
        $gallery = [];
        $related = [];
        if(!empty($data['attributes'])) {
            $attributes = json_decode($data['attributes'],true);
        }
        if(!empty($data['gallery'])) {
            $gallery = json_decode($data['gallery'],true);
        }
        if(!empty($data['related'])) {
            $related = json_decode($data['related'],true);
        }
        $brands = [];
        return view('admin.edit_post',['type'=>$type,'data'=>$data,'attributes'=>$attributes,'gallery'=>$gallery,'categories'=>$categories,'brands'=>$brands,'related'=>$related,'components'=>$components]);
    }

    public function update($type,$id,Request $request)
    {
        $data = $request->except('attributes','gallery');
        if($request->has('attributes')) {
            $data['attributes'] = json_encode($request->get('attributes'));
        } else {$data['attributes']=null;}
        if($request->has('gallery')) {
            $data['gallery'] = json_encode($request->gallery);
        } else {$data['gallery']=null;}
        if($request->has('related')) {
            $data['related'] = json_encode($request->related);
        } else {$data['related']=null;}
        $data['slug'] = str_slug($request->title);
        $data['post_type'] = $request->custom_post_type;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        $data['best_seller'] = ($request->has('best_seller'))?1:0;
        $data['top_rated'] = ($request->has('top_rated'))?1:0;
        Posts::find($id)->update($data);
        $comps = [];
        if($request->has('components')) {
            foreach($request->components as $value) {
                $comps[] = $value;
            }
        }
        if(!empty($comps)) {
            foreach ($comps as $key => $value) {
                foreach($value as $k => $val) {
                    PostComponents::create([
                        'post_id'=>$id,
                        'type'=>$k,
                        'title'=>(isset($val['title']))?$val['title']:null,
                        'meta'=>json_encode($val),
                        'sort_order'=>$key,
                    ]);
                }
            }
        }
        PostLogs::create([
            'type'=>'updated',
            'post_type'=>$request->custom_post_type,
            'post_id'=>$id,
            'post_title'=>$request->title,
            'user_id'=>Auth::user()->id,
        ]);
        return Redirect::route('posts_lists',$type);
    }

    public function destroy($id,Request $request)
    {
        //Conditions here
        $type = CustomPostType::where('slug',$request->type)->first();
        $post = Posts::find($id);
        PostLogs::create([
            'type'=>'deleted',
            'post_type'=>$type['id'],
            'post_id'=>$id,
            'post_title'=>$post['title'],
            'user_id'=>Auth::user()->id,
        ]);
        $post->delete();
        return Redirect::route('posts_lists',$request->type);
    }

    public function bulkDelete(Request $request)
    {
        //Conditions here
        Posts::destroy($request->ids);
        return redirect()->back();
    }

    public function duplicate(Request $request)
    {
        $post = Posts::find($request->id);
        $duplicator = $post->replicate();
        $duplicator->title = $request->title;
        $duplicator->slug = str_slug($request->title);
        if(!empty($post['sku'])) { $duplicator->sku = "copy-".$post['sku']; }
        $duplicator->save();
        return redirect()->back();
    }

    public function mark_featured(Request $request)
    {
        $post = Posts::find($request->id);
        if($post['is_featured']=='1') {
            $post->update(['is_featured'=>0]);
        } else {
            $post->update(['is_featured'=>1]);
        }
        return response()->json("success");
    }

    public function downloadSample($type)
    {
        $postType = CustomPostType::where('slug',$type)->first();
        $basic = ['title'];
        if($postType['has_featured_image']==1) { array_push($basic, 'image'); }
        if($postType['is_category_enable']==1) { array_push($basic, 'category_id'); }
        if($postType['has_brands']==1) { array_push($basic, 'brand_id'); }
        if($postType['has_long_desc']==1) { array_push($basic, 'description'); }
        if($postType['has_desc']==1) { array_push($basic, 'short_description'); }
        if($postType['show_sku']==1) { array_push($basic, 'sku'); }
        if($postType['show_price']==1) { array_push($basic, 'price'); }
        if($postType['show_quantity']==1) { array_push($basic, 'quantity'); }
        array_push($basic, 'unit'); array_push($basic, 'weight');
        if($postType['has_image_gallery']==1) { array_push($basic, 'gallery'); }
        $attrs = $postType->customAttribute->pluck('attribute_slug')->toArray();
        $data = array_merge($basic,$attrs);
        if($postType['has_post_seo']==1) { $data = array_merge($data, ['meta_title', 'meta_description', 'meta_keywords', 'link_canonical']); }
        return Excel::create('sample_'.$postType['slug'], function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('csv');
    }

    public function importPosts(Request $request)
    {
        $postType = CustomPostType::find($request->type);
        $sku_codes = Posts::where('post_type',$request->type)->pluck('sku')->toArray();
        $duplicates = [];
        if($request->hasFile('file')) {
            $attrs = $postType->customAttribute->pluck('attribute_slug')->toArray();
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $temp = [];
                    foreach ($attrs as $k => $val) {
                        if(isset($value->$val)) {
                            $temp[$val] = $value->$val;
                        }
                    }
                    $value['attributes'] = json_encode($temp);
                    $value['post_type'] = $request->type;
                    $value['slug'] = str_slug($value->title);
                    if($value->has('gallery') && !empty($value->gallery)) {
                        $gallery = [];
                        foreach (explode(",", $value->gallery) as $index => $image) {
                            $gallery['sort_order'][] = $index;
                            $gallery['image'][] = $image;
                        }
                        $value['gallery'] = json_encode($gallery);
                    } else $value['gallery'] = '';
                    $value['is_active'] = 1;
                    if($postType['has_author']) {
                        $value['user_id'] = Auth::user()->id;
                    }
                    /*if(in_array($value->sku, $sku_codes)) {
                        /*$duplicates[] = $value->title; */
                      //  Posts::where('sku',$value->sku)->first()->update($value->toArray());
                    /*} else {*/
                        Posts::create($value->toArray());
                    /*}*/
                }
            }
        }
        if(empty($duplicates)) { return response()->json('inserted'); }
        else { return $duplicates; }
    }

    public function inventory($type)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $data = Posts::where('post_type',$type['id'])->OrderBy('id','DESC')->get();
        return view('admin.inventory',['data'=>$data,'type'=>$type]);
    }

    public function updateQty(Request $request)
    {
        $post= Posts::find($request->id);
        if($request->type=="add") {
            $post->quantity = (int)$post['quantity']+(int)$request->qty;
        } else {
            $post->quantity = $request->qty;
        }
        $post->save();
        return $post['quantity'];
    }

    public function issued($type)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $transfers = Transfers::where('status','completed')->where('issued',0)->pluck('id')->toArray();
        $data = TransferItems::whereIn('transfer_id',$transfers)->whereNull('issued_qty')->get();
        return view('admin.issued-notes',['data'=>$data,'type'=>$type]);
    }

    public function issueQty(Request $request)
    {
        $transfer = Transfers::find($request->transfer_id);
        $post = Posts::find($request->post_id);
        $item = TransferItems::where('transfer_id',$request->transfer_id)->where('post_id',$request->post_id)->first();
        $item->update(['issued_qty'=>$item['recieved_qty']]);
        $post->update(['quantity'=>(int)$post['quantity']+(int)$item['recieved_qty']]);
        IssuedItems::create([
            'post_id'=>$request->post_id,
            'qty'=>$item['recieved_qty'],
            'unit_amount'=>$item['price'],
            'total_amount'=>$item['price']*$item['recieved_qty'],
        ]);
        $items = TransferItems::where('transfer_id',$request->transfer_id)->get();
        if($items->sum('recieved_qty') == $items->sum('issued_qty')) {
            $transfer->update(['issued'=>1]);
        }
        return redirect()->back();
    }

    public function post_logs($type, Request $request)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $data = PostLogs::whereDate('created_at',Carbon::today())->where('post_type',$type['id'])->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d/M/Y');
            });
        $items = Posts::where('post_type',$type['id'])->where('is_active',1)->get();
        if($request->ajax()){
            $request['start'] = explode('-',$request->dates)[0]; $request['end'] = explode('-',$request->dates)[1];
            $from = new Carbon($request->start);
            $from = $from->format('Y-m-d')." 00:00:00";
            $to = new Carbon($request->end);
            $to = $to->format('Y-m-d')." 23:59:59";
            if(!empty($request->product_id)) {
                $data = PostLogs::where('post_id',$request->product_id)->whereBetween('created_at', [$from, $to])->where('post_type',$type['id'])->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('d/M/Y');
                });                
            } else {
                $data = PostLogs::whereBetween('created_at', [$from, $to])->where('post_type',$type['id'])->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('d/M/Y');
                });                
            }
            return view('ajax.post-logs',['type'=>$type,'data'=>$data])->render();    
        }
        return view('admin.post-logs',['type'=>$type,'data'=>$data,'items'=>$items]);
    }

    public function get_posts($type,Request $request)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $already = [];
        if($request->has('id')) {
            $post = Posts::find($request->id);
            if(!empty($post['related'])) { $already = json_decode($post['related'],true); }
        }
        $posts = Posts::where('post_type',$type['id'])->OrderBy('id','DESC')->get();
        return view('ajax.related-posts',compact(['posts','already']))->render();
    }

    public function reports($type, Request $request)
    {
        $type = CustomPostType::where('slug',$type)->first();
        $items = Posts::where('post_type',$type['id'])->where('is_active',1)->get();
        if($request->ajax()) {
            $request['start'] = explode('-',$request->dates)[0]; $request['end'] = explode('-',$request->dates)[1];
            $from = new Carbon($request->start);
            $from = $from->format('Y-m-d')." 00:00:00";
            $to = new Carbon($request->end);
            $to = $to->format('Y-m-d')." 23:59:59";
            $issued = IssuedItems::whereBetween('created_at',[$from, $to])->get();
            $sales = OrderDetail::whereBetween('created_at',[$from, $to])->get();
            $report = [];
            if(!empty($request->product_id)){
                $issued = $issued->where('post_id',$request->product_id);
            }
            foreach($issued as $key => $value) {
                $sale = $sales->where('product_id',$value->post_id);
                $sell_amount = $sale->sum('price'); $sell_qty = $sale->sum('qty');;
                $report[] = [
                    'post_id'=>$value->post_id,
                    'title'=>getProduct($value->post_id)['title'],
                    'buy_qty'=>$value->qty,
                    'buy_amount'=>$value->total_amount,
                    'sell_qty'=>$sell_qty,
                    'sell_amount'=>$sell_amount,
                    'calculated'=>getProduct($value->post_id)['price']*$sell_qty-$value->unit_amount*$sell_qty
                ];
            }
            return view('ajax.report-table',['report'=>$report])->render();
        }
        return view('admin.post-reports',['type'=>$type,'items'=>$items]);
    }

    public function export(Request $request)
    {
        $request['start'] = explode('-',$request->dates)[0]; $request['end'] = explode('-',$request->dates)[1];
        $from = new Carbon($request->start);
        $from = $from->format('Y-m-d')." 00:00:00";
        $to = new Carbon($request->end);
        $to = $to->format('Y-m-d')." 23:59:59";
        $posts = Posts::where('post_type',$request->post_type)->whereBetween('created_at', [$from, $to])->OrderBy('id','DESC')->get();
        $data = [];
        foreach ($posts as $key => $value) {
            $data[] = [
                'title'=>$value->title,
                'image'=>$value->image,
                'category_id'=>$value->category_id,
                'brand_id'=>$value->brand_id,
                'description'=>$value->description,
                'short_description'=>$value->short_description,
                'sku'=>$value->sku,
                'price'=>$value->price,
                'quantity'=>$value->quantity,
                'unit'=>$value->unit,
                'weight'=>$value->weight,
                'gallery'=>'',
                'meta_title'=>$value->meta_title,
                'meta_description'=>$value->meta_description,
                'meta_keywords'=>$value->meta_keywords,
                'link_canonical'=>$value->link_canonical,
            ];
        }
        return Excel::create('webnet-items', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($request->type);
    }

    public function get_component(Request $request) {
        $rand = rand(1,200);
        $type = CustomPostType::where('slug','products')->value('id');
        if($request->comp=="ads") {
            $banners = Media::where('type','banners')->get();
            return view('admin.components.ads',compact('rand','banners'))->render();
        } elseif($request->comp=="icons") {
            return view('admin.components.icons',compact('rand'))->render();
        } elseif($request->comp=="editor") {
            return view('admin.components.editor',compact('rand'))->render();
        } elseif($request->comp=="banners") {
            return view('admin.components.banners',compact('rand'))->render();
        }
    }
}
