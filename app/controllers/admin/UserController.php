<?php
namespace admin;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
class UserController extends BaseAdminController {
  public function index()
  {
    $users = User::paginate(2);
    return View::make('admins/users.index', compact('users'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('admins/users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $input = Input::all();
    $validation = Validator::make($input, User::$rules);

    if ($validation->passes())
    {
      $user->password = Hash::make(Input::get('password'));
      User::create($input);
      return Redirect::route('admins/users.index');
    }
    return Redirect::route('admins/users.create')
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
    $user = User::find($id);
    return View::make('admins/users.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('admins/users.index');
        }
        return View::make('admins/users.edit', compact('user'));
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
    $validation = Validator::make($input, User::$rules);
    if ($validation->passes())
    {
        $user = User::find($id);
        $user->password = Hash::make(Input::get('password'));
        $user->update($input);
        return Redirect::route('admins/users.show', $id);
    }
    return Redirect::route('admins/users.edit', $id)
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
    $user = User::find($id);
    $user->delete();
    return Redirect::route('admins/users.index')
      ->with("message", " deleted");
  }

  public function post_create()
  {

    $validator = Validator::make(Input::all(), User::$rules);
    if ($validator->passes()) {

      $user = new User;
      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));

      $user->save();

      return Redirect::to('login')->with('message', 'Thanks for registering!');
      } else {
          return Redirect::to('signup')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
      }
  }
}
