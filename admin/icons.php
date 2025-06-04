<?            $icons_size =$_FILES["icons"]["size"];
			  $icons_tmp =$_FILES["icons"]["tmp_name"];
			  $icons_type=$_FILES["icons"]["type"];   
			  $icons_explode = explode(".",$_FILES["icons"]["name"]);
			  $icons_ext=strtolower(end($icons_explode));
			  
			 $icons_expensions= array("jpeg","jpg","png"); 		
			  if(in_array($icons_ext,$icons_expensions)=== false){
				  $icons_errors[]="extension not allowed, please choose a JPEG or PNG file.";
			  }
			  if($icons_size > 2097152){
			  $icons_errors[]="File size must be excately 2 MB";
			  }  ?>