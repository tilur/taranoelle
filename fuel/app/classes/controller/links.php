<?php

/**
 * The Links Controller.
 *
 * The links contoller displays links to the user
 *
 * @extends  Controller_Base
 */
class Controller_Links extends Controller_Base {
  public function before() {
		parent::before();
  }

  public function after() {
		parent::after();
  }

  public function action_index() {
    $data['links'] = Model_Links::links_get();

    $this->_view->contentClass = 'content';
    $this->_view->pageTitle = 'Links';

    $this->_view->content = View::factory('links/index', $data);
  }

  public function action_display($gallery, $load_image=null) {
		$this->_view->contentClass = 'gallery';

    $data['gallery'] = Model_Galleries::galleries_get($gallery);
		$data['load_image'] = $load_image;

    if (!Model_Galleries::galleries_access($data['gallery'])) {
      Response::redirect('login');
    }
    else {
      $this->_view->content = View::factory('galleries/gallery', $data);
    }
  }
}

/* End of file galleries.php */
