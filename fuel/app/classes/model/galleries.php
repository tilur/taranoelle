<?php

/**
 * The Galleries Model.
 *
 * Does the grunt work for the Galleries controller.
 * 
 * @package  app
 * @extends  Model
 */
class Model_Galleries extends Model {
	static public function galleries_get($g_path=null, $g_gallery_id=null, $admin=null, $customer=null) {
		if (is_array($g_path)) { extract($g_path); }

		$query = "SELECT *
		  FROM galleries ";
		if (isset($g_path)) { $query .= "WHERE g_path REGEXP '".$g_path."$' "; }
		elseif (isset($g_gallery_id)) { $query .= "WHERE g_gallery_id = ".$g_gallery_id." "; }
		elseif (isset($customer)) { $query .= "WHERE CONCAT(g_allowed_users, ',') REGEXP '".Session::get('userid').",' "; }
		elseif (!isset($admin)) { $query .= "WHERE g_allowed_users IS NULL "; }
		$query .= "ORDER BY g_category, g_name";

		$query = DB::query($query);
		
		if ($galleries = $query->execute()->as_array()) {
		  if (!isset($g_path) && !isset($g_gallery_id)) {
		    foreach ($galleries AS $i => $gallery) {
		      $return[$gallery['g_category']][] = $gallery;
		    }
				$return['gallery_count'] = count($galleries);
		  }
		  else {
		    $return = $galleries[0];

				$query = DB::select();
				$query->from('galleries_images');
				$query->where('gi_gallery_id', '=', $return['g_gallery_id']);

		    if ($images = $query->execute()->as_array()) {
		      $return['images'] = $images;
		    }
		    else { $return['images'] = array(); }
		  }

		  return $return;
		}
		else {
		  return array();
		}
	}

  static public function galleries_access($gallery) {
    $return = true; 

		if (Session::get('userid') !== '1' && isset($gallery['g_allowed_users'])) {
      $g_allowed_users = explode(',', $gallery['g_allowed_users']);
    
      if (!in_array(Session::get('userid'), $g_allowed_users)) {
				Session::set_flash('errLogin', 'You must log in to view the '.$gallery['g_name'].' gallery'); 
				$return = false;
      }
    }

    return $return;
  }

  static public function galleries_save($insert=true) {
    $path = 'galleries/'.Model_Site::slug(Input::post('g_name'));
    $g_gallery_id = Input::post('g_gallery_id');
		$g_allowed_users = Input::post('g_allowed_users');
		$g_allowed_users = empty($g_allowed_users) ? null : implode(',', $g_allowed_users);

    if (isset($g_gallery_id) && !empty($g_gallery_id)) {
      $rows_affected = DB::update('galleries')
				->set(array(
					'g_path'=>$path,
					'g_category'=>Input::post('g_category'),
					'g_name'=>Input::post('g_name'),
					'g_description'=>Input::post('g_description'),
					'g_allowed_users'=>$g_allowed_users))
				->where('g_gallery_id', '=', $g_gallery_id)
				->execute();
    }
    else {
      list($g_gallery_id, $rows_affected) = DB::insert('galleries')
				->set(array(
					'g_path'=>$path,
					'g_category'=>Input::post('g_category'),
					'g_name'=>Input::post('g_name'),
					'g_description'=>Input::post('g_description'),
					'g_allowed_users'=>$g_allowed_users))
				->execute();
    }

		$config = array(
			'path' => DOCROOT.'assets/img/galleries/'.$g_gallery_id,
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
				Image::load($file['saved_to'].$file['saved_as'])
						->resize(150)
						->save($file['saved_to'].$file['filename'].'-scroller.jpg');

				DB::insert('galleries_images')
					->set(array(
						'gi_gallery_id'=>$g_gallery_id,
						'gi_filename'=>$file['filename'],
						'gi_date_added'=>'NOW()'))
					->execute();

				File::delete($file['saved_to'].$file['saved_as']);
			}
		}

		return true;
	}

	static public function galleries_delete() {
		$return = true;

		if (Input::post('type') == 'gallery') {
			$g_gallery_id = Input::post('g_gallery_id');

			$result = DB::delete('galleries')
				->where('g_gallery_id', '=', $g_gallery_id)
				->execute();

			$result = DB::delete('galleries_images')
				->where('gi_gallery_id', '=', $g_gallery_id)
				->execute();

			try { File::delete_dir(DOCROOT.'assets/img/galleries/'.$g_gallery_id); }
			catch (InvalidPathException $e) { }
		}
		elseif (Input::post('type') == 'image') {
			$gi_gallery_image_id = Input::post('gi_gallery_image_id');

			$query = DB::select('gi_gallery_id', 'gi_filename')
				->from('galleries_images')
				->where('gi_gallery_image_id', '=', $gi_gallery_image_id);
			$image = array_shift($query->execute()->as_array());
			$path = DOCROOT.'assets/img/galleries/'.$image['gi_gallery_id'].'/'.$image['gi_filename'];

			try { File::delete($path.'-1024.jpg'); }
			catch (InvalidPathException $e) { }

			try { File::delete($path.'-1280.jpg'); }
			catch (InvalidPathException $e) { }

			try { File::delete($path.'-1680.jpg'); }
			catch (InvalidPathException $e) { }

			try { File::delete($path.'-scroller.jpg'); }
			catch (InvalidPathException $e) { }

			try { File::delete($path.'-thumbnail.jpg'); }
			catch (InvalidPathException $e) { }

			$result = DB::delete('galleries_images')
				->where('gi_gallery_image_id', '=', $gi_gallery_image_id)
				->execute();
		}

		return true;
	}
}

/* End of file admin.php */
