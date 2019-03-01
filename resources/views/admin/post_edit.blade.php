@extends('backend')
@section('main_content')


  <div class="right_col" role="main">
@if(session('success'))
  <div class="alert alert-success" role="alert" style="text-align: center; margin-top: 56px;">
    <strong>Success!</strong>{{session('success')}}
  </div>
@endif  

@if ($errors->any())
    <div class="alert alert-danger" style="text-align: center; margin-top: 56px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif        
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fas fa-sticky-note"></i>&nbsp; Post</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                      {{Form::open(['url'=>"/post/$post_data->id",'class'=>'form-horizontal form-label-left','method'=>'put','files'=>true])}}

                      <div class="form-group">
                        {{Form::label('category_name','Category name',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="category_name" class="form-control col-md-7 col-xs-12">
                            <option>{{$post_data->category_name}}</option>
                            @foreach($category_data as $category_data)
                            <option>{{$category_data->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('sub_category_name','
                        Sub-Category Name',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}                  
                        <div class="col-md-6 col-sm-6 col-xs-12">  
                          <select name="sub_category_name" class="form-control col-md-7 col-xs-12">
                            <option>{{$post_data->sub_category_name}}</option>
                            @foreach($sub_category_data as $sub_category_data)
                            <option>{{$sub_category_data->sub_category_name}}</option>
                            @endforeach
                          </select>
                        </div> 
                      </div>
                      <div class="form-group">
                        {{Form::label('post_title','
                        Post Title',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::text('post_title',$post_data->post_title,['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('short_description','
                        Short_description',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::text('short_description',$post_data->short_description,['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('long_description','
                        Long Description',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::text('long_description',$post_data->long_description,['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('image','
                        Image',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::file('image',['class'=>'form-control col-md-7 col-xs-12','id'=>'profile-img'])}}
                          <img src="{{asset($post_data->image)}}" id="profile-img-tag" width="200px" />
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      {{Form::close()}}
                    
                  </div>
                </div>
              </div>
            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript">
	function readURL(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
	$('#profile-img-tag').attr('src', e.target.result);
	}
	reader.readAsDataURL(input.files[0]);
	}
	}
	$("#profile-img").change(function(){
	readURL(this);
	});
</script>

@stop