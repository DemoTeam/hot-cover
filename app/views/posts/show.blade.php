@extends('layouts.visitor')
@section('content')

<head>
    <link href="{{ asset('css/facebook_post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comment_box.css') }}" rel="stylesheet">
</head>
<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8">
                <div><h2>{{ $post->title}}</h2></div>
                    @if($post->category == "photo")
                        {{ ViewHelper::displayPhoto($post->content)  }}
                    @elseif($post->category == "video")
                        <iframe align="center" style="width:90%; height:400px"  src="{{ViewHelper::convertUrl($post->content)}}" allowfullscreen frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
                    @endif
                <!-- like -->
                <div class="text-right" style="margin-top:1em;">
                    <div class="rateWrapper" style=""><span class="like rate rateUp" id="{{$post->id}}" data-item="{{$post->id}}">
                        <span class="rateUpN">{{$post->true_likes()->count()}}</span></span>
                        <span class="disLike rate rateDown" data-item="{{$post->id}}"><span class="rateDownN">{{$post->disLikes()->count()}}</span></span>
                    </div>
                </div>
                <!-- end like -->

                @include('posts.comment_form')
                @include('posts.comment_list')
            </div>
                @include('posts.related_post')
        </div>

    </div>
</div>


<div class="text-center" style="margin-top:10em; text-align:center; position:inherit"><button class="btn btn-info" id="load_more">show more comment </button></div>
<div class="text-center" style="margin-top:2em; text-align:center; display:none;" id="img_loading"><img style="" src="{{ asset('img/loading.gif') }}"></div>

<div class="text-right" id="back-top">
    <a class="btn-default btn back-to-top glyphicon glyphicon-arrow-up" id="backToTopBtn" href="/" title="Top">To top</a>
</div>
 <!-- /.row -->

@include('posts.reservation_information')


<script type="text/javascript">

$(document).ready(function(){
    $('.status').click(function() { $('.arrow').css("left", 0);});
    $('.photos').click(function() { $('.arrow').css("left", 146);});
});

$('#input-rating').on('rating.change', function(event, value, caption) {
    $.ajax({
        type: 'PUT',
            url: '{{ URL::action("PostController@update", [$post->id]) }}',
            dataType:'JSON',
            data: {rate: value},
            success: function(data){
                alert("success");
            }
    });
});

function nl2br (str, is_xhtml) {   
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function comment(content) {
    $user_name = "{{ $current_name }}";
    $avatar = "{{ $avatar }}";
    $time = new Date();
    $timeAgo = jQuery.timeago($time);
    $comment_content = $("#commentContent").val();
    $(".commentList li:first").before(' <li><div class="commenterImage"><img src=' + $avatar + '></div><div class="commentText"><b style="color:#8b9dc3">' + $user_name + ' </b><p class="commentText">' + nl2br($comment_content) + '</p> <span class="date sub-text">' + $timeAgo + '</span> </div><hr></li> ');
    $("#commentContent").val('');
    post_id = {{ $post->id }};
    $.ajax({
        type: 'POST',
            url: '{{ URL::action("CommentController@store") }}',
            dataType:'JSON',
            data: {content: content, post_id: post_id},
            success: function(data){
            }
    });
}

$(function() {
    $max_page = {{ round(count($comments) / $per_page) }};
    post_id = {{ $post->id }};
    $track_list = 1;
    $("#load_more").on("click", function() {
        $(this).hide();
        $("#img_loading").show();
        $.ajax({
            type: 'POST',
                url: '{{ URL::action("CommentController@loadContent") }}',
                dataType:'JSON',
                data: {page: $track_list, post_id: post_id},
                success: function(data){
                    $track_list++;
                    $("#img_loading").hide();
                    if($track_list <= $max_page) {
                        $("#load_more").show();
                    }
                    $(".commentList li:last").after(data); 
                }
        });
    })
});

$("#postComment").addClass("disabled");

$('#commentContent').on("input", function() {
    $comment_content = $(this).val();
    $("#postComment").toggleClass("disabled", $comment_content == '');
});

$(function(){
    $running =false;
    $('#commentContent').on("keypress", function(e) {
        $checkedValue = $('#press_to_enter:checked').val();
        $comment_content = $("#commentContent").val();
        $raw_comment_content = $comment_content.trim();
        if($checkedValue)
        {
            //enter key
            if (e.keyCode == 13 && !e.shiftKey && $raw_comment_content != '') {
                $running = true;
                $("#postComment").addClass('disabled');
                comment($comment_content);
                //submit form
                return false;
            }
        }
    });

    $("#postComment").on("click", function() {
        if($running === false) {
            $running = true;
        }
        $(this).addClass('disabled');
        comment($comment_content);
    });
});
</script>

@stop
