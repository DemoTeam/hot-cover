<?php

class PostController extends BaseController {
  protected $layout = "layout";

   public function __construct() {
     $this->beforeFilter('csrf', array('on'=>'post'));
     // $this->beforeFilter('auth', array('only'=>array('getDashboard')));
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
    $posts = Post::paginate(3);
    return View::make('posts.index', compact('posts'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('posts.create');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $input = Input::all();
    $validation = Validator::make($input, Post::$rules);

    if ($validation->passes())
    {
      Post::create($input);
      return Redirect::route('posts.index');
    }
    return Redirect::route('posts.create')
        ->withInput()
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
    return View::make('posts.show', compact('post'));
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
    $input = Input::all();
    $validation = Validator::make($input, Post::$rules);
    if ($validation->passes())
    {
        $post = Post::find($id);
        $post->update($input);
        return Redirect::route('posts.show', $id);
    }
    return Redirect::route('posts.edit', $id)
      ->withInput()
      ->withErrors($validation)
      ->with('message', 'There were validation errors.');
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
}
