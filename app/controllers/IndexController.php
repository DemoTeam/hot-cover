<?php

class IndexController extends BaseController {
  protected $layout = "layout";

  public function index()
  {
    return View::make('index');
  }
}
