<?php

/**
 * The Galleries Controller.
 *
 * The galleries contoller displays photo galleries to the user
 *
 * @extends  Controller_Base
 */
class Controller_Galleries extends Controller_Base {
  public function before() {
		parent::before();
  }

  public function after() {
		parent::after();
  }

  public function action_index() {
    $data['galleries'] = Model_Galleries::galleries_get();

    $this->_view->contentClass = 'content';
    $this->_view->pageTitle = 'Galleries';

    $this->_view->content = View::factory('galleries/index', $data);
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
