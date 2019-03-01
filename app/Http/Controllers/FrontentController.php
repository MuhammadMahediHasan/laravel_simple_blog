<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SetupModel;
use App\CategoryModel;
use App\PostModel;
use View;
use App\CommentsModel;
class FrontentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $setup_data=SetupModel::first();
        $category_data=CategoryModel::where('status','Active')->get();
        $recent_post=PostModel::orderBy('id','DESC')->limit(4)->get();
        $most_view=PostModel::orderBy('counter','DESC')->limit(4)->get();
        View::share('setup_data',$setup_data);
        View::share('category_data',$category_data);
        View::share('recent_post',$recent_post);
        View::share('most_view',$most_view);
    }
    public function index()
    {
        return view('layouts.frontend_main_content');
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
        $data=PostModel::where('category_name', 'like','%'.$request->search.'%')
                        ->orWhere('post_title', 'like', '%' .$request->search. '%')
                        ->get();
                        
        return view('layouts.frontend_search',['data'=>$data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function frontend_description($id)
    {
        $frontend_description=PostModel::findOrFail($id);
        $comments=CommentsModel::where('post_id',$id)->get();


        $frontend_description_count=$frontend_description->counter+1;
        $frontend_description->update(['counter'=>$frontend_description_count]);
      
        return view('layouts.frontend_description',['frontend_description'=>$frontend_description,'comments'=>$comments]);
    }


    public function category_data($id)
    {
        $data=PostModel::where('category_name',$id)->get();


        return view('layouts.frontend_category',['data'=>$data]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post_likes($id)
    {
        $post_likes=PostModel::findOrFail($id);
        $post_likes_count=$post_likes->likes+1;
        $post_likes->update(['likes'=>$post_likes_count]);
        return back();
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
