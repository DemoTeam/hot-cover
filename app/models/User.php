<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
  protected $guarded = array('id');
  protected $fillable = array('name', 'email', 'password', 'avatar_url');

  public function posts()
  {
      return $this->hasMany('Post', 'user_id');
  }

  public function questions()
  {
      return $this->hasMany('Question', 'user_id');
  }

  public function answers()
  {
      return $this->hasMany('Answer', 'user_id');
  }

  public static $rules = array(
      'name' => 'required|min:5',
      'email'=>'required|email',
      'avatar_url'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
      'password'=>'required|alpha_num|between:6,12|confirmed',
      'password_confirmation'=>'required|alpha_num|between:6,12'
  );
  use UserTrait, RemindableTrait;

  protected $hidden = array('password', 'remember_token');

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
