<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SetupModel;
use Session;
use Redirect;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup_data=SetupModel::first();
        return view('admin.setup',['update_data'=>$setup_data]);
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
        $update_data=SetupModel::findOrFail($id);
        $requested_data=$request->all();
        if ($request->hasFile('logo')) 
        {
            $logo_type=$request->file('logo')->getClientOriginalExtension();
            $path="backend_asset/images/setup/";
            $name=time().'.'.$logo_type;
            $full_path=$path.$name;
            $request->file('logo')->move($path,$name);
            $requested_data=array_set($requested_data,'logo',$full_path);
        }
        $update_data->fill($requested_data)->save();
        Session::flash('success','Data Updated Successfully');
        return back();

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
}
