<?php

class Post extends Eloquent {


    protected $guarded = array('id');
    protected $fillable = array('title', 'content', 'description', 'rate',
        'user_id', 'status', 'type', 'category');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany('Comment', 'post_id');
    }

    public static $messages = array(
        'youtube_url' => 'Wrong youtube Url !',
    );

    public static $rules_video = array(
        'title' => 'required|min:1',
        'content'=>'required|youtube_url',
        'rate'=>'min:0|max:5',
    );

    public static $rules = array(
        'title' => 'required|min:1',
        'content'=>'required',
        'rate'=>'min:0|max:5',
    );

    public function likes()
    {
        return $this->hasMany('Like', 'post_id');
    }

    public function true_likes(){
        return $this->likes()->where('like_value', '=', '1');
    }
    public function disLikes(){
        return $this->likes()->where('like_value', '=', '-1');
    }
    public static function newPosts()
    {
        return Post::where('status', '=', 'New');
    }
}
