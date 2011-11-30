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

  public function after() {
    parent::after();
  }

  public function action_index() {
    $dah = Input::post('username');

    $data['errLogin'] = Session::get_flash('errLogin', false);

    if (Input::post('username', false)) { $this->login(); }
    else {
      $this->_view->contentClass = 'login';
      $this->_view->header = View::factory('header-front');
      $this->_view->content = View::factory('login', $data);
    }
  }

  public function login() {
    $query = DB::query("SELECT *
      FROM users
      WHERE u_username = '".Input::post('username')."'
      AND u_password LIKE BINARY '".Input::post('password')."'");

    try {
      $user = $query->execute();
    }
    catch (Database_Exception $e) {
      echo '<pre>';
      print_r($e);
    }

		if ($user) {
			$user = array_shift($user->as_array());
			Session::set('user', $user);
			Session::set('userid', $user['u_user_id']);
			if ($user['u_user_id'] == '1') {
				Response::redirect('admin');
			}
			else {
				Response::redirect('dashboard');
			}
		}
		else {
			Session::set_falsh('errLogin', 'Your Username or Password is incorrect, please try again');
			Response::redirect('/login');
		}
  }

	public function action_logout() {
		Session::destroy();
		Response::redirect();
	}
}

/* End of file admin.php */
