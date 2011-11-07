<?php

/**
 * The Dashboard Controller.
 *
 * The dashboard contoller shows the user all the galleries that they have
 * access to. This is meant for customers of Tara who need to login to see
 * the photos she's taken.
 * 
 * @package  app
 * @extends  Controller_Base
 */
class Controller_Dashboard extends Controller_Base {
  public function before() {
		parent::before();

    if (!Session::get('userid')) {
      Response::redirect('login');
    }
  }

  public function after() {
    $this->_view->contentClass = 'admin';
    parent::after();
  }

  public function action_index() {
		$this->_view->pageTitle = 'Customer Dashboard';

		$data['galleries'] = Model_Galleries::galleries_get(null, null, null, true);
		$data['grammar1'] = $data['galleries']['gallery_count'] === 1 ? 'is' : 'are';
		$data['grammar2'] = $data['galleries']['gallery_count'] === 1 ? 'y' : 'ies';

    $this->_view->content = View::factory('admin/dashboard-customer', $data);
  }
}

/* End of file dashboard.php */
