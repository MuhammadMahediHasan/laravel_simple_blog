<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\SubCategoryModel;
use Session;
use Validator;
use Redirect;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=CategoryModel::all();
        $sub_category=SubCategoryModel::all();
        return view('admin.sub_category',['data'=>$data,'sub_category'=>$sub_category]);
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
       $insert_data=new SubCategoryModel;
       $validation=Validator::make($request->all(),$insert_data->validation_sub_category());
       if ($validation->fails()) 
       {
            return back()->withInput()->withErrors($validation);
       }
       else
       {
           $insert_data->fill($request->all())->save();
           Session::flash('success','Data Insert Successfully');
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
        $data=SubCategoryModel::findOrFail($id);
        if ($data->status=='Active') 
        {
            $data->update(['status'=>'Inactive']);
            Session::flash('success','Status Updated');
        }
        else
        {
            $data->update(['status'=>'Active']);
            Session::flash('success','Status Updated');
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=SubCategoryModel::findOrFail($id);
        $category_data=CategoryModel::all();
        return view('admin.sub_category_edit',['data'=>$data,'category_data'=>$category_data]);
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
        $update_data=SubCategoryModel::findOrFail($id);
        $update_data->fill($request->all())->save();
        Session::flash('success','Data Updated');
        return Redirect::to('/sub_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategoryModel::findOrFail($id)->delete();
        Session::flash('success','Data Deleted Successfully');
        return back();
    }
}
