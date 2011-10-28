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

  public function before() {
    $this->_view = View::factory('layout');
 
    $this->_view->head = View::factory('head');
    $this->_view->header = View::factory('header');   
  }

  public function after() {
    $this->_view->footer = View::factory('footer');

    if (empty($this->_view->pageClass)) { $this->_view->pageClass = ''; }
    if (empty($this->_view->content)) { $this->_view->content = ''; }
    
    $this->response->body = $this->_view;   
  }
}

/* End of file welcome.php */
