<?php

/**
 * The Admin Model.
 *
 * Does the grunt work for the Admin controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Admin extends Model {
	static public function background_get($b_background_id=null) {
		$query = "SELECT *
			FROM backgrounds ";
		if ($b_background_id) {
			$query .= "WHERE b_background_id = ".$b_background_id." ";
		}
		$query .= "ORDER BY b_path";
		$query = DB::query($query);

		if ($backgrounds = $query->execute()) {
			$backgrounds = $backgrounds->as_array();

			return $backgrounds;
		}
	}

	static public function background_save($files, $insert=true) {
		$file = array_shift($files);

		$path = preg_match('/^\//', Input::post('b_path')) ? substr(Input::post('b_path'), 1) : Input::post('b_path');

		if ($insert) {
			$query = DB::query("INSERT INTO backgrounds (b_background_id, b_path, b_title, b_filename, b_no_extension)
				VALUES (NULL, '".$path."', '".Input::post('b_title')."', '".$file['saved_as']."', '".$file['filename']."')");
		}
		else {
		}

		if ($result = $query->execute()) {
//			Image::load($file['saved_to'].$file['saved_as'])
//					->resize(1680)
//					->save($file['saved_to'].$file['filename'].'-1680.jpg');
//			Image::load($file['saved_to'].$file['saved_as'])
//					->resize(1280)
//					->save($file['saved_to'].$file['filename'].'-1280.jpg');
//			Image::load($file['saved_to'].$file['saved_as'])
//					->resize(1024)
//					->save($file['saved_to'].$file['filename'].'-1024.jpg');
//			Image::load($file['saved_to'].$file['saved_as'])
//					->resize(300)
//					->save($file['saved_to'].$file['filename'].'-thumbnail.jpg');

			Image::load($file['saved_to'].$file['saved_as'])
					->resize(1680)
					->save($file['saved_to'].$file['filename'].'-1680.jpg')
					->resize(1280)
					->save($file['saved_to'].$file['filename'].'-1280.jpg')
					->resize(300)
					->save($file['saved_to'].$file['filename'].'-thumbnail.jpg');
			
			return true;
		}
		else { return false; }
	}
}

/* End of file admin.php */
