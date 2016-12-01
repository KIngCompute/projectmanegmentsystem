<?php 
// Developed By Kalikund Infotech Pvt. Ltd. 
class MY_Upload extends CI_Upload
{
	public function do_upload_ki($field)
	{
		//echo "<pre>"; print_r($field); //die;
	// Is $field set? If not, no reason to continue.
		

		// Is the upload path valid?
		if ( ! $this->validate_upload_path())
		{
			// errors will already be set by validate_upload_path() so just return FALSE
			return FALSE;
		}

		// Was the file able to be uploaded? If not, determine the reason why.
		if ( ! is_uploaded_file($field['tmp_name']))
		{
			$error = ( ! isset($field['error'])) ? 4 : $field['error'];

			switch($error)
			{
				case 1:	// UPLOAD_ERR_INI_SIZE
					$this->set_error('upload_file_exceeds_limit');
					break;
				case 2: // UPLOAD_ERR_FORM_SIZE
					$this->set_error('upload_file_exceeds_form_limit');
					break;
				case 3: // UPLOAD_ERR_PARTIAL
					$this->set_error('upload_file_partial');
					break;
				case 4: // UPLOAD_ERR_NO_FILE
					$this->set_error('upload_no_file_selected');
					break;
				case 6: // UPLOAD_ERR_NO_TMP_DIR
					$this->set_error('upload_no_temp_directory');
					break;
				case 7: // UPLOAD_ERR_CANT_WRITE
					$this->set_error('upload_unable_to_write_file');
					break;
				case 8: // UPLOAD_ERR_EXTENSION
					$this->set_error('upload_stopped_by_extension');
					break;
				default :   $this->set_error('upload_no_file_selected');
					break;
			}

			return FALSE;
		}


		// Set the uploaded data as class variables
		$this->file_temp = $field['tmp_name'];
		$this->file_size = $field['size'];
		$this->_file_mime_type($field);
		$this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $this->file_type);
		$this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
		$this->file_name = $this->_prep_filename($field['name']);
		$this->file_ext	 = $this->get_extension($this->file_name);
		$this->client_name = $this->file_name;

		// Is the file type allowed to be uploaded?
		if ( ! $this->is_allowed_filetype())
		{
			$this->set_error('upload_invalid_filetype');
			return FALSE;
		}

		// if we're overriding, let's now make sure the new name and type is allowed
		if ($this->_file_name_override != '')
		{
			$this->file_name = $this->_prep_filename($this->_file_name_override);

			// If no extension was provided in the file_name config item, use the uploaded one
			if (strpos($this->_file_name_override, '.') === FALSE)
			{
				$this->file_name .= $this->file_ext;
			}

			// An extension was provided, lets have it!
			else
			{
				$this->file_ext	 = $this->get_extension($this->_file_name_override);
			}

			if ( ! $this->is_allowed_filetype(TRUE))
			{
				$this->set_error('upload_invalid_filetype');
				return FALSE;
			}
		}

		// Convert the file size to kilobytes
		if ($this->file_size > 0)
		{
			$this->file_size = round($this->file_size/1024, 2);
		}

		// Is the file size within the allowed maximum?
		if ( ! $this->is_allowed_filesize())
		{
			$this->set_error('upload_invalid_filesize');
			return FALSE;
		}

		// Are the image dimensions within the allowed size?
		// Note: This can fail if the server has an open_basdir restriction.
		if ( ! $this->is_allowed_dimensions())
		{
			$this->set_error('upload_invalid_dimensions');
			return FALSE;
		}

		// Sanitize the file name for security
		$this->file_name = $this->clean_file_name($this->file_name);

		// Truncate the file name if it's too long
		if ($this->max_filename > 0)
		{
			$this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
		}

		// Remove white spaces in the name
		if ($this->remove_spaces == TRUE)
		{
			$this->file_name = preg_replace("/\s+/", "_", $this->file_name);
		}

		/*
		 * Validate the file name
		 * This function appends an number onto the end of
		 * the file if one with the same name already exists.
		 * If it returns false there was a problem.
		 */
		$this->orig_name = $this->file_name;

