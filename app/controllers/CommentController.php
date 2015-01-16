<?php

class CommentController extends BaseController {
    public function __construct() {
        //$this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = Input::get('post_id');
        $comment->content = Input::get('content');
        $validation = Validator::make($input, Comment::$rules);
            $comment->save();
            return json_encode($comment->content);

    }

}
