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
		$c_body = str_replace("\n", "<br>", Input::post('c_body'));

    if (isset($c_content_id) && !empty($c_content_id)) {
      $rows_affected = DB::update('content')
				->set(array(
					'c_path'=>Input::post('c_path'),
					'c_title'=>Input::post('c_title'),
					'c_body'=>$c_body))
				->where('c_content_id', '=', $c_content_id)
				->execute();
    }
    else {
      list($g_gallery_id, $rows_affected) = DB::insert('galleries')
				->set(array(
					'g_path'=>$path,
					'g_category'=>Input::post('g_category'),
					'g_name'=>Input::post('g_name'),
					'g_description'=>Input::post('g_description'),
					'g_allowed_users'=>implode(',', Input::post('g_allowed_users'))))
				->execute();
    }

		return true;
	}
}

/* End of file admin.php */
