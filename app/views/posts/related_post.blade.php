<div class="col-sm-5 col-md-4">
<h3>Related video</h3>
@if(false)
  @foreach($posts as $p)
    <div class="wowload fadeInRight">
    <iframe  class="embed-responsive-item" src="{{ViewHelper::convertUrl($post->content)}}" width="200px" height="150" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>		
    <div>{{ link_to_route('posts.show', $p->title, array($p->id)) }}</div>
    </div>    
  @endforeach
@endif

</div>
