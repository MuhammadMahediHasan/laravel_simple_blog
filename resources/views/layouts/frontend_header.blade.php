<div class="header">  
     <div class="container">
          <div class="logo">
              <a href="/"><img src="{{asset($setup_data->logo)}}" style="    width: 123px;
    height: 75px;
    margin-top: 26px;" title="" /></a>
          </div>
             <!---start-top-nav---->
             <div class="top-menu">
                 <div class="search">
                     
                    {{Form::open(['url'=>"/search"])}}
                     <input type="text" name="search" placeholder="Search">
                     <input type="submit" name="submit" value=""/>
                    {{Form::close()}}
                 </div>
                  <span class="menu"> </span> 
                   <ul style="margin-left: -33%;">
                    @foreach($category_data as $category_data_value)
                            <li class="active">
                                <a href="/category_data/{{$category_data_value->category_name}}">{{$category_data_value->category_name}}</a>
                            </li>
                              
                    @endforeach    
                 </ul>
             </div>
             <div class="clearfix"></div>
                    <script>
                    $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                    });
                    </script>
                <!---//End-top-nav---->                 
     </div>
</div>
