<?php session_start(); 
if(isset($_GET['id']) || !empty($_GET['id'])) $id = (int)$_GET['id'];
if(isset($_GET['view']) || !empty($_GET['view'])) $view = $_GET['view']; 
else $view = 'projects';
if(isset($_GET['menu']) || !empty($_GET['menu'])) $view = 'menu';
if(isset($_GET['type']) || !empty($_GET['type'])) $type = $_GET['type'];  
else $type = 'pages';
if(isset($_GET['edit']) || !empty($_GET['edit'])) $edit = $_GET['edit'];

if(isset($id) && !empty($id)){
if(isset($_GET['menu'])){ $menu_data = get_data('menu',$id); }
else { $menu_data =  get_data($type,$id); }
}else{ $menu_data = menu_data($view); }
$pages = select_data($type,$view);

function db_connect(){
	$dbHost = 'localhost';
	$dbUser = 'proeqti_mas23';
	$dbPass = 'GGvB9MP=yf~P';
	$dbName = 'proeqti_mas23';
	$connection = mysql_connect($dbHost,$dbUser,$dbPass);
	if(!$connection) die('მონაცემთა ბაზის სერვერსთან კავშირი ვერ ხერხდება გთხოვთ განაახლოთ გვერდი.');
	mysql_query('SET CHARACTER SET utf8');
        mysql_query('SET NAMES utf8');

	if(!$connection || !mysql_select_db($dbName,$connection)){
		return false;
		}
	return $connection;
	mysql_close($connection);
}


function db_result_to_array($result){
    db_connect();
	$res_array = array();
	$count = 0;
	if(!empty($result)){
	while($row = mysql_fetch_assoc($result)){
		$res_array[$count] = $row;
		$count++;
		}}
	return $res_array;
}

 /*INCLUDES*/
 
$timezone = 'Asia/Tbilisi';
date_default_timezone_set($timezone);


/*INCLUDES*/

function display_children($parent, $level, $lang) {
	//if(isset($_GET['view']) || !empty($_GET['view'])) $view = $_GET['view']; else  $view = 'main'; 
  db_connect();
$result = mysql_query("SELECT a.id, a.title_en, a.title_ru, a.title_ge, a.url,  a.type, a.parent, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.hidden=0 AND a.parent=" . $parent); ?>
<?php if($parent ==0){ $ulClass = 'class="nav navbar-nav navbar-right navbar-links-custom"'; }else{ $ulClass = 'class="dropdown-menu dropdown-menu-left"';  } ?>

<ul <?php echo $ulClass; ?>>
  <?php while ($row = mysql_fetch_array($result)) {  
  if(isset($_GET['view']) && !empty($_GET['view'])){ $v = mysql_real_escape_string($_GET['view']); }else{ $v = 'main'; }
  $link = 'index.php?view='.$row['url'].'&amp;type='.$row['type'].'&amp;lang='.$lang;
  if($row['Count']>0){ ?>
  <li class="dropdown <?php if($v == $row['url']){ echo 'active-link';} ?>"> <a href="<?php echo $link;?>" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $row['title_'.$lang];?> </a>
    <?php display_children($row['id'], $level + 1, $lang); ?>
  </li>
  <?php } elseif ($row['Count']==0) { ?>
  <li class="<?php if($v == $row['url']){ echo 'active-link';}?>"> <a href="<?php echo $link;?>"> <?php echo $row['title_'.$lang];?> </a> </li>
  <?php } else{}
        } //end WHILE ?>
</ul>
<?php }


