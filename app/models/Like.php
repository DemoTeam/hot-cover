<?php
class Like extends Eloquent {
    protected $guarded = array('id');
    protected $fillable = array('like_value', 'post_id', 'user_id');


    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function liked($user_id, $post_id){
      return $this->where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->count()>0;
    }

    public static $rules = array(
        'like_value'=>'required|',
    );
}
