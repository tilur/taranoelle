<?php

/**
 * The Login Controller.
 *
 * The login controller allows a user to log into the site to perform protected
 * activities.
 * 
 * @package  app
 * @extends  Controller_Base
 */
class Controller_Login extends Controller_Base {
  public function before() {
    parent::before();
  }



  public function action_index() {
    $dah = Input::post('username');

    $data['errLogin'] = Session::get_flash('errLogin', false);

    if (Input::post('username', false)) { $this->login(); }
    else {
      $this->_view->contentClass = 'front';
      $this->_view->header = View::factory('header-front');
      $this->_view->content = View::factory('login', $data);
    }
  }

  public function login() {
    $query = DB::query("SELECT *
      FROM users
      WHERE u_username = '".Input::post('username')."'
      AND u_password = '".Input::post('password')."'");

    try {
      $user = $query->execute();
    }
    catch (Database_Exception $e) {
      echo '<pre>';
      print_r($e);
    }

    $user = array_shift($user->as_array());
    Session::set('user', $user);
    Session::set('userid', $user['u_user_id']);
    Response::redirect('admin');
  }

  public function after() {
    parent::after();
  }
}

/* End of file admin.php */
