<?php
class ViewHelper
{
    public static function convertUrl($url=''){
        $id = '';
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $id = $match[1];
        }
        $embed_url = "http://www.youtube.com/embed/" . $id;
        return $embed_url;
    }

    public static function displayPhoto($urls='') {
        $arr_photo =  explode("\n", $urls);
        foreach($arr_photo as $photo) {
            echo '<img src=' . $photo . ' style="max-width:90%;" /><br/><br />';
        }
    }

    public static function displayPhotobyImgNumber($urls='', $img_num) {
        $arr_photo =  explode("\n", $urls);
        $n = count($arr_photo) > $img_num ? $img_num : count($arr_photo); 
        for ($i=0; $i < $n; $i++) { 
            echo '<img src=' . $arr_photo[$i] . ' style="max-width:90%;" /><br/><br />';
        }
    }

    public static function displayOnePhotobyIndex($urls='', $i){
        $arr_photo =  explode("\n", $urls);
        echo '<img src=' . $arr_photo[$i] . ' style="max-width:90%;" /><br/><br />';
    }

    public static function displayOnePhoto($urls='', $post_id) {
        $arr_photo =  explode("\n", $urls);
        echo '<a href="posts/' . $post_id . '"><img src=' . $arr_photo[0] . ' style="max-width:90%;" /></a><br/><br />';
        if(count($arr_photo) > 1) {
            echo '<div class="col-md-9 text-center">
                <a href="posts/' . $post_id . '" id="singlebutton" name="singlebutton" class="btn btn-default">View all ' . count($arr_photo)  . ' photos</a>
                </div>
                ' ;
        }
    }

    public static function displayJustOnePhoto($urls='', $post_id) {
        $arr_photo =  explode("\n", $urls);
        echo '<a href="posts/' . $post_id . '"><img src=' . $arr_photo[0] . ' style="max-width:90%;" /></a><br/><br />';
    }

    public static function time_elapsed_string($ptime) {
        $time = strtotime($ptime->toDateTimeString());
        $etime = time() - $time;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '');
            }
        }
    }
    public static function displaySmallPhoto($urls='') {
        $arr_photo =  explode("\n", $urls);
        foreach($arr_photo as $key=>$photo) {
            echo '<img src=' . $photo . ' style="max-width:20%; heigh:50px" /> ';
            if ((($key +1) % 4) == 0) {echo "<br>";}
        }
    }
}
?>
