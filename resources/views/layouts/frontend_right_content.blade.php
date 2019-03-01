<div class="col-md-4 content-right">
                 <div class="recent">
                     <h3>RECENT POSTS</h3>
                     <ul>
                        @foreach($recent_post as $recent_post_data)
                         <li><a href="frontend_description/{{$recent_post_data->id}}">{{$recent_post_data->post_title}}</a></li>
                        @endforeach
                     </ul>
                 </div>
                 <div class="comments">
                     <h3>RECENT COMMENTS</h3>
                     <ul>
                     <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
                     <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
                     <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
                     </ul>
                 </div>
                 <div class="clearfix"></div>
                 <div class="comments">
                     <h3>MOST VIEW POST</h3>
                     <ul>
                        @foreach($most_view as $most_view_data)
                        <a href="frontend_description/{{$most_view_data->id}}">
                        <li>{{$most_view_data->post_title}}&nbsp;....</a></li>
                        @endforeach
                     </ul>
                 </div>
                 <div class="clearfix"></div>
                 <div class="archives">
                     <h3>ARCHIVES</h3>
                     <ul>
                     <li><a href="#">October 2013</a></li>
                     <li><a href="#">September 2013</a></li>
                     <li><a href="#">August 2013</a></li>
                     <li><a href="#">July 2013</a></li>
                     </ul>
                 </div>
                 <div class="categories">
                     <h3>CATEGORIES</h3>
                     <ul>
                        @foreach($category_data as $catagory_value)
                        <a href="/category_data/{{$catagory_value->category_name}}">
                        <li>{{$catagory_value->category_name}}</a></li>
                        @endforeach
                     </ul>
                 </div>
                 <div class="clearfix"></div>
              </div>



                      <div class="clearfix"></div>
          </div>
      </div>
</div>