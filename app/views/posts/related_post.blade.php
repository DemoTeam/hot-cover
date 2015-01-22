<div class="col-sm-5 col-md-4">
<!-- <h3>Related posts</h3> -->
<div>
<div class="qr_container text-right">
    <h3 class="">qr code for this page</h3>
    <div id="qr_code"></div>
</div>

</div>
@if(false)
  @foreach($posts as $p)
    @if($post->category == "photo")
        {{ ViewHelper::displayJustOnePhoto($post->content, $post->id)  }}
    @elseif($post->category == "video")
        <iframe align="center" style="width:90%; height:350px"  src="{{ViewHelper::convertUrl($post->content)}}"  
      frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
    @endif    
  @endforeach
@endif
</div>
<style type="text/css">
    .qr_container {
        position: fixed;
    }
</style>