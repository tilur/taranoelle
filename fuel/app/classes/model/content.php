<?php

/**
 * The Content Model.
 *
 * Does the grunt work for the Content controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Content extends Model {
	static public function content_get($c_content_id=null) {
		$query = DB::select()
			->from('content');

		if (isset($c_content_id)) {
			$query->where('c_content_id', '=', $c_content_id);
			$result = array_shift($query->execute()->as_array());
		}
		else {
			$result = $query->execute()->as_array();
		}

		return $result;
	}

  static public function content_save() {
    $c_content_id = Input::post('c_content_id');
    $c_path = Model_Site::slug(Input::post('c_path'));

    if (empty($c_path)) { $c_path = Model_Site::slug(Input::post('c_title')); }
    else { $c_path = Model_Site::slug($c_path, true); }

    if (isset($c_content_id) && !empty($c_content_id)) {
      $rows_affected = DB::update('content')
				->set(array(
					'c_path'=>$c_path,
					'c_title'=>Input::post('c_title'),
					'c_body'=>Input::post('c_body')))
				->where('c_content_id', '=', $c_content_id)
				->execute();
    }
    else {
      list($c_content_id, $rows_affected) = DB::insert('content')
				->set(array(
					'c_path'=>$c_path,
					'c_title'=>Input::post('c_title'),
					'c_body'=>Input::post('c_body')))
				->execute();
    }

		return true;
	}

  static public function content_delete() {
    $result = DB::delete('content')
      ->where('c_content_id', '=', Input::post('c_content_id'))
      ->execute();

    if ($result) { return true; }
    else { return false; }    
  }
}

/* End of file admin.php */
