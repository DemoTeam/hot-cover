<?php
    class ViewHelper
    {
        public static function convertUrl($url=''){
            $sp1 = explode('v=', $url);
            $sp2 = explode('&',$sp1[1]);
            $embed_url = "http://www.youtube.com/embed/" . $sp2[0];
            return $embed_url;
        }

        public static function displayPhoto($urls='') {
            $arr_photo =  explode("\n", $urls);
            foreach($arr_photo as $photo) {
                echo '<img src=' . $photo . ' style="max-width:90%;" /><br/><br />';
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
