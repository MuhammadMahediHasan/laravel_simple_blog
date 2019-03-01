<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use Session;
use Validator;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_data=CategoryModel::all();
        // echo "<pre>";
        // print_r($category_data);
        return view('admin.category',['category_data'=>$category_data]);
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
        $category_data=new CategoryModel;
        $validation=Validator::make($request->all(),$category_data->validation_category());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
        $category_data->fill($request->all())->save();
        Session::flash('success','Category Data Inserted');
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
        $data=CategoryModel::findOrFail($id);
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
        $data=CategoryModel::findOrFail($id);
        return view('admin.category_edit',['data'=>$data]);
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
        $update_data=CategoryModel::findOrFail($id);
        $validation=Validator::make($request->all(),$update_data->validation_category());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $update_data->fill($request->all())->save();
            Session::flash('success','Data Updated');
            return Redirect::to('/category');
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
        CategoryModel::findOrFail($id)->delete();
        Session::flash('success','Data Deleted Successfully');
        return back();
    }
}
