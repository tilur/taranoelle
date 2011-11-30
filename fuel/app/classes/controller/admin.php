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

    if (!Session::get('userid') && Session::get('userid') !== 1) {
      Response::redirect('login');
    }
  }

  /**
   * after() Method
   *
   * We check to see if the input of this controller is an AJAX call before we
   * call the parent::after() method. This is because the parent's after()
   * method is where we do most of the template building. If this is an AJAX
   * call, we don't want to build any template, we generally are outputing 
   * some application specific data, not template items.
   */
  public function after() {
    if (!Input::is_ajax()) {
      $this->_view->contentClass = 'admin';
      parent::after();
    }
  }

  public function action_index() {
		$this->_view->pageTitle = 'Admin Dashboard';

    $this->_view->content = View::factory('admin/dashboard');
  }

//	/*****[ Backgrounds ]*******************************************************/
//	public function background_upload() {
//		$config = array(
//				'path' => DOCROOT.'assets/img/backgrounds',
//				'normalize' => true,
//				'ext_whitelist' => array('img', 'jpg', 'jpeg', 'JPG', 'gif', 'png'),
//		);
//
//		Upload::process($config);
//
//		if (Upload::is_valid())
//		{
//				Upload::save();
//				if (Model_Admin::background_save(Upload::get_files())) {
//					Response::redirect('admin/background/manage');
//				}
//		}
//
//	}
	/*****[ Backgrounds ]***********************************************************/
	public function action_background($action, $c_content_id=null) {
    $this->_view->pageTitle = 'Backgrounds';
 
    if ($action == 'manage') { $this->background_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
			if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/background/manage'); }
      elseif ($action == 'delete' && Input::post('confirmDelete')) {
				if (Model_Background::background_delete()) { die('window.location.href = "/admin/background/manage";'); }
      }
      elseif (Input::method() === 'POST') {
				if (Model_Background::background_save()) { Response::redirect('admin/background/manage'); }
      }
      else { $this->background_form($action, $c_content_id); }
    }
	}

  public function background_manage() {
    $data['backgrounds'] = Model_Background::background_get();
    $this->_view->content = View::factory('admin/background-manage', $data);
  }

  public function background_form($action, $b_background_id=null) {
    if ($action == 'add') { $data['background'] = array('b_background_id'=>'', 'b_path'=>'', 'b_title'=>'', 'b_filename'=>'', 'b_no_extension'=>'');  }
    elseif ($action == 'edit') {
      $data['background'] = Model_Background::background_get($b_background_id); 
    }

    $this->_view->content = View::factory('admin/background-form', $data);
  }




	/*****[ Galleries ]*********************************************************/
  public function action_galleries($action, $g_gallery_id=null) {
    $this->_view->pageTitle = 'Galleries';
 
    if ($action == 'manage') { $this->galleries_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
			if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/galleries/manage'); }
			elseif ($action == 'delete' && Input::post('confirmDelete')) {
				if (Model_Galleries::galleries_delete()) {
					if (Input::post('type') == 'gallery') {
						die('window.location.href = "/admin/galleries/manage";');
					}
					elseif (Input::post('type') == 'image') { 
						$output = '$("#gallery-preview-row-6").hide();';
						$output .= ' dialog.dialog("close");';
						die($output);
					}
				}
			}
			elseif (Input::method() === 'POST') {
				if (Model_Galleries::galleries_save()) { Response::redirect('/admin/galleries/edit/'.Input::post('g_gallery_id')); }
			}
      else { $this->galleries_form($action, $g_gallery_id); }
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

	/*****[ Content ]***********************************************************/
	public function action_content($action='', $c_content_id=null) {
    $this->_view->pageTitle = 'Content';
 
    if ($action == '') { Response::redirect('admin/content/manage'); }
    elseif ($action == 'manage') { $this->content_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
			if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/content/manage'); }
      elseif ($action == 'delete' && Input::post('confirmDelete')) {
				if (Model_Content::content_delete()) { die('window.location.href = "/admin/content/manage";'); }
      }
      elseif (Input::method() === 'POST') {
				if (Model_Content::content_save()) { Response::redirect('admin/content/manage'); }
      }
      else { $this->content_form($action, $c_content_id); }
    }
	}

  public function content_manage() {
    $data['contents'] = Model_Content::content_get();
    $this->_view->content = View::factory('admin/content-manage', $data);
  }

  public function content_form($action, $c_content_id=null) {
    if ($action == 'add') { $data['content'] = array('c_content_id'=>'', 'c_path'=>'', 'c_title'=>'', 'c_body'=>'');  }
    elseif ($action == 'edit') {
      $data['content'] = Model_Content::content_get($c_content_id); 
    }

    $this->_view->content = View::factory('admin/content-form', $data);
  }

	/*****[ Blog ]**************************************************************/
	public function action_blog($action='', $b_blog_id=null) {
    $this->_view->pageTitle = 'Blog';
 
    if ($action == '') { Response::redirect('/admin/blog/manage'); }
    elseif ($action == 'manage') { $this->blog_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
			if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/blog/manage'); }
      elseif ($action == 'delete' && Input::post('confirmDelete')) {
				if (Model_Blog::blog_delete()) { die('window.location.href = "/admin/blog/manage";'); }
      }
      elseif (Input::method() === 'POST') {
				if (Model_Blog::blog_save()) { Response::redirect('/admin/blog/manage'); }
			}
      else { $this->blog_form($action, $b_blog_id); }
    }
	}

  public function blog_manage() {
    $data['blogs'] = Model_Blog::blog_get();
    $this->_view->content = View::factory('admin/blog-manage', $data);
  }

  public function blog_form($action, $b_blog_id=null) {
    if ($action == 'add') { $data['blog'] = array('b_blog_id'=>'', 'b_path'=>'', 'b_title'=>'', 'b_body'=>'');  }
    elseif ($action == 'edit') {
      $data['blog'] = Model_Blog::blog_get($b_blog_id); 
    }

    $this->_view->content = View::factory('admin/blog-form', $data);
  }

  /*****[ Links ]*************************************************************/
  public function action_links($action, $l_link_id=null) {
    $this->_view->pageTitle = 'Links';
 
    if ($action == 'manage') { $this->links_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
      if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/links/manage'); }
      elseif ($action == 'delete' && Input::post('confirmDelete')) {
        if (Model_Links::links_delete()) { die('window.location.href = "/admin/links/manage";'); }
      }
      elseif (Input::method() === 'POST') {
        if (Model_Links::links_save()) { Response::redirect('/admin/links/manage'); }
      }
      else { $this->links_form($action, $l_link_id); }
    }
  }

  public function links_manage() {
    $data['links'] = Model_Links::links_get();
    $this->_view->content = View::factory('admin/links-manage', $data);
  }

  public function links_form($action, $l_link_id=null) {
    if ($action == 'add') { $data['link'] = array('l_link_id'=>'', 'l_category'=>'', 'l_url'=>'');  }
    elseif ($action == 'edit') {
      $data['link'] = Model_Links::links_get($l_link_id); 
    }

    $this->_view->content = View::factory('admin/links-form', $data);
  }

  /*****[ Users ]*************************************************************/
  public function action_users($action, $u_user_id=null) {
    $this->_view->pageTitle = 'Users';
 
    if ($action == 'manage') { $this->users_manage(); }
    elseif (in_array($action, array('add', 'edit', 'delete'))) {
      if ($action == 'delete' && Input::method() != 'POST') { Response::redirect('/admin/users/manage'); }
      elseif ($action == 'delete' && Input::post('confirmDelete')) {
        if (Model_Users::users_delete()) { die('window.location.href = "/admin/users/manage";'); }
      }
      elseif (Input::method() === 'POST') {
        if (Model_Users::users_save()) { Response::redirect('/admin/users/manage'); }
      }
      else { $this->users_form($action, $u_user_id); }
    }
  }

  public function users_manage() {
    $data['users'] = Model_Users::users_get();
    $this->_view->content = View::factory('admin/users-manage', $data);
  }

  public function users_form($action, $u_user_id=null) {
    if ($action == 'add') { $data['user'] = array('u_user_id'=>'', 'u_username'=>'', 'u_fullname'=>'', 'u_password'=>'');  }
    elseif ($action == 'edit') {
      $data['user'] = Model_Users::users_get($u_user_id); 
    }

    $this->_view->content = View::factory('admin/users-form', $data);
  }

  public function action_help() {
    $this->_view->pageTitle = 'Help';
    $this->_view->pageClass = 'help';

    $this->_view->content = View::factory('admin/help');
  }
}

/* End of file admin.php */