<?php

/**
 * The Site API
 *
 * @package  app
 */
class Model_Site extends Model {
	static public function get_path_background() {
		$query = DB::query("SELECT b_filename
			FROM backgrounds
			WHERE b_path = '".Uri::string()."'");

		if ($background = $query->execute()->as_array()) {
			$filename = $background[0]['b_filename'].'-1680.jpg';
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

  static public function slug($text, $includeDash=false) {
    if (empty($text)) { return ''; }

    $text = trim(preg_replace('/ +/',' ',preg_replace('/[^\-a-zA-Z0-9\s]/','',strtolower($text))));
    $text = preg_replace('/ /', '-', $text);

    $wordsIn = explode('-', $text);
    foreach ($wordsIn AS $word) {
      if (strlen($word) > 3) { $wordsOut[] = $word; }
    }

    $text = implode('-', $wordsOut);

    return strtolower($text);
  }
}
