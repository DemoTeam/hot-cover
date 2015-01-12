<?php
namespace admin;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;

class AdminController extends BaseAdminController {
  protected $layout = "layouts.admin";
  public function index()
  {
    $users = User::paginate(2);
    return View::make('admins/admin.index', compact("users"));
  }
}
