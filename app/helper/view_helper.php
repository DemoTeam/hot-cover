<?php
    class ViewHelper
    {
        public static function convertUrl($url=''){
            $sp1 = explode('v=', $url);
            $sp2 = explode('&',$sp1[1]);
            $embed_url = "http://www.youtube.com/embed/" . $sp2[0];
            return $embed_url;
        }
    }
?>
