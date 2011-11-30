<?php

/**
 * The Background Model.
 *
 * Does the grunt work for the Background controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Background extends Model {
	static public function background_get($b_background_id=null) {
		$query = DB::select()
			->from('backgrounds');

		if (isset($b_background_id)) {
			$query->where('b_background_id', '=', $b_background_id);
			$result = array_shift($query->execute()->as_array());
		}
		else {
			$result = $query->execute()->as_array();
		}

		return $result;
	}

  static public function background_save() {
		$filename = false;
    $b_background_id = Input::post('b_background_id');
		$b_path = Input::post('b_path');
		if (preg_match('~^http~', $b_path)) {
			$b_path = explode('/', $b_path);
			array_shift($b_path);
			array_shift($b_path);
			array_shift($b_path);

			$b_path = implode('/', $b_path);
		}

		$config = array(
			'path' => DOCROOT.'assets/img/backgrounds',
			'normalize' => true,
			'max_size' => 0,
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'JPG', 'gif', 'png'),
		);

		Upload::process($config);

		if (Upload::is_valid()) {
			Upload::save();
			foreach (Upload::get_files() AS $file) {
				Image::load($file['saved_to'].$file['saved_as'])
						->resize(1680)
						->save($file['saved_to'].$file['filename'].'-1680.jpg');
				Image::load($file['saved_to'].$file['saved_as'])
						->resize(1280)
						->save($file['saved_to'].$file['filename'].'-1280.jpg');
				Image::load($file['saved_to'].$file['saved_as'])
						->resize(1024)
						->save($file['saved_to'].$file['filename'].'-1024.jpg');
				Image::load($file['saved_to'].$file['saved_as'])
						->resize(300)
						->save($file['saved_to'].$file['filename'].'-thumbnail.jpg');

				$filename = $file['filename'];
		
				File::delete($file['saved_to'].$file['saved_as']);
			}
		}

    if (isset($b_background_id) && !empty($b_background_id)) {
			$updateColumns = array(
				'b_path'=>$b_path,
				'b_title'=>Input::post('b_title'),
			);
			if ($filename) { $updateColumns['b_filename'] = $filename; }

			$query = DB::update('backgrounds');
			$query->set($updateColumns);
			$query->where('b_background_id', '=', $b_background_id);

			$rows_affected = $query->execute();
    }
    else {
			$query = DB::insert('backgrounds');
			$query->set(array(
				'b_path'=>$b_path,
				'b_title'=>Input::post('b_title'),
				'b_filename'=>$filename,
			));

			list($b_background_id, $rows_affected) = $query->execute();
    }

		return true;
	}

  static public function background_delete() {
		$query = DB::select();
		$query->from('backgrounds');
		$query->where('b_background_id', '=', Input::post('b_background_id'));
		$result = array_shift($query->execute()->as_array());

		$path = DOCROOT.'assets/img/backgrounds/'.$result['b_filename'];

		try { File::delete($path.'-1024.jpg'); }
		catch (InvalidPathException $e) { }

		try { File::delete($path.'-1280.jpg'); }
		catch (InvalidPathException $e) { }

		try { File::delete($path.'-1680.jpg'); }
		catch (InvalidPathException $e) { }

		try { File::delete($path.'-thumbnail.jpg'); }
		catch (InvalidPathException $e) { }

		$query = DB::delete('backgrounds');
		$query->where('b_background_id', '=', Input::post('b_background_id'));
		$result = $query->execute();

    if ($result) { return true; }
    else { return false; }    
  }
}

/* End of file links.php */
