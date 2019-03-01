@extends('welcome')
@section('frontend_main_content')

		  <div class="col-md-8 single-main" style="    padding-left: 8%;">				 
			  <div class="single-grid">
					<img src="{{asset($frontend_description->image)}}" style="height: 303px;width: 94%;"  alt=""/>						 					 
					<p>{{$frontend_description->long_description}}</p>
			  </div>
			 <ul class="comment-list">
		  		   <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">admin</a></h5>
		  		   <li><img src="images/avatar.png" class="img-responsive" alt="">
		  		   <div class="desc">
		  		   <p>View all posts by: <a href="#" title="Posts by admin" rel="author">admin</a></p>
		  		   </div>
		  		   <div class="clearfix"></div>
		  		   </li>
		  	  </ul>
			  <div class="content-form">
			  	<div>
			  		<h2 style="color:#00aeff;margin-bottom: 5px;">Comments</h2>
			  		@foreach($comments as $comments_data)
			  		<div style="border: 1px solid #ddd; padding-left: 10px; ">
				  		<h4 style="margin-bottom: 5px;">{{$comments_data->name}}</h4>
				  		<span style="float: right;    font-size: 12px;">{{\Carbon\Carbon::parse($comments_data->created_at)->format('d-M-Y')}}
				  		</span>
				  		<p style="font-size: 15px;">{{$comments_data->message}}</p>

				  	</div>	
			  		@endforeach
			  	</div>
					 <h3 style="margin-top: 15px;">Leave a comment</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="margin-left: 10px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif					 
					{{Form::open(['url'=>"/comment"])}}
						{{Form::text('name','',['placeholder'=>'Name'])}}
						{{Form::hidden('post_id',$frontend_description->id,['placeholder'=>'Name'])}}
						{{Form::text('email','',['placeholder'=>'Email'])}}
						{{Form::text('phone','',['placeholder'=>'Phone'])}}
						{{Form::textarea('message','',['placeholder'=>'Messsage'])}}
						
						{{Form::submit('Submit',['class'=>'btn btn-info'])}}

				   {{Form::close()}}
			  </div>
		  </div>
			  

</div>
@stop