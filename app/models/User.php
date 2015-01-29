<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
  protected $guarded = array('id');
  protected $fillable = array('name', 'email', 'password', 'avatar_url', 'status', 'type');

  use UserTrait, RemindableTrait;

  public static $rules = array(
      'name' => 'required|min:5',
      'email'=>'required|email',
      'password'=>'required|alpha_num|between:6,12|confirmed',
      'password_confirmation'=>'required|alpha_num|between:6,12'
  );
  public static $update_rules = array(
      'name' => 'required|min:5',
      'email'=>'required|email',
      'avatar_url'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg',
      'password'=>'alpha_num|between:6,12|confirmed',
      'password_confirmation'=>'alpha_num|between:6,12'
  );

  public static function authRules($field)
  {
      $validations = [
          'username' => 'required|min:3|max:50',
          'email' => 'required|email|max:50',
      ];
      return [
          $field => $validations[$field],
          'password' => 'required|max:50',
      ];
  }

  public static function validate($input, $field)
  {
      $user = [
          $field => $input[$field],
          'password' => $input['password'],
      ];
      return Auth::validate($user);
  }

  protected $hidden = array('password', 'remember_token');

  public function posts()
  {
      return $this->hasMany('Post', 'user_id');
  }

  public function comments()
  {
      return $this->hasMany('Comment', 'user_id');
  }

  public function questions()
  {
      return $this->hasMany('Question', 'user_id');
  }

  public function answers()
  {
      return $this->hasMany('Answer', 'user_id');
  }

  public function likes()
  {
      return $this->hasMany('Like', 'user_id');
  }

  public function countLiked()
  {
      return $this->likes()->where('like_value', '=', '1');
  }

  public function countDisliked()
  {
      return $this->likes()->where('like_value', '=', '-1');
  }

  public function getRememberToken()
  {
      return $this->remember_token;
  }

  public function setRememberToken($value)
  {
      $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
      return 'remember_token';
  }
}
