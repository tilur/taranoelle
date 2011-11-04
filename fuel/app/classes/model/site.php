<?php

/**
 * The Site API
 *
 * @package  app
 */
class Model_Site extends Model {
	static public function get_path_background() {
		$query = DB::query("SELECT b_no_extension
			FROM backgrounds
			WHERE b_path = '".Uri::string()."'");

		if ($background = $query->execute()->as_array()) {
			$filename = $background[0]['b_no_extension'].'-1680.jpg';
		}
		else { $filename = 'default.jpg'; }

		return $filename;
	}

	static public function get_content() {
		$query = DB::query("SELECT *
			FROM content
			WHERE c_path = '".Uri::string()."'");
		
		if ($content = $query->execute()->as_array()) {
			return array_shift($content);
		}
	}

	static public function get_users() {
		$query = "SELECT *
			FROM users
			WHERE u_user_id > 1
			ORDER BY u_fullname";
		$query = DB::query($query);

		if ($users = $query->execute()->as_array()) {
			foreach ($users AS $i => $user) {
				$return[$user['u_user_id']] = $user['u_fullname'].' ('.$user['u_username'].')';
			}
			return $return;
		}
		else { return array(); }
	}

  static public function slug($text) {
    $text = preg_replace('/[~\!\@\#\$\%\^\&\*\(\)\_\+\=\-\\\]\[\'\;\/\.\,\|\}\{\"\:\?\>\<]/', '', $text);
    $text = preg_replace('/ /', '-', $text);
    return $text;
  }
}
