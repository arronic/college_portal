<?php 
	class Arronic_lib1 {

		public function perform_fed($success, $successmsg, $failmsg, $display = null){
			if($success){
				$feedback['result'] = $successmsg;
			    $feedback['class'] = 'success';
			}
			else{
				$feedback['result'] = $failmsg;
			    $feedback['class'] = 'error';
			}
			if($display)
				return $feedback;
			else
				echo json_encode($feedback);
		}

		public function _file_upload($path, $f_name ,$types=null, $max_size=null){

			$config['upload_path'] = $path;
			$config['allowed_types'] = ($types!=null ? $types : '*');
			$config['max_size'] = ($max_size!=null ? $max_size : '100000'); // max_size in 100 kb
			$config['file_name'] = $f_name;
			$this->upload->initialize($config);
			if($this->upload->do_upload()){
				return TRUE;
			}
			else{
				// $error = array('error' => $this->upload->display_errors());
				return $this->upload->display_errors();
			}
		}

		public function _image_resize($source, $height, $width, $copy=null, $destination=null){
			
			$configi['image_library']  = 'gd2';
			$configi['source_image']   = $source;
			// $configi['max_size']       = '0';
			$configi['create_thumb']   = FALSE;
			$configi['maintain_ratio'] = FALSE;
			$configi['overwrite'] 	   = TRUE;
			$configi['file_permissions'] = 0644;
			// $configi['max_width']          = 3000;
			// $configi['max_height']         = 3000;
			$configi['width']          = $width;
			$configi['height']         = $height;
			if($copy)
				$configi['new_image']  = $destination;
			$this->image_lib->initialize($configi);
			
			
			if(!$this->image_lib->resize()){
				return $this->image_lib->display_errors();
			}
			else{
				$this->image_lib->clear();
				return TRUE;
			}
		}
		public function uniqName($name = null){
			
			$uniq = time().uniqid(rand());
			if($name != null){
				$ext 	= pathinfo($name, PATHINFO_EXTENSION);
				$f_name = preg_replace('/\s+|\./', '_',$uniq.$name);
				$f_name = $f_name.'.'.$ext; // to remove all dots leaving the extension dot
				return $f_name;
			}
			else{
				return $uniq;
			}
		}
	}
?>
