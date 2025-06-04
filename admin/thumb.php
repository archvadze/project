<? $thumb_size =$_FILES["thumb"]["size"];
			  $thumb_tmp =$_FILES["thumb"]["tmp_name"];
			  $thumb_type=$_FILES["thumb"]["type"];   
			  $thumb_explode = explode(".",$_FILES["thumb"]["name"]);
			  $thumb_ext=strtolower(end($thumb_explode));
			  
			  $thumb_expensions= array("jpeg","jpg","png"); 		
			  if(in_array($thumb_ext,$thumb_expensions)=== false){
				  $thumb_errors[]="extension not allowed, please choose a JPEG or PNG file.";
			  }
			  if($thumb_size > 2097152){
			  $thumb_errors[]="File size must be excately 2 MB";
			  }  ?>