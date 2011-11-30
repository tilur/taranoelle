<?php

/**
 * The Users Model.
 *
 * Does the grunt work for the Users controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Users extends Model {
	static public function Users_get($u_user_id=null) {
		$query = DB::select()
			->from('users');

		if (isset($u_user_id)) {
			$query->where('u_user_id', '=', $u_user_id);
			$result = array_shift($query->execute()->as_array());
		}
		else {
			$result = $query->execute()->as_array();
		}

		return $result;
	}

  static public function users_save() {
    $u_user_id = Input::post('u_user_id');

    if (isset($u_user_id) && !empty($u_user_id)) {
			$query = DB::update('users');
			$query->set(array(
				'u_username'=>Input::post('u_username'),
				'u_fullname'=>Input::post('u_fullname'),
				'u_password'=>Input::post('u_password'),
			));
			$query->where('u_user_id', '=', $u_user_id);

			$rows_affected = $query->execute();
    }
    else {
			$query = DB::insert('users');
			$query->set(array(
				'u_username'=>Input::post('u_username'),
				'u_fullname'=>Input::post('u_fullname'),
				'u_password'=>Input::post('u_password'),
			));

			list($u_user_id, $rows_affected) = $query->execute();
    }

		return true;
	}

  static public function users_delete() {
    $result = DB::delete('users')
      ->where('u_user_id', '=', Input::post('u_user_id'))
      ->execute();

    if ($result) { return true; }
    else { return false; }    
  }
}

/* End of file links.php */
