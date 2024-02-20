<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DevDojo\Chatter\Models\Models;
use App\Http\Controllers\Controller;
use Session;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Models::discussion()->with('user')->with('post')->with('postsCount')->with('category')->orderBy(config('chatter.order_by.discussions.order'), config('chatter.order_by.discussions.by'))->get();
        return view('admin.discussion', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Models::category()->get();
        return view('admin.add_discussion', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function topics(){
        $data = Models::category()->get();
        return view('admin.topic',['data'=>$data]);
    }

    public function savetopics(Request $request){
        $request->validate([
            'name' => 'required|unique:chatter_categories',
            'order' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = str_slug($request->name, '-');
        Models::category()->create($data);
        Session::flash('success', 'Successfully Saved');
        return redirect()->back();
    }

    public function edittopics(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:chatter_categories',
            'order' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = str_slug($request->name, '-');
        Models::category()->find($id)->update($data);
        Session::flash('success', 'Successfully Updated');
        return redirect()->back();
    }

    public function deletetopics(Request $request){
        $id = (int)$request->id;
        $dis = Models::discussion()->where('chatter_category_id', $id)->pluck('id')->toArray();
        $post = Models::post()->whereIn('chatter_discussion_id', $dis)->pluck('id')->toArray();
        if($post!==null){
            Models::post()->destroy($post);
        }
        if($dis!==null){
            Models::discussion()->destroy($dis);
        }
        Models::category()->destroy($id);
        Session::flash('success', 'Successfully Deleted');
        return redirect()->back();
    }

    public function posts(){
        $data = Models::post()->orderBy('chatter_discussion_id', 'ASC')->orderBy('created_at', 'ASC')->get();
        // dd($data);
        return view('admin.forum_posts', ['data'=> $data]); 
    }
    public function display(Request $request){
        $post = Models::post()->find($request->id);
        if($post['display']=='1') {
            $post->update(['display'=>0]);
        } else {
            $post->update(['display'=>1]);
        }
        return response()->json("success");
    }
}
