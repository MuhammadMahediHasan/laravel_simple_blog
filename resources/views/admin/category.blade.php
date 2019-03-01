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
                    <h2><i class="fas fa-sticky-note"></i>&nbsp; Category</h2>
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
                   
                      {{Form::open(['url'=>'/category','class'=>'form-horizontal form-label-left'])}}

                      <div class="form-group">
                        {{Form::label('category_name','Category name',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::text('category_name','',['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('description','
                        Description',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}                  
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::text('description','',['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div> 
                      </div>
                      <div class="form-group">
                        {{Form::label('status','
                        Status',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::select('status',['Active'=>'Active','Inactive'=>'Inactive',],'null',['class'=>'form-control col-md-7 col-xs-12'])}}
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

                  <div class="x_content">

                    <h2 style="padding: 10px;">Data Table</h2>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">

                        <thead>
                          <tr class="headings">
                            <th class="">#</th>
                            <th class="">Category Name</th>
                            <th class="">Description</th>
                            <th class="">Status</th>
                            <th class="">Action </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($category_data as $key=>$category_data)
                          <tr class="even pointer">
                            <td>{{$key+1}}</td>
                            <td>{{$category_data->category_name}}</td>
                            <td>{{$category_data->description}}</td>
                            <td>
                              @if($category_data->status=='Active')
                              <span class="text-success">{{$category_data->status}}</span>
                              @else
                              <span class="text-danger">{{$category_data->status}}</span>
                              @endif
                            </td>
                            <td style="display: inline-flex;">
                            {{Form::open(['url'=>"/category/$category_data->id/edit",'method'=>'GET'])}} 
                              <button class="btn btn-primary">Edit</button>
                            {{Form::close()}}

                              {{Form::open(['url'=>"/category/$category_data->id",'method'=>'DELETE'])}}
                                <button class="btn btn-danger">Delete</button>
                              {{Form::close()}}

                              {{Form::open(['url'=>"/category/$category_data->id",'method'=>'GET'])}}
                              @if($category_data->status=='Active')
                                <button class="btn btn-warning">Inactive</button>
                              @else
                                <button class="btn btn-success">Active</button>
                              @endif
                              {{Form::close()}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
              
            
                  </div>            
@stop            