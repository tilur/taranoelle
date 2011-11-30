<?php

/**
 * The Links Model.
 *
 * Does the grunt work for the Links controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Links extends Model {
	static public function links_get($l_link_id=null) {
		$query = DB::select()
			->from('links');

		if (isset($l_link_id)) {
			$query->where('l_link_id', '=', $l_link_id);
			$result = array_shift($query->execute()->as_array());
		}
		else {
			$result = $query->execute()->as_array();

			foreach ($result AS $i => $link) {
				$return[$link['l_category']][] = $link;
			}

			$result = $return;
		}

		return $result;
	}

  static public function links_save() {
    $l_link_id = Input::post('l_link_id');
		$l_url = preg_replace('/^http\:\/\//', '', Input::post('l_url'));

    if (isset($l_link_id) && !empty($l_link_id)) {
			$query = DB::update('links');
			$query->set(array(
				'l_category'=>Input::post('l_category'),
				'l_url'=>$l_url
			));
			$query->where('l_link_id', '=', $l_link_id);

			$rows_affected = $query->execute();
    }
    else {
			$query = DB::insert('links');
			$query->set(array(
				'l_category'=>Input::post('l_category'),
				'l_url'=>$l_url
			));

			list($l_link_id, $rows_affected) = $query->execute();
    }

		return true;
	}

  static public function links_delete() {
    $result = DB::delete('links')
      ->where('l_link_id', '=', Input::post('l_link_id'))
      ->execute();

    if ($result) { return true; }
    else { return false; }    
  }
}

/* End of file links.php */
