<?php

class Post extends Eloquent {
    protected $guarded = array('id');
    protected $fillable = array('title', 'content', 'video_url');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static $rules = array(
        'title' => 'required|min:10',
        'content'=>'required|url',
    );
}
