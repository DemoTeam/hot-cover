<?php
namespace admin;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;

class AdminController extends \BaseController {
  protected $layout = "layouts.admin";

   public function __construct() {
     $this->beforeFilter('csrf', array('on'=>'post'));
   }
  public function index()
  {
    $users = User::paginate(2);
    return View::make('admins/admin.index', compact("users"));
  }
}
