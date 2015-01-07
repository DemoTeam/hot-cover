<?php

class SessionsController extends \BaseController {
 protected $layout = "layout";
  /**
   * Display a listing of the resource.
   * GET /sessions
   *
   * @return Response
   */
  public function index()
  {
    //
  }
 
  /**
   * Show the form for creating a new resource.
   * GET /sessions/create
   *
   * @return Response
   */
  public function create()
  {
    return View::make('sessions.create');
  }
 
  /**
   * Store a newly created resource in storage.
   * POST /sessions
   *
   * @return Response
   */
  public function store()
  {
    $input = Input::all();
 
    $attempt = Auth::attempt( array('email' => $input['email'], 'password' => $input['password']) );
    
    if($attempt) {
      return Redirect::to('/users');
    } else {
      return Redirect::to('login');
    }
  }
 
  /**
   * Display the specified resource.
   * GET /sessions/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }
 
  /**
   * Show the form for editing the specified resource.
   * GET /sessions/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }
 
  /**
   * Update the specified resource in storage.
   * PUT /sessions/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }
 
  /**
   * Remove the specified resource from storage.
   * DELETE /sessions/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy()
  {
    Auth::logout();
    Session::flush();
    return Redirect::to('login')->with('message', 'Your are now logged out!');;
  }
  public function signup() {
    return View::make('sessions.signup');
  }
}
