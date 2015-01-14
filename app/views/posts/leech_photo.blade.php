@extends('layouts.visitor')
@section('content')
<h1>Insert tour photo links and enjoy :)
    <div class="text-right">
        <a class="btn btn-danger glyphicon glyphicon-picture" id="leechButton"> Get them</a>
    </div>
</h1>
 <table class="table">
    <tr>
        <td>
            <div class="">
                {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'photoLinks')) }}
            </div>
        </td>
    </tr>
</table>

<script>
$("#leechButton").on("click", function() {
    $links = $("#photoLinks").val().split("\n");
    $(".appendTr").remove();
    for(i = 0; i < $links.length; i++) {
        $('.table tr:last').after('<tr class="appendTr" style="text-align:center;"><td><img style="max-width:70%;" src=' + $links[i] + '></td></tr>');
    }
});
</script>

@stop
