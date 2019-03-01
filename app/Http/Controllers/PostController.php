<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use App\CategoryModel;
use App\SubCategoryModel;
use Validator;
use Session;
use Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $post_data=PostModel::all();
        $category_data=CategoryModel::all();
        $sub_category_data=SubCategoryModel::all();
        return view('admin.post',['post_data'=>$post_data,'category_data'=>$category_data,'sub_category_data'=>$sub_category_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $insert_data=new PostModel;
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$insert_data->post_validation());
        if ($validation->fails()) 
        {
           return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('image'))
            {
                $image_type=$request->file('image')->getClientOriginalExtension();
                $path="backend_asset/images/Post/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('image')->move($path,$name);
                $requested_data=array_set($requested_data,'image',$full_path);


            }
            $insert_data->fill($requested_data)->save();
            Session::flash('success','Data Inserted');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_data=PostModel::all();
        $sub_category_data=PostModel::all();
        $post_data=PostModel::findOrFail($id);
        return view('admin.post_edit',['post_data'=>$post_data,'category_data'=>$category_data,'sub_category_data'=>$sub_category_data]);
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

        $update_data=PostModel::findOrFail($id);
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->post_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if ($request->hasFile('image')) 
            {
                $image_type=$request->file('image')->getClientOriginalExtension();
                $path="backend_asset/images/Post/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('image')->move($path,$name);
                $requested_data=array_set($requested_data,'image',$full_path);
            }
            $update_data->fill($requested_data)->save();
            Session::flash('success','Data Updated Successfully');
            return Redirect::to('/post');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostModel::findOrFail($id)->delete();
        Session::flash('success','Data Deleted Successfully');
        return back();
    }
}
