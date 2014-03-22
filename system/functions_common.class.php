<?php
	function compress_image($src, $dest){
		/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($width / $width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest, 75);
	}

	function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	if(!$desired_width){
		$desired_width = $width;
	}
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest, 75);
	}


	function ago($time)
	{
   	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   	$lengths = array("60","60","24","7","4.35","12","10");

   	$now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   	}

   	$difference = round($difference);

   	if($difference != 1) {
       $periods[$j].= "s";
   	}

   	return "$difference $periods[$j]";
	}
	
	function LoadJpeg($imgname){
    /* Attempt to open */
    $im = @imagecreatefromjpeg($imgname);
	/* See if it failed */
    if(!$im)
    {
        /* Create a black image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }
	return $im;
	}
// no 9811110125 vishal
	
         
    function imgbq($src, $dest, $wt, $ht)
    {
    //$img = new Imagick($img_loc.$file); 
    $img = new Imagick($src); 
    $img->setImageResolution(96,96); 
    $img->resampleImage(96,96,imagick::FILTER_UNDEFINED,1); 
    $img->scaleImage($wt,0); 
    $d = $img->getImageGeometry(); 
    $h = $d['height']; 
    if($h > $ht) { 
    $img->scaleImage(0,$ht); 
    //$img->writeImage($resized_loc.$file); 
    $img->writeImage($dest); 
    } else { 
    //$img->writeImage($resized_loc.$file); 
    $img->writeImage($dest); 
    } 
    $img->destroy(); 
    return $dest;
    }
    
    

	
	function pagination($targetpage, $total_records, $page, $limit, $adjacents=3, $recordFrom=0, $recordTo=0) {
	
			//Pagination
			
			$prev = $page - 1;							//previous page is page - 1
			$next = $page + 1;							//next page is page + 1
			$lastpage = ceil($total_records/$limit);	//lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;
			
			
			$pagination = '';
			if($lastpage > 1)
			{	
				$pagination .= '
					<div class="text-center" >
						<ul class="pagination pagination-ovrd">';
					if($page <= 1)
						$pagination .= '<li class="disabled"><a href="#">&laquo</a></li>';
					else
						$pagination .= '<li><a href="'.DOCROOT.$targetpage.'/'.$prev.'">&laquo</a></li>';
					
					
					if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
					{	
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= '<li class="active"><a href="#">'.$counter.'</a></li>';
							else
								$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $counter. '">'.$counter. '</a></li>';					
						}
					}
					elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
					{
						//close to beginning; only hide later pages
						if($page < 1 + ($adjacents * 2))		
						{
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
									$pagination.= '<li class="active"><a href="#">'.$counter.'</a></li>';
								else
									$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $counter. '">'.$counter. '</a></li>';
							}
							$pagination.= '<li><a href="#">...</li>';
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $lpm1. '">'.$lpm1. '</a></li>';
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $lastpage. '">'.$lastpage. '</a></li>';		
						}
						//in middle; hide some front and some back
						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						{
							$pagination.= '<li><a href="'.$targetpage. '/1">1</a></li>';
							$pagination.= '<li><a href="'.$targetpage. '/2">2</a></li>';
							$pagination.= '<li><a href="#">...</li>';
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<li class="active"><a href="#">'.$counter.'</a></li>';
								else
									$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $counter. '">'.$counter. '</a></li>';					
							}
							$pagination.= '<li><a href="#">...</li>';
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $lpm1. '">'.$lpm1. '</a></li>';
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $lastpage. '">'.$lastpage. '</a></li>';
						}
						//close to end; only hide early pages
						else
						{
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/1">1</a></li>';
							$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/2">2</a></li>';
							$pagination.= '<li><a href="#">...</li>';
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<li class="active"><a href="#">'.$counter.'</a></li>';
								else
									$pagination.= '<li><a href="'.DOCROOT.$targetpage. '/'. $counter. '">'.$counter. '</a></li>';				
							}
						}
					}
					
					
					//next button
					if ($page < $counter - 1) 
						$pagination.= '<li><a href="'.DOCROOT.$targetpage.'/'.$next.'">&raquo</a></li>';
					else
						$pagination.= '<li class="disabled"><a href="#">&raquo</a></li>';
					
					
					
					
					$pagination .= '</ul></div>';
				
	
			}
	
		return $pagination;
	}

	function makeThumbnails($updir, $img, $id)
	{
    $thumbnail_width = 280;
    $thumbnail_height = 144;
    $thumb_beforeword = "thumb";
    //$arr_image_details = getimagesize("$updir" . $id . '_' . "$img"); // pass id to thumb name
    $arr_image_details = getimagesize("$img"); // pass id to thumb name
    $original_width = $arr_image_details[0];
    $original_height = $arr_image_details[1];
    if ($original_width > $original_height) {
        $new_width = $thumbnail_width;
        $new_height = intval($original_height * $new_width / $original_width);
    } else {
        $new_height = $thumbnail_height;
        $new_width = intval($original_width * $new_height / $original_height);
    }
    $dest_x = intval(($thumbnail_width - $new_width) / 2);
    $dest_y = intval(($thumbnail_height - $new_height) / 2);
    if ($arr_image_details[2] == 1) {
        $imgt = "ImageGIF";
        $imgcreatefrom = "ImageCreateFromGIF";
    }
    if ($arr_image_details[2] == 2) {
        $imgt = "ImageJPEG";
        $imgcreatefrom = "ImageCreateFromJPEG";
    }
    if ($arr_image_details[2] == 3) {
        $imgt = "ImagePNG";
        $imgcreatefrom = "ImageCreateFromPNG";
    }
    if ($imgt) {
        //$old_image = $imgcreatefrom("$updir" . $id . '_' . "$img");
        $old_image = $imgcreatefrom("$img");
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
        imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        //$imgt($new_image, "$updir" . $id . '_' . "$thumb_beforeword" . "$img");
        $imgt($new_image, "$updir");
    }
	}




	function paginationx($targetpage, $total_records, $page, $limit, $adjacents=3, $recordFrom=0, $recordTo=0) {
	
			//Pagination
			
			$prev = $page - 1;							//previous page is page - 1
			$next = $page + 1;							//next page is page + 1
			$lastpage = ceil($total_records/$limit);	//lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;
			
			
			$pagination = '<div class="results">Showing '. $recordFrom. ' to '. $recordTo. ' of '. $total_records. ' ('. $lastpage. ' Pages)</div>';
			if($lastpage > 1)
			{	
				$pagination .= '
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td valign="top" align="right">
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tr>
											<td>
												<table cellspacing="0" cellpadding="0" border="0" align="right">
													<tr>
															
					';
					
					if($page <= 1)
						$pagination .= '<td align="center" valign="middle" class="paginationInvalid">« Prev</td>';
					else
						$pagination .= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage.'&page='.$prev.'">« Prev</a></td>';
					
					
					if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
					{	
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= '<td align="center" valign="middle" class="paginationCurrent">'.$counter.'</td>';
							else
								$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $counter. '">'.$counter. '</a>';					
						}
					}
					elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
					{
						//close to beginning; only hide later pages
						if($page < 1 + ($adjacents * 2))		
						{
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
									$pagination.= '<td align="center" valign="middle" class="paginationCurrent">'.$counter.'</td>';
								else
									$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $counter. '">'.$counter. '</a>';
							}
							$pagination.= "...";
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $lpm1. '">'.$lpm1. '</a>';
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $lastpage. '">'.$lastpage. '</a>';		
						}
						//in middle; hide some front and some back
						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						{
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page=1">1</a>';
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page=2">2</a>';
							$pagination.= "...";
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<td align="center" valign="middle" class="paginationCurrent">'.$counter.'</td>';
								else
									$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $counter. '">'.$counter. '</a>';					
							}
							$pagination.= "...";
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $lpm1. '">'.$lpm1. '</a>';
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $lastpage. '">'.$lastpage. '</a>';
						}
						//close to end; only hide early pages
						else
						{
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page=1">1</a>';
							$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page=2">2</a>';
							$pagination.= "...";
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<td align="center" valign="middle" class="paginationCurrent">'.$counter.'</td>';
								else
									$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage. '&page='. $counter. '">'.$counter. '</a>';				
							}
						}
					}
					
					
					//next button
					if ($page < $counter - 1) 
						$pagination.= '<td align="center" valign="middle" class="pagination"><a href="'.$targetpage.'&page='.$next.'">Next »</a></td>';
					else
						$pagination.= '<td align="center" valign="middle" class="paginationInvalid">Next »</td>';
					
					
					
					
					$pagination .= '
					
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">&nbsp;</td>
							</tr>
						</table>
					';
				
	
			}
	
		return $pagination;
	}


	function isLoggedIn() {
		if( isset($_SESSION['LoggedUser'])  && !empty($_SESSION['LoggedUser']['id']) ) {
			return true;
		}
		
		return false;
	}


	
	//Clean Input
	function clean($value)
	{
		if (is_array($value))
		{
			foreach($value as $k => $v)
			{
				$value[$k] = clean($v);
			}
		}
		else
		{
			if(get_magic_quotes_gpc() == 1)
			{
				$value = stripslashes($value);
			}

			$value = trim(htmlspecialchars($value, ENT_QUOTES, "utf-8")); //convert input into friendly characters to stop XSS
			$value = mysql_real_escape_string($value);
		}
   
		return $value;
	}



	//Below function will centerlized the image on new box width height  created by Ankit Jain
	function  FitImageToCenter($sourceImagePath, $targetImagePath='', $new_w=100, $new_h=100) {
	
		$fileinfo = pathinfo($sourceImagePath);
		//print_r($info);
		//return;
		
		list($width, $height) = getimagesize($sourceImagePath);
		if ($width > $new_w){
			if($height>$new_h){
				return $sourceImagePath;
			}
		}
	
		

		$extension= $fileinfo['extension'];
		$targetImage = $targetImagePath. $fileinfo['filename']. '_'. $new_w. 'x'. $new_h. '.'. $extension;
		
		if(file_exists($targetImage))
			return $targetImage;
		
	
		// Get source Image sizes

		// creating new size box
		$thumb = imagecreatetruecolor($new_w, $new_h);
		
		
		//Loading source Image according extension
		
		if($extension=="jpg" || $extension=="jpeg" )
			$source = imagecreatefromjpeg($sourceImagePath);
		else if($extension=="png" )
			$source = imagecreatefrompng($sourceImagePath);
		else if($extension=="gif" )
			$source = imagecreatefromgif($sourceImagePath);
		else 
			return $error[]="Invalid File Type";
		
		
		
		//Creating Image position on new box
		$leftpos = ($new_w - $width) / 2;
		$toppos = ($new_h - $height ) / 2;
		
		
		// Copy source image to thumb box
		imagecopyresized($thumb, $source, $leftpos, $toppos, 0, 0, $width, $height, $width, $height);	
		
		
		
		//Saving File to target location for use;
		if($extension=="jpg" || $extension=="jpeg" )
			imagejpeg($thumb,$targetImage);
		else if($extension=="png" )
			imagepng($thumb,$targetImage);
		else if($extension=="gif" )
			imagegif($thumb,$targetImage);
		
		return $targetImage;
	}




	// Adam Khoury PHP Image Function Library 1.0
	// Function for resizing any jpg, gif, or png image files
	function ak_img_resize($target, $newcopy, $w, $h, $ext) {
		list($w_orig, $h_orig) = getimagesize($target);
		$scale_ratio = $w_orig / $h_orig;
		if (($w / $h) > $scale_ratio) {
			   $w = $h * $scale_ratio;
		} else {
			   $h = $w / $scale_ratio;
		}
		$img = "";
		$ext = strtolower($ext);
		if ($ext == "gif"){ 
		  $img = imagecreatefromgif($target);
		} else if($ext =="png"){ 
		  $img = imagecreatefrompng($target);
		} else { 
		  $img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w, $h);
		// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
		imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		imagejpeg($tci, $newcopy, 80);
		
		return $newcopy;
	}




	//Below function group the record.. input is the array and sortkey which want to group
	function arraySort($input,$sortkey){
 		 foreach ($input as $key=>$val) 
		 	$output[$val[$sortkey]][]=$val;
		 return $output;
	}






	// Below function will return the video id of youtube by giving youtube url
	function getYoutubeVideoId($url) 
	{
    	$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    	preg_match($pattern, $url, $matches);
    	return (isset($matches[1])) ? $matches[1] : false;
	}


	// Below function will return the image id of youtube by giving youtube image url
	function getYoutubeImageId($url) 
	{
    	$pattern = '/i1\.ytimg\.com\/vi\/(.*?)\//si';
    	preg_match($pattern, $url, $matches);
    	return (isset($matches[1])) ? $matches[1] : false;
	}


	//This function rearrange the array in cleanest way.. mostly used in single file upload
	function rearrange( $arr ){
		foreach( $arr as $key => $all ){
			foreach( $all as $i => $val ){
				$new[$i][$key] = $val;    
			}    
		}
		return $new;
	}


	function upload_single_file($file, $path=WEBROOT_DEPOSITORY, $allowedExts = array("jpg", "jpeg", "gif", "png", "doc", "docx", "pdf"), $allowedSize = 2000000)
	{
		if( empty($file['name']) ) 	{
			return "File Name Not Found";	
		}

		$a = explode(".", $file["name"]);
		// $extension = end(explode(".", $file["name"]));
		$extension = $a[1];

		if( !in_array($extension, $allowedExts) ) {
			return $extension . " not allowed";
		}


		if ( $file["size"] > $allowedSize ) {
			return "Max Size of File Should be :". $allowedSize/1048576 . " MB";
		}
		
		
		if(is_dir($path)==false){
	 
		  	$status =  mkdir("$path", 0700);
	 
		   	if($status < 1){
	 
				 return "Unable to create  directory $path ";
	 
			}
	 
		}


		if ( ($file["size"] < $allowedSize)    )
  		{
		  if ($file["error"] > 0)
		  {
		    echo "Return Code: " . $file["error"] . "<br>";
			return false;
    	  }
		  else
    	  {
		    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		    // $newfilename = time() . $file["name"];
		    $newfilename = time().rand().".".$extension;

	        move_uploaded_file($file["tmp_name"],
			      $path ."/". $newfilename);
		
			$returnArray ['file_name'] = $newfilename;
			$returnArray ['file_path'] = $path;
			return $returnArray;
    	  }
	  	}
			
	}//End of Function








	//Below Function to upload multiple file
	function upload_multiple_file(  $files, $file_dir="user_files", $allowed_file_type=array("pdf","ppt","pptx","xls","xlxs","doc","docx","jpg","jpeg","png", "gif"), $max_file_size = 2097152  ) {
	 
		$overwrite=0;
		$max_file_size_check=1;
		
	 
		 foreach($files['name'] as $fkey=> $fname){
	 
			 $ext = pathinfo($fname, PATHINFO_EXTENSION);
			   if (!in_array($ext, $allowed_file_type)) {
	 
				   return "unsupported file format";
					break;
			   }
	 
		 }
	 
		foreach($files['tmp_name'] as $key => $tmp_name ){
	 
			$file_name = $files['name'][$key];
	 
			$file_size =$files['size'][$key];
	 
			$file_tmp_name =$files['tmp_name'][$key];
	 
			$file_type=$files['type'][$key];
	 
			if($max_file_size_check < 1) {
				if($file_size > $max_file_size){
	 
					$fsize=$max_file_size/1048576;
					return    'File size must be less than '.$fsize.' MB';
					break;
	 
				}
			}
	 
			if(is_dir($file_dir)==false){
	 
				  $status =  mkdir("$file_dir", 0700);
	 
				   if($status < 1){
	 
						 return "unable to create  diractory $file_dir ";
	 
					}
	 
			}
	 
			if(is_dir($file_dir)){
	 
				if($overwrite < 1){
	 
					move_uploaded_file($file_tmp_name,"$file_dir/".time()."_".$file_name);
	 
				}
	 
			}
	 
			//  $file_upload_query="INSERT into user_uploads (`u_id`,`file_name`,`file_type`) VALUES('$user_id','$file_name','$file_size','$file_type'); ";
			//mysql_query($file_upload_query);
	 
	   }
	 
			return "Success";
	 
	}





	function getRating($rating=1)	{
		switch($rating)
		{
			case 1 : $return = "Poor" ;
				break;
			
			case 2 : $return = "Average" ;
				break;
			
			case 3 : $return = "Good" ;
				break;
			
			case 4 : $return = "Very Good" ;
				break;
			
			case 5 : $return = "Best" ;
				break;
			
			default : $return = "Invalid" ;
		}
		
		return $return;
	}

	function buildTreeObject($items) {
	
		$childs = array();
	
		foreach($items as $item)
			$childs[$item->parent_id][] = $item;
	
		foreach($items as $item) if (isset($childs[$item->id]))
			$item->childs = $childs[$item->id];
	
		return $childs[0];
	}
	
	function buildTreeArray($items) {
	
		$childs = array();
	
		foreach($items as &$item) $childs[$item['parent_id']][] = &$item;
		unset($item);
	
		foreach($items as &$item) if (isset($childs[$item['id']]))
				$item['childs'] = $childs[$item['id']];
	
		return $childs[0];
	}


	function bbcodeParser($bbcode)
	{
		/*
		*
		*       bbCode Parser
		*
		*       Syntax: bbcodeParser(bbcode)
		*/
		
		/*
		Commands include
		* bold
		* italics
		* underline
		* typewriter text
		* strikethough
		* images
		* urls
		* quotations
		* code (pre)
		* colour
		* size
		*/
		
		/* Matching codes */
		$urlmatch = "([a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+)";
		
		/* Basically remove HTML tag's functionality */
		//$bbcode = htmlspecialchars($bbcode);
		
		/* Replace "special character" with it's unicode equivilant */

		$match["root"] = "/\[root\]/is";
		$replace["root"] = WEBROOT;

		$match["maploc"] = "/\[maploc\](.*?)\[\/maploc\]/is";
		$replace["maploc"] = "<a href=\"" .WEBROOT. "?view=map&area=$1\" class=\"wfmap\">map</a>";
		
		$match["contactform"] = "/\[contactform\](.*?)\[\/contactform\]/is";
		$replace["contactform"] = DefaultContactForm();

		$match["contactform1"] = "/\[contactform1\](.*?)\[\/contactform1\]/is";
		$replace["contactform1"] = DefaultContactForm1();
		
		$match["registerform"] = "/\[registerform\](.*?)\[\/registerform\]/is";
		$replace["registerform"] = DefaultRegistrationForm();
		
		$match["registerform1"] = "/\[registerform1\](.*?)\[\/registerform1\]/is";
		$replace["registerform1"] = DefaultRegistrationForm1();
		
		$match["loginform"] = "/\[loginform\](.*?)\[\/loginform\]/is";
		$replace["loginform"] = DefaultLoginForm();

		$match["loginform1"] = "/\[loginform1\](.*?)\[\/loginform1\]/is";
		$replace["loginform1"] = DefaultLoginForm1();
		
		$match["forgotform"] = "/\[forgotform\](.*?)\[\/forgotform\]/is";
		$replace["forgotform"] = DefaultForgotForm();

		$match["forgetform"] = "/\[forgetform\](.*?)\[\/forgetform\]/is";
		$replace["forgetform"] = DefaultForgotForm();

		/* Bold text */
		$match["b"] = "/\[b\](.*?)\[\/b\]/is";
		$replace["b"] = "<b>$1</b>";
		
		/* Italics */
		$match["i"] = "/\[i\](.*?)\[\/i\]/is";
		$replace["i"] = "<i>$1</i>";
		
		/* Underline */
		$match["u"] = "/\[u\](.*?)\[\/u\]/is";
		$replace["u"] = "<span style=\"text-decoration: underline\">$1</span>";
		
		/* Typewriter text */
		$match["tt"] = "/\[tt\](.*?)\[\/tt\]/is";
		$replace["tt"] = "<span style=\"font-family:monospace;\">$1</span>";
		
		$match["ttext"] = "/\[ttext\](.*?)\[\/ttext\]/is";
		$replace["ttext"] = "<span style=\"font-family:monospace;\">$1</span>";
		
		/* Strikethrough text */
		$match["s"] = "/\[s\](.*?)\[\/s\]/is";
		$replace["s"] = "<span style=\"text-decoration: line-through;\">$1</span>";
		
		/* Color (or Colour) */
		$match["color"] = "/\[color=([a-zA-Z]+|#[a-fA-F0-9]{3}[a-fA-F0-9]{0,3})\](.*?)\[\/color\]/is";
		$replace["color"] = "<span style=\"color: $1\">$2</span>";
		
		$match["colour"] = "/\[colour=([a-zA-Z]+|#[a-fA-F0-9]{3}[a-fA-F0-9]{0,3})\](.*?)\[\/colour\]/is";
		$replace["colour"] = $replace["color"];
		
		/* Size */
		$match["size"] = "/\[size=([0-9]+(%|px|em)?)\](.*?)\[\/size\]/is";
		$replace["size"] = "<span style=\"font-size: $1;\">$3</span>";
		
		/* Images */
		$match["img"] = "/\[img\]".$urlmatch."\[\/img\]/is";
		$replace["img"] = "<img src=\"$1\" />";
		
		/* Links */
		$match["url"] = "/\[url=".$urlmatch."\](.*?)\[\/url\]/is";
		$replace["url"] = "<a href=\"$1\">$2</a>";
		
		$match["surl"] = "/\[url\]".$urlmatch."\[\/url\]/is";
		$replace["surl"] = "<a href=\"$1\">$1</a>";
		
		/* Quotes */
		$match["quote"] = "/\[quote\](.*?)\[\/quote\]/ism";
		$replace["quote"] = "<div class=\"bbcode-quote\">�$1�</div>";
		
		$match["quote"] = "/\[quote=(.*?)\](.*?)\[\/quote\]/ism";
		$replace["quote"] = "<div class=\"bbcode-quote\"><span class=\"bbcode-quote-user\" style=\"font-weight:bold;\">$1 said:</span><br />�$2�</div>";
		
		/* Parse */
		$bbcode = preg_replace($match, $replace, $bbcode);
		//echo "BBCODE:" . $bbcode;
		/* Return parsed contents */
		return $bbcode;
	}

	function currencyConverter($from_Currency,$to_Currency,$amount) {
    	$amount = urlencode($amount);
	    $from_Currency = urlencode($from_Currency);
	    $to_Currency = urlencode($to_Currency);
    	$url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
		//echo $url;
	    $ch = curl_init();
	    $timeout = 0;
	    curl_setopt ($ch, CURLOPT_URL, $url);
	    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
	    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    	$rawdata = curl_exec($ch);
	    curl_close($ch);
	    $data = explode('"', $rawdata);
	    $data = explode(' ', $data['3']);
	    $var = $data['0'];
	    return round($var,2);
	}

	function aPrint($a){	
		echo "<pre>";
		print_r($a);
		echo "</pre>";
	}
	
	function p($txt,$s=3){
		if(is_array($txt)){
			aPrint($txt);
			return;
		}
		echo "<h{$s}>{$txt}</h{$s}>";
	}
	
	function redirect($url=false, $time = 0){
		$url = $url ? $url : $_SERVER['HTTP_REFERER'];
		
		if(!headers_sent()){
			if(!$time){
				header("Location: {$url}"); 
			}else{
				header("refresh: $time; {$url}");
			}
		}else{
			echo "<script> setTimeout(function(){ window.location = '{$url}' },". ($time*1000) . ")</script>";	
		}
	}
	
	function getVar($index){
		$tree = explode("/",@$_GET['path']);
		$tree = array_filter($tree);
		
		if(is_int($index)){
			$res = @$tree[$index-1];
		}else{
			$res = @$_GET[$index];
		}
		return $res;
	}
	
	function showMsg($index="NoteMsgs"){
		if(isset($_SESSION[$index])){
			if(!is_array($_SESSION[$index])) return;
			
			$res = "<ul>";
			foreach($_SESSION[$index] as $i=>$x){
				$res .= "<li>$x</li>";
			}
			$res .= "</ul>";
			
			unset($_SESSION[$index]);
			
			return $res;
		}
	}
	
	function maxArg($num){
		$tree = explode("/",@$_GET['path']);
		$tree = array_filter($tree);
		
		if(count($tree) > $num){
			send404();
		}
	}
	
	function send404(){
		if(!headers_sent()){			
			header("HTTP/1.0 404 Not Found");
			include("404.html");
			die();
		}else{
			redirect("404.html");
		}
	}
?>