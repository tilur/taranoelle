<?php

/**
 * The Admin Controller.
 *
 * The admin contoller allows the user to do site functions, like adding content,
 * managing links, posting blogs, etc...
 * 
 * @package  app
 * @extends  Controller_Base
 */
class Controller_Admin extends Controller_Base {
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
		$this->_view->pageTitle = 'Admin Dashboard';

    $this->_view->content = View::factory('admin/dashboard');
  }

	/*****[ Backgrounds ]*******************************************************/
	public function action_background() {
		$this->_view->pageTitle = 'Backgrounds';

		if (Uri::segment(3) == 'manage') { $this->background_manage(); }
		elseif (in_array(Uri::segment(3), array('add', 'edit'))) {
			if (Input::method() === 'POST') { $this->background_upload(); }
			else { $this->background_form(); }
		}
	}

	public function background_manage() {
		$data['backgrounds'] = Model_Admin::background_get();
		$this->_view->content = View::factory('admin/background-manage', $data);
	}

	public function background_form() {
		if (Uri::segment(3) == 'add') { $data['background'] = array('b_title'=>'', 'b_path'=>'', 'b_filename'=>''); }
		elseif (Uri::segment(3) == 'edit') { $data['background'] = array_shift(Model_Admin::background_get(Uri::segment(4))); }

		$this->_view->content = View::factory('admin/background-form', $data);
	}

	public function background_upload() {
		$config = array(
				'path' => DOCROOT.'assets/img/backgrounds',
				'normalize' => true,
				'ext_whitelist' => array('img', 'jpg', 'jpeg', 'JPG', 'gif', 'png'),
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
				Upload::save();
				if (Model_Admin::background_save(Upload::get_files())) {
					Response::redirect('admin/background/manage');
				}
		}

	}
  public function action_galleries($action, $g_gallery_id=null) {
    $this->_view->pageTitle = 'Galleries';
 
    if ($action == 'manage') { $this->galleries_manage(); }
    elseif (in_array($action, array('add', 'edit'))) {
      if (Input::method() === 'POST') { $this->galleries_save(); }
      else { $this->galleries_form($action, $g_gallery_id); }
    }
  }

	public function galleries_save() {
		if (Model_Galleries::galleries_save()) {
			Response::redirect('admin/galleries/manage');
		}
	}

  public function galleries_manage() {
    $data['galleries'] = Model_Galleries::galleries_get(null, null, true);
    $this->_view->content = View::factory('admin/galleries-manage', $data);
  }

  public function galleries_form($action, $g_gallery_id=null) {
		$data['users'] = Model_Site::get_users();

    if ($action == 'add') { $data['gallery'] = array('g_gallery_id'=>'', 'g_category'=>'', 'g_name'=>'', 'g_description'=>'', 'g_allowed_users'=>'', 'images'=>array());  }
    elseif ($action == 'edit') {
      $data['gallery'] = Model_Galleries::galleries_get(null, $g_gallery_id); 
    }

    $this->_view->content = View::factory('admin/galleries-form', $data);
  }
}

/* End of file admin.php */
