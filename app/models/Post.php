<?php

class Post extends Eloquent {
  protected $guarded = array('id');
  protected $fillable = array('title', 'content', 'video_url');

  public static $rules = array(
    'title' => 'required|min:10',
    'video_url'=>'required|url',
    'content'=>'required|',
  );
}