function display_children_admin($parent, $level, $lang) {
  db_connect();
$result = mysql_query("SELECT a.id, a.title_en, a.title_ru, a.title_ge, a.url,  a.type, a.parent, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent); ?>
<?php /*if($parent > 0){ $ulClass = 'flex-column nav-dropdown-items'; }else{ $ulClass = 'nav flex-column'; } ?>
<ul class="<?php echo $ulClass;?>">
  <?php while($row = mysql_fetch_array($result)) {
	  $link = 'index.php?view='.$row['url'].'&amp;type='.$row['type'].'&amp;tre='.$row['tre']; 
if($row["Count"] > 0) { ?>
  <li class="nav-item nav-dropdown <?php if($view == $row['url']){ echo 'active'; } ?>" > <a href="<?php echo $link;?>" class="nav-link nav-dropdown-toggle"><i class="nav-icon icon-puzzle"></i> <?php echo $row['title_'.$lang];?> </a>
    <?php display_children($row['id'], $level + 1, $lang); ?>
  </li>
  <?php } elseif ($row["Count"]==0) { ?>
  <li  class="nav-item <?php if($view == $row["url"] ){ echo 'active'; } ?>" > <a  href="<?php echo $link;?>" class="nav-link"> <?php echo $row['title_'.$lang];?> </a> </li>
  <?php } else;
} ?>
</ul>
<?php }*/
 /*?><a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4  <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo4">
            <a href="" class="list-group-item">Subitem 1</a>
            <a href="" class="list-group-item">Subitem 2</a>
            <a href="" class="list-group-item">Subitem 3</a>
          </div><?php */  
 
 if($parent == 0){ $divClass = 'list-group panel'; }else{ $divClass = 'list-group indent'; } ?>
<div class="<?php echo $divClass;?>">
  <?php  while($row = mysql_fetch_array($result)) {
	 if($row['url']!='#'){$link = 'index.php?view='.$row['url'].'&amp;type='.$row['type'];}
	 else{ $link = '#';} 
if($row["Count"] > 0) { ?>
  <a href="<?php echo $link;?>" class="list-group-item <?php if($view == $row['url']){ echo 'active'; } ?>"><?php echo $row['title_'.$lang];?></a>
  <?php display_children_admin($row['id'], $level + 1, $lang); ?>
  <?php } elseif ($row["Count"]==0) { ?>
  <a href="<?php echo $link;?>" class="list-group-item <?php if($view == $row["url"] ){ echo 'active'; } ?>"> <?php echo $row['title_'.$lang];?></a>
  <?php } else;
   } ?>
</div>
<?php }  



function update_hits($id){
    db_connect();	 
	mysql_query("UPDATE pages SET views = views + 1 WHERE id = '".$id."'");
}
function pdf_upload($pdf){ 
 $file_loc = $_FILES['pdf']['tmp_name'];
 $file_size = $_FILES['pdf']['size'];
 $file_type = $_FILES['pdf']['type'];
 $folder=$_SERVER['DOCUMENT_ROOT']."/pdf/";
  move_uploaded_file($file_loc,$folder.$pdf);
  return true;
}

function display_children_bottom($lang) {
  db_connect();
$result = mysql_query("SELECT * FROM `menu` WHERE parent='0'"); 
while ($row = mysql_fetch_array($result)) { ?>
<span class="<?php if($_GET['view'] == $row['url'] ){ ?> undercolored <?php }?>"> <a href="<?php echo "http://".$_SERVER["HTTP_HOST"];?>/index.php?view=<?php echo $row['url'];?>&amp;type=<?php echo $row['type'];?>&amp;lang=<?php echo $lang;?>"><?php echo $row['title_'.$lang];?> </a> </span>
<?php }  } 

function  selectMenuItems($parent, $level, $lang) {
 db_connect();
$result = mysql_query("SELECT a.id, a.title_en, a.title_ru, a.title_ge, a.url, a.type, a.catID,  a.parent, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent); ?>
<?php while ($row = mysql_fetch_array($result)) {
if ($row['Count'] > 0) { ?>
<option value="<?php echo $row['id'];?>" > <?php echo $row['title_'.$lang];?> </option>
<optgroup>
<?php selectMenuItems($row['id'], $level + 1,$lang); ?>
</optgroup>
<?php } elseif ($row['Count']==0) { ?>
<option value="<?php echo $row['id'];?>" > <?php echo $row['title_'.$lang];?> </option>
<?php } else;
} ?>
<?php }


function  selectMenuItemsEdit($parent, $level, $lang, $thisparent) {
 db_connect();
$result = mysql_query("SELECT a.id, a.title_en, a.title_ru, a.title_ge, a.url, a.type,  a.parent, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent); ?>
<?php 
if($result){ 
  while($row = mysql_fetch_array($result)) {
	if ($row['Count'] > 0) { ?>
	<option value="<?php echo $row['id'];?>" <?php if($thisparent == $row['id']){ ?> selected <?php }?>> <?php echo $row['title_'.$lang];?> </option>
	<optgroup>
	<?php selectMenuItemsEdit($row['id'], $level + 1,$lang, $thisparent); ?>
	</optgroup>
	<?php } elseif ($row['Count']==0) { ?>
	<option value="<?php echo $row['id'];?>" <?php if($thisparent == $row['id']){?> selected <?php }?>> <?php echo $row['title_'.$lang];?> </option>
	<?php } else;
   } 
} ?>
<?php }


function just_data($table){
	 db_connect();
	$query = sprintf( "SELECT * FROM %s", mysql_real_escape_string($table));
    $result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;	 
}
function just_hotels_id($districts_id){
	 db_connect();
	$query = sprintf( "SELECT id, title_ge FROM hotels WHERE districts_id = %s", mysql_real_escape_string($districts_id));
    $result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;	 
}

function menu_data($view){
	 db_connect();
	$query = sprintf( "SELECT * FROM menu WHERE menu.url = '%s' ", 
	                    mysql_real_escape_string($view) );
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
}

function menuParent($paret){
	 db_connect();
	$query = sprintf( "SELECT * FROM menu WHERE menu.parent = '%s' ", 
	                    mysql_real_escape_string($paret) );
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function select_data_one($table,$url){
	 db_connect();
	$query = sprintf( "SELECT * FROM ".$table." WHERE ".$table.".url = '%s' ", 
	                    mysql_real_escape_string($url) );
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
	
} 
function check_now($date_now, $itemID){
 db_connect();
 $query = sprintf("SELECT * FROM rooms_dates WHERE '%s' BETWEEN CAST(check_in AS DATE) AND CAST(check_out AS DATE) AND room_id ='%s' ", mysql_real_escape_string($date_now), mysql_real_escape_string($itemID));
 $result = mysql_query($query); 
 return $result;
}

function selectSameItem($cat){
	 db_connect();
	$query = "SELECT * FROM menu WHERE catID='".$cat."' ORDER BY id ";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function select_data_news($table, $view, $limit){
	 db_connect();
	$query = "SELECT * FROM ".$table." WHERE url='".$view."'  ORDER BY id DESC  LIMIT ".$limit." ";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}
function selectBlogYoutube($table, $url, $limit){
	 db_connect();
	$query = "SELECT * FROM ".$table." WHERE  url = '".$url."' AND youtube IS NOT NULL ORDER BY id DESC  LIMIT ".$limit." ";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}


function select_data_for_front($table, $limit){
	 db_connect();
	$query = "SELECT * FROM ".$table."  ORDER BY date  LIMIT ".$limit." ";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function select_user_id($username){
	 db_connect();
	$query = sprintf("SELECT id FROM users WHERE users.username = '%s' ", 
	                    mysql_real_escape_string($username));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
} 

function select_img($type, $id){
	 db_connect();
	 if(isset($id) && !empty($id)) {
	$query = "SELECT img FROM ".$type." WHERE id = '".$id."'";
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
	 }
}
function select_imgs($type,$itemID){
	 db_connect();
	$query = "SELECT img FROM ".$type." WHERE itemID = '".$itemID."'";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}



	/* Select data from TABLE */
	
function select_data($table,$url){
	 db_connect();
	$query = "SELECT * FROM ".$table." WHERE url='".$url."' ORDER BY id DESC";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function select_districts($city_id){
	 db_connect();
	$query = "SELECT * FROM districts WHERE city_id='".$city_id."' ORDER BY name ASC";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function select_data_files($table,$itemID){
	 db_connect();
	$query = "SELECT * FROM ".$table." WHERE itemID = '".$itemID."' ORDER BY id DESC";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}


function select_data_asc($table,$url){
	 db_connect();
	$query = "SELECT * FROM ".$table." WHERE url='".$url."' ORDER BY id ASC";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}


function select_data_for_categories($url){
	 db_connect();
	$query = "SELECT * FROM `menu` WHERE parent IN (select `id` from `menu` where `url`='".$url."')";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

/*function selectSubCat($url){
	 db_connect();
	$query = "SELECT * FROM `menu` WHERE parent IN (select `id` from `menu` where `url`='".$url."')";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}*/

function getOne($table,$url){
	db_connect();
	$query = sprintf("SELECT * FROM ".$table." WHERE ".$table.".url = '%s' ", 
	                    mysql_real_escape_string($url));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
}

function get_data($table,$id){
	db_connect();
	$query = sprintf("SELECT * FROM ".$table." WHERE ".$table.".id = '%s' ", 
	                    mysql_real_escape_string($id));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
}
function get_room_date($id){
	db_connect();
	$query = sprintf("SELECT * FROM rooms_dates WHERE rooms_dates.room_id = '%s' ", 
	                    mysql_real_escape_string($id));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
}

function str_size($str){
 	$str = mb_substr($str, 0, 70,'UTF-8');
	return $str;
}
function str_front($str,$size){
 	$str = mb_substr($str, 0, $size,'UTF-8');
	return $str;
}


function get_latest_news($table,$url){
	db_connect();
	$query = sprintf( "SELECT * FROM ".$table." WHERE ".$table.".url = '%s'", 
	                    mysql_real_escape_string($url));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);	
	return $row;
}

function clear_data($data){
	$data = trim(htmlspecialchars($data));
	return $data;
}

function captcha(){
	$captcha = rand(1000,9999);
	$captcha = clear_data($captcha);
	return $captcha;
}


function update_menu($id, $row, $data){
    db_connect();
	$i = 0;
	foreach($data as $item => $key):
	mysql_query("UPDATE `menu` SET ".$row[$i]." = '".$key."' WHERE id = '".$id."'");	
	 $i++;
	endforeach;
	
	}

function update_one($table, $url, $row, $data){
    db_connect();
	$i = 0;
	foreach($data as $item => $key):
	mysql_query("UPDATE ".$table." SET ".$row[$i]." = '".$key."' WHERE url = '".$url."'");	
	$i++;
	endforeach;
}
function update_data($table, $id, $row, $data){
    db_connect();
	$i = 0;
	foreach($data as $item => $key):
	mysql_query("UPDATE ".$table." SET ".$row[$i]." = '".$key."' WHERE id = '".$id."'");	
	$i++;
	endforeach;
	
	}	
function update_imgdest($table, $id, $row, $data){
    db_connect();	 
 mysql_query("UPDATE ".$table." SET ".$row." = '".$data."' WHERE id = '".$id."'");	
}	
	
	/* RAC MCHIRDEBA */
	
	/*ADMINISTRATOR */
	
	/*EDIT MENU ITEMS */
function display_menuitems($parent, $level,$lang) {
db_connect();
$result = mysql_query("SELECT a.id, a.title_en, a.title_ru, a.title_ge, a.url,  a.type, a.parent, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent); ?>
<ul class="list-group">
  <?php while ($row = mysql_fetch_array($result)) {
if ($row['Count'] > 0) { ?>
  <li class="list-group-item"> <?php echo $row['title_'.$lang];?> <span class="badge"><a href="index.php?view=menu&amp;type=menu&amp;id=<?php echo $row['id'];?>" ><i class="fa fa-pencil"></i></a> <a href="index.php?view=menu&amp;type=menu&amp;did=<?php echo $row['id'];?>" ><i class="fa fa-trash"></i></a></span>
     <?php display_menuitems($row['id'], $level + 1,$lang); ?>
  </li>
  <?php } elseif ($row['Count']==0) { ?>
  <li class="list-group-item"> <?php echo $row['title_'.$lang];?> <span class="badge"><a href="index.php?view=menu&amp;type=menu&amp;id=<?php echo $row['id'];?>" ><i class="fa fa-pencil"></i></a> <a href="index.php?view=menu&amp;type=menu&amp;did=<?php echo $row['id'];?>" ><i class="fa fa-trash"></i></a></span></li>
  <?php } else;
} ?>
</ul>
<?php }
	
	
	
	/*INSERT MENU*/
function insert_districts($row, $data){
    db_connect();
	$row = implode(',',$row);
	$data = implode(',',$data);
	mysql_query("INSERT INTO `districts` (".$row.") VALUES(".$data.")");	
}	
	
function insert_menu($row, $data){
    db_connect();
	$row = implode(',',$row);
	$data = implode(',',$data);
	mysql_query("INSERT INTO `menu` (".$row.") VALUES(".$data.")");	
}
   /*INSERT PAGES*/
function insert_data($table, $row, $data){
    db_connect();
	$row = implode(',', $row);
	$data = implode(',', $data);
	mysql_query("INSERT INTO ".$table." (".$row.") VALUES(".$data.")");	
}


function translate($str) 
    {
        $tr = array(
            "ა"=>"a",
            "ბ"=>"b",
            "გ"=>"g",
            "დ"=>"d",
            "ე"=>"e",
            "ვ"=>"v",
            "ზ"=>"z",
            "თ"=>"T",
            "ი"=>"i",
            "კ"=>"k",
            "ლ"=>"l",
            "მ"=>"m",
            "ნ"=>"n",
            "ო"=>"o",
            "პ"=>"p",
			"ჟ"=>"J",
			"პ"=>"p",
            "რ"=>"r",
            "ს"=>"s",
            "ტ"=>"t",
            "უ"=>"u",
            "ფ"=>"f",
            "ქ"=>"q",
            "ღ"=>"R",
            "ყ"=>"y",
            "შ"=>"S",
            "ჩ"=>"C",
            "ც"=>"c",
            "ძ"=>"Z",
            "წ"=>"w",
            "ჭ"=>"W",
            "ხ"=>"x",
            "ჯ"=>"j",
            "ჰ"=>"h",
			" "=>"_",
			"."=> "",
            "/"=> "_",
            ","=>"_",
            "-"=>"_",
            "("=>"",
            ")"=>"",
            "["=>"",
            "]"=>"",
			"}"=>"",
            "{"=>"",
            "="=>"_",
            "+"=>"_",
            "*"=>"",
            "?"=>"",
            "\""=>"",
            "'"=>"",
			"`"=>"",
            "&"=>"",
            "%"=>"",
            "#"=>"",
            "@"=>"",
            "!"=>"",
            ";"=>"",
            "№"=>"",
            "^"=>"",
            ":"=>"",
            "~"=>"",
            "|"=>""
        );
        return strtr($str,$tr);
    }
	
function img_resize($target, $newcopy, $w, $h, $ext) { 
	list($w_orig, $h_orig) = getimagesize($target); 
	$scale_ratio = $w_orig / $h_orig;
        if($w_orig <= $w){ $w = $w_orig; }
	if (($w / $h) > $scale_ratio) { 
	$w = $h * $scale_ratio; 
	} else { $h = $w / $scale_ratio; } 
	$img = ""; $ext = strtolower($ext); 
	if ($ext == "gif"){ $img = imagecreatefromgif($target); 
	} elseif($ext =="png"){  
	 $img = imagecreatefrompng($target); 
	 imagealphablending($img, false); 
	 imagesavealpha($img, true);
	} else { $img = imagecreatefromjpeg($target); } 
	$tci = imagecreatetruecolor($w, $h);  
	// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig); 
	if ($ext == "gif"){ imagegif($tci, $newcopy, 85);  
	} elseif($ext =="png"){ imagepng($tci, $newcopy); 
	} else { imagejpeg($tci, $newcopy, 85); } 
}

function image_upload($type,$prefix){
$fileName = $prefix.$_FILES["img"]["name"]; // The file name
$fileTmpLoc = $_FILES["img"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["img"]["type"]; // The type of file it is
$fileSize = $_FILES["img"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["img"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
echo "შეცდომა: აირჩიეთ ფაილი ასატვირთად."; exit(); } else if($fileSize > 5242880) { 
// if file size is larger than 5 Megabytes
echo "შეცდომა: თქვენი ფაილი მეტია ვიდრე 5 მეგაბაიტი."; unlink($fileTmpLoc); 
// Remove the uploaded file from the PHP temp folder
exit(); } else if (!preg_match("/[\w\-]+\.(gif|jpg|png|jpeg)$/i", $fileName) ) { 
// This condition is only if you wish to allow uploading of specific file types
echo "შეცდომა: ფაილი არ შეესაბამება სურათის ფაილის გაფართოვებებს:  .gif, .jpg, .jpeg, .png."; 
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
echo "შეცდომა: ატვირთვის პროცესში დაფიქსირდა შეცდომა. სცადეთ თავიდან."; exit(); } // END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/".$fileName);
// Check to make sure the move result is true before continuing
if ($moveResult != true) { echo "შეცდომა: ფაილი არ აიტვირთა. სცადეთ თავიდან.".$fileName; 
unlink($fileTmpLoc); 
// Remove the uploaded file from the PHP temp folder
exit(); } 
//unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Universal Image Resizing Function --------
$target_file = $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/".$fileName; 
$resized_file = $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/bear_".$fileName; 
$wmax = 1200; $hmax = 1200; 
img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt); 
}


function images_upload($type,$prefixs,$itemID){
    db_connect();
foreach ($_FILES['files']['name'] as $f => $name) {                
$fileName = $prefixs.$name; // The file name
$fileTmpLoc = $_FILES["files"]["tmp_name"][$f]; // File in the PHP tmp folder
$fileType = $_FILES["files"]["type"][$f]; // The type of file it is
$fileSize = $_FILES["files"]["size"][$f]; // File size in bytes
$fileErrorMsg = $_FILES["files"]["error"][$f]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
echo "შეცდომა: აირჩიეთ ფაილი ასატვირთად."; exit(); } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
echo "შეცდომა: თქვენი ფაილი მეტია ვიდრე 5 მეგაბაიტი."; unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } else if (!preg_match("/[\w\-]+\.(gif|jpg|png|jpeg)$/i", $fileName) ) { // This condition is only if you wish to allow uploading of specific file types
echo "შეცდომა: ფაილი არ შეესაბამება სურათის ფაილის გაფართოვებებს:  .gif, .jpg, .jpeg, .png."; 
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
echo "შეცდომა: ატვირთვის პროცესში დაფიქსირდა შეცდომა. სცადეთ თავიდან."; exit(); } // END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/".$fileName); // Check to make sure the move result is true before continuing
if ($moveResult != true) { echo "შეცდომა: ფაილი არ აიტვირთა. სცადეთ თავიდან.".$fileName; 
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); }  
if($fileTmpLoc) unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Universal Image Resizing Function --------
$target_file = $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/".$fileName; 
$resized_file = $_SERVER['DOCUMENT_ROOT']."/photos/".$type."/bear_".$fileName; 
$wmax = 1200; $hmax = 1200; 
img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt); 
 //$fileNames = $prefixs . $fileName;
 unlink($_SERVER['DOCUMENT_ROOT']."/photos/" . $type . "/" . $fileName);
  mysql_query("INSERT INTO ".$type." (itemID,filename) VALUES('".$itemID."', '".$fileName."')");
    }
 }




//registration

function check_login($user){
	 db_connect();
$query = sprintf("SELECT username FROM users WHERE users.username = '%s' ", mysql_real_escape_string($user));
$result = mysql_query($query);
if(mysql_num_rows($result) > 0) return FALSE;  else  return TRUE; 
	}
function check_user($user, $password){
	 db_connect();
$query = sprintf("SELECT username FROM users WHERE users.username = '%s'  AND  users.password = '%s'",                                                                      mysql_real_escape_string($user),
                                                                      mysql_real_escape_string($password));
$result = mysql_query($query);
if(mysql_num_rows($result) > 0) return TRUE;  else  return FALSE; 
}
function register($reg){
	db_connect();
	mysql_query("INSERT INTO users (username, email, password, url, status ) VALUES(".$reg.")");
}
function update_user($row,$data,$uID){
	db_connect();
	$i = 0;
	foreach($data as $item => $key):
	mysql_query("UPDATE `users` SET ".$row[$i]." = '".$key."' WHERE id = '".$uID."'");	
	$i++;
	endforeach;

}
// HOUSES
function just_houses($table, $best){
	 db_connect();
	$query = sprintf( "SELECT * FROM %s WHERE houses.best='%s' ORDER BY houses.id DESC ", 
	                   mysql_real_escape_string($table),
					   mysql_real_escape_string($best));
    $result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;	 
}
function selectPageURL($catID){
	 db_connect();
	$query = "SELECT * FROM menu WHERE catID='".$catID."'";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}

function selectPageNews($mURL){
	 db_connect();
	 $query = "SELECT id FROM pages WHERE id ='".$mURL."'";
    $result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result; 
	 
}
function select_house_count($user_id){
	 db_connect();
	$house_count = sprintf("SELECT id FROM houses WHERE houses.user_id = '%s' ", 
	                    mysql_real_escape_string($user_id));
    $query_count = mysql_query($house_count);				
	$count = mysql_num_rows($query_count);
	return $count;
} 
function select_files_count($itemID){
	 db_connect();
	$files_count = sprintf("SELECT id FROM files WHERE files.itemID = '%s' ", 
	                    mysql_real_escape_string($itemID));
	$query_count = mysql_query($files_count);				
	$count = mysql_num_rows($query_count);
	return $count;
} 
function selectFiles($itemID){
	 db_connect();
	$query = sprintf("SELECT * FROM files WHERE files.itemID = '%s' ", 
	                    mysql_real_escape_string($itemID));
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
} 
 
function delete_last_id($itemID){
	 db_connect();
	$query = sprintf("DELETE FROM houses WHERE houses.id = '%s' ", 
	                    mysql_real_escape_string($itemID));
	$result = mysql_query($query);
	 
	return $result;
} 
function delete_by_id($type, $id){
	 db_connect();
	$query = sprintf("DELETE FROM ".$type."  WHERE ".$type.".id='%s'", 
	                    mysql_real_escape_string($id));
	$result = mysql_query($query);	 
	return $result;
}
function delete_files_by_id($itemID){
	 db_connect();
	$query = sprintf("DELETE FROM files  WHERE files.itemID='%s'", 
	                    mysql_real_escape_string($itemID));
	$result = mysql_query($query);
	return $result;
} 


///SEARCH
function search($where){
	db_connect();
	$query = "SELECT * FROM  `pages` ".$where." ORDER BY id DESC";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}
 function display_date($date){
 if($date != 0):
 $result =  strftime('%d', strtotime($date)) . " 
            ". lang(strftime('%B', strtotime($date))) . " 
            ".strftime('%Y', strtotime($date));
			else:
 $result = "";
   endif;  
   
   return $result;
 }
 
 /*PAGINATION*/
function pagination($type,$view,$page,$per_page){
	db_connect();
	$start = ($page-1)*$per_page;
	$query = "SELECT * FROM ".$type." WHERE url ='".$view."'  ORDER BY id DESC LIMIT $start, $per_page";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}
function paginationSearch($type, $view, $sm1, $sm2, $categorySelect, $garageSelect, $page, $per_page){
	db_connect();
	$start = ($page-1)*$per_page;
	$query = "SELECT * FROM ".$type." WHERE (sm BETWEEN ".$sm1." AND ".$sm2.")  ".$categorySelect."
	".$garageSelect."  ORDER BY id DESC LIMIT $start, $per_page";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}
 
function pagination_projects($page,$per_page,$best){
	db_connect();
	$start = ($page-1)*$per_page;
	$query = "SELECT * FROM houses WHERE best = '".$best."' ORDER BY id DESC LIMIT $start, $per_page ";
	$result = mysql_query($query);
	$result = db_result_to_array($result);
	return $result;
}
function getFile($id){
	db_connect();
	$query = sprintf("SELECT * FROM files WHERE files.id = '%s'", mysql_real_escape_string($id));
	$result = mysql_query($query);
	$row  = mysql_fetch_array($result);
	return $row;
} 
 
?>
