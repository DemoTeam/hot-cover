<script type="text/javascript">
    var rateObject = {
        like : function(obj) {
            obj.on('click', function(e) {
                var thisObj = $(this);
                var thisType = thisObj.hasClass('rateUp') ? 'up' : 'down';
                var thisItem = thisObj.attr('data-item');
                var thisValue = thisObj.children('span').text();
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::action("LikeController@like") }}',
                    dataType:'JSON',
                    data: {post_id: thisItem, like_value: 1},
                    success: function(data){
                      if(isNaN(data))
                      {
                        alert(data);
                      }else{
                        $("#"+thisItem+" .rateUpN").html(data);
                      }
                    }
                });
                e.preventDefault();
            });
        },
        disLike : function(obj) {
            obj.on('click', function(e) {
                var thisObj = $(this);
                var thisType = thisObj.hasClass('rateUp') ? 'up' : 'down';
                var thisItem = thisObj.attr('data-item');
                var thisValue = thisObj.children('span').text();
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::action("LikeController@disLike") }}',
                    dataType:'JSON',
                    data: {post_id: thisItem, like_value: -1},
                    success: function(data){
                      if(isNaN(data))
                      {
                        alert(data);
                      }else{
                        $("#"+thisItem+" .rateDownN").html(data);
                      }
                    }
                });
                e.preventDefault();
            });
        }
    };
    $(function() {
        jQuery.ajaxSetup({ cache:false });
        rateObject.like($('.like'));
        rateObject.disLike($('.disLike'));
    });
</script>