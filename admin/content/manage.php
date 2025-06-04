<?php
 if(isset($_GET['add'])) {
    if (isset($_POST['doit'])) {
        $count = 0;
        foreach ($_POST as $ArrKEY => $ArrSTR) {
            $row[$count] = $ArrKEY;
            $data[$count] = "'" . $_POST[$ArrKEY] . "'";
            $count++;
        }
		if(isset($_FILES["img"]["name"])){
        if (!empty($_FILES["img"]["name"])) {
            $prefix = date("ymdhis");			
            image_upload($type, $prefix);
            $fileName = $prefix . $_FILES["img"]["name"];
            unlink("../photos/" . $type . "/" . $fileName);
        } else {
            $fileName = "noimage.png";
        }
		$row[$count + 1] = "img";
        $data[$count + 1] = "'" . $fileName . "'";
		}

		/*if(isset($_FILES["pdf"]["name"])){

		if(!empty($_FILES['pdf']['name'])){  

		$filePDF = rand(1000,100000)."-".$_FILES['pdf']['name'];  

		  pdf_upload($filePDF);

		}else { $filePDF = ""; }		

		$row[$count + 1] = "pdf";

        $data[$count + 1] = "'" . $filePDF . "'";		

		}*/
        unset($row[$count - 1]);
        unset($data[$count - 1]);
        $insert_data = insert_data($type, $row, $data);
if ($insert_data !== false) {   
  if(empty($_FILES['files']['name'][0])) {?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>" />
<?php }else{    
   $itemID = mysql_insert_id();
   $prefixs = date("ymdhis");		
   $files_up = images_upload('files', $prefixs, $itemID);
   if($files_up !== false){
    $my_up_files =   update_imgdest($type, $itemID, 'imgdest', '1');
	if($my_up_files !== true) { ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>" />
<?php } } } }else {  ?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php } }

///ADD
    include($type.'_form.php');
} elseif (isset($_GET['did'])) {
     $row_img =  select_img($type,$_GET['did']);   
    $delete_file = "../photos/" . $type . "/bear_" . $row_img["img"];
    if (isset($_POST["delete"])) {
        if (file_exists($delete_file)) { unlink($delete_file); }
  $deleteA = delete_by_id($type,$_GET['did']);
        if ($deleteA !== false) { 
		$my_fuiles = select_data_files('files',$_GET['did']);
		foreach($my_fuiles as $fi){
		$delete_files = "../photos/files/bear_".$fi["filename"];
		if(file_exists($delete_files)) { unlink($delete_files); }
		}
		$deleteB = delete_files_by_id($_GET['did']); 
	    if($deleteB !== false) { ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>" />
<?php 	 } } else { ?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php  }  }  ?>
<form action="" method="post">
  <div class="card">
    <div class="card-header">
      <div>
        <h5>დარწმუნებული ხართ, რომ გსურთ ამ ჩანაწერს წაშლა?</h5>
      </div>
      <div class="pull-right">
        <input type="submit" value="წაშლა" class="alt_btn btn btn-danger" name="delete" />
        <a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>" >
        <input  type="button" class="alt_btn  btn btn-default" value="დაბრუნება" />
        </a> </div>
    </div>
  </div>
</form>
<?php
} elseif(isset($id)) {
$page_data =  get_data($type, $id);
 
  if(isset($_POST["doit"])){ 
   if($view == "users"){ //#users
    if(isset($_POST['password']) && !empty($_POST['password'])){
	      $user_username = clear_data($_POST['username']);
          $user_email = clear_data($_POST['email']);
		  $user_password = sha1(md5(clear_data($_POST['password'])));
	      $update_user = mysql_query("UPDATE `users` SET  username = '".$user_username."', password = '".$user_password."', email = '".$user_email."' WHERE id = '".$_SESSION['id']."'");
		 if($update_user){  unset($_SESSION['manager']); ?>
<meta http-equiv="refresh" content="0; url=index.php?view=users&amp;type=users&amp;id=1&amp;lang=ge" />
<?php } //update_user
	  }else{ echo  "<h1 style='text-align:center;'>PASSWORD REQUID</h1>"; } //isset($_POST['password']
    }else{ //#users 
	    $count = 0;
            foreach ($_POST as $ArrKEY => $ArrSTR) {
                $row[$count] = $ArrKEY;
                $data[$count] = $_POST[$ArrKEY];
                $count++;
            }
            unset($row[$count - 1]);
            unset($data[$count - 1]);
            $update_data = update_data($type, $id, $row, $data);

 if($update_data !== false) {	 
	if(isset($_FILES["img"])){
      if (!empty($_FILES["img"]["name"])) {		  
            $filePath = '../photos/' . $type . '/bear_' . $page_data['img'];				 
            if(file_exists($filePath)){ unlink($filePath); }			
            $prefix = date("ymdhis");
            $fileName = $prefix . $_FILES["img"]["name"];		
            image_upload($type, $prefix);			
	  }else{ $fileName = $page_data["img"];}	
	 $update_file = mysql_query("UPDATE " . $type . " SET img = '" . $fileName . "' WHERE id = '" . $id . "'");
	  
if($update_file !== false) { 	  
  if(empty($_FILES['files']['name'][0])) {?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>&amp;lang=ge" />
<?php }else{   
 $prefixs = date('ymdhis');		
  $files_up = images_upload('files', $prefixs, $id);
   if($files_up !== false){
    $my_up_files = update_imgdest($type, $id, 'imgdest', '1');
	  if($my_up_files !== true) {  ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>&amp;lang=ge" />
<?php } //my_up_files
     } //files_up
    } //empty($_FILES['files']['name'][0])
  } //$update_file 
}else{ //isset($_FILES["img"]) ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>&amp;lang=ge" />
<?php  } }else {  ?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php  } }  }	 
    include($type.'_form.php');	
 } else{  
	  //if($type == 'menu'){
        include($type.'.php');		
	//  }
} ?>
