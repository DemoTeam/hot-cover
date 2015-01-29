<?php

class PostController extends BaseController {
   public function __construct() {
     $this->beforeFilter('csrf', array('on'=>'post'));
     $this->beforeFilter('auth', array('only'=>array('create', 'edit', 'store', 'show')));
     $this->beforeFilter('correctUser:Post',array('only'=>array('edit')));
     $this->current_user = Auth::user();
   }
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    // public function showWelcome()
    // {
    //     return View::make('hello');
    // }
  public function index()
  {
    $type = Input::get('type');
    if($type == "photo") {
        $posts = Post::where('category', 'photo')->orderBy('id', 'desc')->Paginate(10);
    } elseif($type == "video") {
        $posts = Post::where('category', 'video')->orderBy('id', 'desc')->Paginate(2);
    } else {
        $posts = Post::orderBy('id', 'desc')->Paginate(10);
    }
    //$posts = DB::table('posts')->get();
    View::share('current_user', $this->current_user);
    return View::make('posts.index', compact('posts', 'type'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $category_session =  Session::get('category');
    $category = isset($category_session) ? (string)$category_session : "false";
    return View::make('posts.create', compact('category'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $input = Input::all();
    if($input['category'] == 'video') {
        $validation = Validator::make($input, Post::$rules_video, Post::$messages);
    } else {
        $validation = Validator::make($input, Post::$rules);
    }

    if ($validation->passes())
    {
      $post = Post::create($input);
      $count_view = [];
      $count_view["post_id"] = $post["id"];
      $count_view["total_view"] = 0;
      CountView::create($count_view);

      return Redirect::route('posts.index');
    }
    return Redirect::route('posts.create')
        ->withInput()
        ->with('category', $input['category'])
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $post = Post::find($id);

    $count_view = CountView::where('post_id', $id)->first();
    $count_view->increment('total_view');

    $per_page = Config::get('constants.SHOW_POST_PER_PAGE');
    $avatar = $current_name = "";
    if(isset($this->current_user)) {
        $avatar = asset($this->current_user->avatar_url);
        $current_name = $this->current_user->name;
    }
    $posts = Post::all()->take(3);
    $total_record = count(explode("\n", $post->content));
    $total_groups = $total_record;
    if (Request::ajax()) {
      if ((int)Input::get('group_no') < $total_record) {
        $data = ViewHelper::displayOnePhotobyIndex($post->content, (int)Input::get('group_no'));
        return json_encode($data);
      }
    }else{
      $comments = $post->comments()->orderBy('id', 'DESC')->get();
      $show_comments = $comments->take($per_page);
      View::share('current_user', $this->current_user);
      return View::make('posts.show', compact(array('post',
       'posts', 'comments', 'current_user', 'show_comments',
        'per_page', 'avatar', 'current_name','total_groups')));
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
    {
        $post = Post::find($id);
        if (is_null($post))
        {
            return Redirect::route('posts.index');
        }
        return View::make('posts.edit', compact('post'));
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $post = Post::find($id);
    if (Request::ajax()) {
      $post->rate = Input::get('rate');
      $post->update();
      return json_encode("ok");
    }else{
      $input = Input::all();
      $validation = Validator::make($input, Post::$rules);
      if ($validation->passes())
      {
          $post->update($input);
          return Redirect::route('posts.show', $id);
      }
      return Redirect::route('posts.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
      }
    }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    return Redirect::route('posts.index')
      ->with("message", " deleted");
  }

  public function leech_photo()
  {
    View::share('current_user', $this->current_user);
    return View::make('posts.leech_photo');
  }
}
