<?php

/**
 * The Blog Model.
 *
 * Does the grunt work for the Blog controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Blog extends Model {
	static public function blog_get($b_blog_id=null, $b_path=null, $offset=0, $limit=300) {
		$query = DB::select()
			->from('blogs');
		if (isset($b_blog_id)) { $query->where('b_blog_id', '=', $b_blog_id); }
		elseif (isset($b_path)) { $query->where('b_path', '=', 'blog/'.$b_path); }
		$query->limit($limit);
		$query->offset($offset);

		$result = $query->execute();

		if ($result) {
			if (isset($b_blog_id) || isset($b_path)) { $return = array_shift($result->as_array()); }
			else { $return = $result->as_array(); }

		  return $return;
		}
		else {
		  return array();
		}
	}

  static public function blog_save() {
    $b_blog_id = Input::post('b_blog_id');
    $b_path = Input::post('b_path');

    if (empty($b_path)) { $b_path = Model_Site::slug(Input::post('b_title')); }
    else { $b_path = Model_Site::slug($b_path, true); }
    $b_path = 'blog/'.$b_path;

    if (isset($b_blog_id) && !empty($b_blog_id)) {
      $rows_affected = DB::update('blogs')
				->set(array(
					'b_path'=>$b_path,
					'b_title'=>Input::post('b_title'),
					'b_body'=>Input::post('b_body')))
				->where('b_blog_id', '=', $b_blog_id)
				->execute();
    }
    else {
      list($b_blog_id, $rows_affected) = DB::insert('blogs')
				->set(array(
					'b_path'=>$b_path,
					'b_title'=>Input::post('b_title'),
					'b_body'=>Input::post('b_body')))
				->execute();
    }

		return true;
	}

  static public function blog_delete() {
    $result = DB::delete('blogs')
      ->where('b_blog_id', '=', Input::post('b_blog_id'))
      ->execute();

    if ($result) { return true; }
    else { return false; }
  }

  static public function blog_previews($blogs) {
  	foreach ($blogs AS $i => $blog) {
  		$output[$i]['b_title'] = $blog['b_title'];
  		$output[$i]['b_body'] = strip_tags(html_entity_decode($blog['b_body']));

  		if (strlen($output[$i]['b_body']) > 300) {
  			$output[$i]['b_body'] = substr($output[$i]['b_body'], 0, 300).'...';
  			$output[$i]['b_body'] .= '<div class="jr mt-8">'.Html::anchor($blog['b_path'], '...Read More').'</div>';
  		}
  	}

  	return $output;
  }
}

/* End of file admin.php */
