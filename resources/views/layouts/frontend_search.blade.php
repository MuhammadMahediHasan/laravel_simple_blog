@extends('welcome')
@section('frontend_main_content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<div class="content">
     <div class="container">
         <div class="content-grids">


<div class="col-md-8 content-main">
                 <div class="content-grid">
                 @foreach($data as $recent_post_value)                  
                     <div class="content-grid-info">
                         <img style="height: 303px;width: 98%;" src="{{asset($recent_post_value->image)}}"" alt=""/>
                         <div class="post-info">
                         <h4><a href="frontend_description/{{$recent_post_value->id}}">{{$recent_post_value->post_title}}</a> 
                            <span style="float: right;">{{\Carbon\Carbon::parse($recent_post_value->created_at)->format('d-M-Y')}}</span>
                         </h4>
                         <p>{{$recent_post_value->short_description}}</p>


                         <a href="frontend_description/{{$recent_post_value->id}}"><span></span>READ MORE&nbsp;</a>


                         <span>&nbsp;<i style="font-size: 23px;" class="far fa-eye"></i>-{{$recent_post_value->counter}}</span>


                         <a href="post_like/{{$recent_post_value->id}}">
                         <p style="display: inline-flex;display: inline-flex; float: right;font-size: 20px;"><i style="    margin-top: 5px;" class="fas fa-thumbs-up"></i>&nbsp; Like</a>&nbsp;-{{$recent_post_value->likes}}</p>
                         
                         </div>
                     </div>
                @endforeach
                 </div>
              </div>
@stop              