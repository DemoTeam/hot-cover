@extends('layouts.visitor')
@section('content')
<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe  class="embed-responsive-item" src="<?= $post->video_url ?>" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
<br />
<div>{{ $post->title}}</div>
<div>{{ $post->content}}</div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Related video</h3>
  @foreach($posts as $p)
    <div class="wowload fadeInRight">
	<iframe  class="embed-responsive-item" src="<?= $p->video_url ?>" width="200px" height="150" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>		
	<div>{{ link_to_route('posts.show', $p->title, array($p->id)) }}</div>
    </div>    
  @endforeach
</div>
</div>  
</div>
</div>
<!-- reservation-information -->

<h4>reservation-information</h4>
<hr>

<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="{{ asset('images/photos/1.jpg') }}" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="{{ asset('images/photos/2.jpg') }}"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="{{ asset('images/photos/3.jpg') }}"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption"><a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="{{ asset('images/photos/4.jpg') }}" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="{{ asset('images/photos/5.jpg') }}"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="{{ asset('images/photos/6.jpg') }}"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption"><a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="{{ asset('images/photos/8.jpg') }}" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="{{ asset('images/photos/9.jpg') }}"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="{{ asset('images/photos/10.jpg') }}"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption"><a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>
@stop