		if ($this->overwrite == FALSE)
		{
			$this->file_name = $this->set_filename($this->upload_path, $this->file_name);

			if ($this->file_name === FALSE)
			{
				return FALSE;
			}
		}

		/*
		 * Run the file through the XSS hacking filter
		 * This helps prevent malicious code from being
		 * embedded within a file.  Scripts can easily
		 * be disguised as images or other file types.
		 */
		if ($this->xss_clean)
		{
			if ($this->do_xss_clean() === FALSE)
			{
				$this->set_error('upload_unable_to_write_file');
				return FALSE;
			}
		}

		/*
		 * Move the file to the final destination
		 * To deal with different server configurations
		 * we'll attempt to use copy() first.  If that fails
		 * we'll use move_uploaded_file().  One of the two should
		 * reliably work in most environments
		 */
		if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
		{
			if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
			{
				$this->set_error('upload_destination_error');
				return FALSE;
			}
		}

		/*
		 * Set the finalized image dimensions
		 * This sets the image width/height (assuming the
		 * file was an image).  We use this information
		 * in the "data" function.
		 */
		$this->set_image_properties($this->upload_path.$this->file_name);

		return TRUE;
	}


	// --------------------------------------------------------------------

	/**
	 * Finalized Data Array
	 *
	 * Returns an associative array containing all of the information
	 * related to the upload, allowing the developer easy access in one array.
	 *
	 * @return	array
	 */
	
	public function resize($file, $photos_dir,$thumbs_dir, $square_size=305, $quality=100) {
        //check if thumb exists
		
		
        if (!file_exists($thumbs_dir."/".$file)) {
                //get image info
                list($width, $height, $type, $attr) = getimagesize($photos_dir."/".$file);
               	$arr=getimagesize($photos_dir."/".$file);
			   	//echo $arr['mime'];die;//$arr['mime'] == 'image/gif'
				
					//set dimensions
					if($width> $height) {
							$width_t=$square_size;
							//respect the ratio
							$height_t=round($height/$width*$square_size);
							//set the offset
							$off_y=ceil(($width_t-$height_t)/2);
							$off_x=0;
					} elseif($height> $width) {
							$height_t=$square_size;
							$width_t=round($width/$height*$square_size);
							$off_x=ceil(($height_t-$width_t)/2);
							$off_y=0;
					}
					else {
							$width_t=$height_t=$square_size;
							$off_x=$off_y=0;
					}
					
					
				if(($arr['mime'] == 'image/jpeg' ))
				{			   
					$thumb=imagecreatefromjpeg($photos_dir."/".$file);
					$thumb_p = imagecreatetruecolor($square_size, $square_size);
					//default background is black
					$bg = imagecolorallocate ( $thumb_p, 255, 255, 255 );
					imagefill ( $thumb_p, 0, 0, $bg );
					imagecopyresampled($thumb_p, $thumb, $off_x, $off_y, 0, 0, $width_t, $height_t, $width, $height);
					imagejpeg($thumb_p,$thumbs_dir."/".$file,$quality);
				}
				else if(($arr['mime'] == 'image/gif'))
				{			   
					$thumb=imagecreatefromgif($photos_dir."/".$file);
					$thumb_p = imagecreatetruecolor($square_size, $square_size);
					//default background is black
					$bg = imagecolorallocate ( $thumb_p, 255, 255, 255 );
					imagefill ( $thumb_p, 0, 0, $bg );
					imagecopyresampled($thumb_p, $thumb, $off_x, $off_y, 0, 0, $width_t, $height_t, $width, $height);
					imagegif($thumb_p,$thumbs_dir."/".$file,$quality);
				}
				else if(($arr['mime'] == 'image/png'))
				{			   
					$thumb=imagecreatefrompng($photos_dir."/".$file);
					$thumb_p = imagecreatetruecolor($square_size, $square_size);
					//default background is black
					$bg = imagecolorallocate ( $thumb_p, 255, 255, 255 );
					imagefill ( $thumb_p, 0, 0, $bg );
					imagecopyresampled($thumb_p, $thumb, $off_x, $off_y, 0, 0, $width_t, $height_t, $width, $height);
					imagepng($thumb_p,$thumbs_dir."/".$file,$quality/10-2);
				}
		}
	}

}


?>