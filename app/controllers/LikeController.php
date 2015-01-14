<?php

class LikeController extends BaseController {

  public function like()
  {
    $like = new Like();
    $like->user_id = Auth::user()->id;
    $like->post_id = Input::get('post_id');
    $post = Post::find($like->post_id);
    $like->like_value = Input::get('like_value');
    if($like->liked($like->user_id, $like->post_id)){
      return json_encode("You already vote!");
    }else{
        $like->save();
        return json_encode($post->likes()->count());
    }
  }

  public function disLike()
  {
    $like = new Like();
    $like->user_id = Auth::user()->id;
    $like->post_id = Input::get('post_id');
    $post = Post::find($like->post_id);
    $like->like_value = Input::get('like_value');
    if($like->liked($like->user_id, $like->post_id)){
      return json_encode("You already vote!");
    }else{
        $like->save();
        return json_encode($post-disLikes()->count());
    }
  }
}
