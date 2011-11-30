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
class Controller_Blog extends Controller_Base {
  public function before() {
		parent::before();
  }

  public function after() {
		parent::after();
    $this->_view->contentClass = 'blog';
  }

  public function action_index() {
    if (preg_match('/blog\/page\/?$/', Uri::current())) { Response::redirect('/blog'); }

    $config = array(
        'pagination_url' => 'blog/page',
        'total_items' => count(Model_Blog::blog_get()),
        'per_page' => 10,
        'uri_segment' => 3,
        'template' => array(
            'wrapper_start' => '<center><div class="pagination">',
        'wrapper_end' => '</div></center>',
        'page_start' => ' ',
            'page_end' => ' ',
            'previous_start' => ' ',
            'previous_end' => ' ',
            'previous_mark' => ' ',
            'next_start' => ' ',
            'next_end' => ' ',
            'next_mark' => ' ',
            'active_start' => ' ',
            'active_end' => ' ',
        ),
    );

    Pagination::set_config($config);

    $data['blogs'] = Model_Blog::blog_previews(Model_Blog::blog_get(null, null, Pagination::$offset, Pagination::$per_page));
    $data['pagination'] = Pagination::create_links();

		$this->_view->pageTitle = 'Blog';

    $this->_view->content = View::factory('blogs', $data, false);
  }

	public function action_display($b_path) {
		$data['blog'] = Model_Blog::blog_get(null, $b_path);

		$this->_view->pageTitle = $data['blog']['b_title'];

    $this->_view->content = View::factory('blog', $data, false);
  }

}

/* End of file admin.php */
