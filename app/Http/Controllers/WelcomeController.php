<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * This is Post controller.
 * This handles Post CRUD processing.
 */
class WelcomeController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {

  }

  /**
   * To show create post view
   * 
   * @return View create post
   */
  public function showWelcomeView()
  {
    return view('welcome');
  }
}