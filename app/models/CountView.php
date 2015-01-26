<?php

class CountView extends Eloquent {


    protected $guarded = array('id');
    protected $fillable = array('post_id', 'count');

    public function post()
    {
        return $this->belongsTo('Post');
    }
}
