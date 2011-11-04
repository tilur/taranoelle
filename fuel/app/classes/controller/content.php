<?php

/**
 * The Content Controller.
 *
 * The content contoller displays page content from the content table
 * in the backend. Anything in the content table has a c_path value,
 * which is added to the routes config to display through this controller.
 * 
 * @package  app
 * @extends  Controller_Base
 */
class Controller_Content extends Controller_Base {
  public function before() {
		parent::before();
  }

  public function after() {
		parent::after();
    $this->_view->contentClass = 'admin';
  }

  public function action_index() {
		$data['content'] = Model_Site::get_content();

		$this->_view->pageTitle = $data['content']['c_title'];

    $this->_view->content = View::factory('content', $data, false);
  }
}

/* End of file admin.php */
