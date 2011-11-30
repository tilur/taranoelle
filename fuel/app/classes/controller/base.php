<?php

/**
 * The Base Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Base extends Controller {
  protected $frontPage;


  public function before() {
    $this->_view = View::factory('layout');
  }

  public function after() {
		$user = Session::get('user');
		if (isset($user)) { $data['user'] = $user; }
		else { $data['user'] = false; }
		
		$data['headGalleries'] = Model_Galleries::galleries_get();

		$this->_view->head = View::factory('head', array('frontPage'=>$this->frontPage)); 
    if (empty($this->_view->header)) { $this->_view->header = View::factory('header-inner', $data, false); }

    $this->_view->footer = View::factory('footer');

    if (empty($this->_view->frontPage)) { $this->_view->frontPage = false; }
    if (empty($this->_view->bgImage)) { $this->_view->bgImage = Model_Site::get_path_background(); }
    if (empty($this->_view->pageClass)) { $this->_view->pageClass = ''; }
    if (empty($this->_view->contentClass)) { $this->_view->contentClass = ''; }
    if (empty($this->_view->content)) { $this->_view->content = ''; }
    
    $this->response->body = $this->_view;   
  }
}

/* End of file base.php */
