<?php
if ($_GET["menu"] == "new") {
	$error = '';
    if(isset($_POST["insert"])) {
	  if(empty($_POST["type"])) $error .= 'აირჩიეთ მენიუს ტიპი. ';
	  if(empty($_POST["title_ge"])) $error .= 'მენიუს სათაური ქართულად. ';
	  if(empty($_POST["url"])) $error .= 'URL ცარიელია. ';
	  if(empty($error)){
       $m_url =  $_POST['url'];
	   $m_cat =  $_POST['catID'];
        //$time = time();
      //  $m_url = translate($_POST['title_en']) . $time;
        $m_type = $_POST["type"];
        $count = 0;
        foreach ($_POST as $ArrKEY => $ArrSTR) {
            $row[$count] = $ArrKEY;
            $data[$count] = "'" . $_POST[$ArrKEY] . "'";
            $count++;
        }
//        if ($count > 0) {
//            $row[$count] = 'url';
//            $data[$count] = "'" . $m_url . "'";
//        }
        unset($row[$count - 1]);
        unset($data[$count - 1]);

        if ($m_type == "one") {
            mysql_query("INSERT INTO one(url,catID) VALUES('".$m_url."','".$m_cat."')") or die(mysql_error());
        } elseif ($m_type == "contact") {
            mysql_query("INSERT INTO contact(url) VALUES('" . $m_url . "')") or die(mysql_error());
        } else {
            
        }
     
        insert_menu($row, $data); 
        if ($insert_menu = true) {  ?>
<meta http-equiv="refresh" content="0; url=index.php?menu=<?php echo $view; ?>" />
<?php } else { ?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php } }else{ echo '<h4 class="alert_error">დაფიქსირდა შეცდომა: '.$error.'</h4>';}  
    } ?>
<form action="" method="post" >
  <article class="module ">
    <header>
      <h3 style="float:left">მენიუს ახალი პუნქტი</h3>
      <div class="submit_link"> <a href="index.php?menu=<?php echo $view; ?>" >
        <input  type="button" class="alt_btn" value="დაბრუნება">
        </a>
        <input type="checkbox" name="hidden" value="1" />
        HIDDEN </div>
    </header>
    <div class="module_content">
      <fieldset class="width_quarter" >
        <select name="parent">
          <option value="0" >აირჩიეთ ზედა მენიუ </option>
          <?php selectMenuItems(0, 1,'ge'); ?>
        </select>
      </fieldset>
      <fieldset class="width_quarter" >
        <select name="type">
          <option value="">აირჩიეთ მენიუს ტიპი </option>
          <?php $menutypes = just_data('menutypes');
                          foreach ($menutypes as $menutye):?>
          <option value="<?php echo $menutye['type']; ?>" ><?php echo $menutye['title']; ?></option>
          <?php endforeach;  ?>
        </select>
      </fieldset>
      <fieldset class="width_quarter" >
        <input type="text" name="url" value="" placeholder="url" />
      </fieldset>
      <fieldset class="width_quarter" >
        <input type="text" name="tre" value="" placeholder="COLUMN" />
      </fieldset>
      <div class="clear"></div>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური ENG</label>
        <input type="text" name="title_en" value="" >
      </fieldset>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური RUS</label>
        <input type="text" name="title_ru" value="" >
      </fieldset>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური GEO</label>
        <input type="text" name="title_ge" value="" >
      </fieldset>
      <fieldset class="width_quarter" >
        <label>კატეგორია</label>
        <select name="catID">
          <option value="">აირჩიეთ კატეგორია </option>
          <?php $categories = just_data('categories');
                          foreach ($categories as $item):?>
          <option value="<?php echo $item['id']; ?>" ><?php echo $item['name_ge']; ?></option>
          <?php endforeach;  ?>
        </select>
      </fieldset>
      <div class="clear"></div>
      <div class="width_3">
        <label>ENG</label>
        <fieldset >
          <textarea rows="4" name="text_en"></textarea>
        </fieldset>
      </div>
      <div class="width_3">
        <label>RUS</label>
        <fieldset >
          <textarea rows="4" name="text_ru"></textarea>
        </fieldset>
      </div>
      <div class="width_3">
        <label>GEO</label>
        <fieldset >
          <textarea rows="4" name="text_ge"></textarea>
        </fieldset>
      </div>
      <div class="clear"></div>
    </div>
    <footer>
      <div class="submit_link">
        <input type="submit" value="გაუქმება">
        <input type="submit" value="შენახვა" class="alt_btn" name="insert">
      </div>
    </footer>
  </article>
</form>
<?php
}elseif ($_GET["menu"] == "delete") {
    if (isset($_POST["delete"])) {
     $deleteA = mysql_query("DELETE FROM `" . $type . "` WHERE url ='" . $_POST["url"] . "'") or die(mysql_error());
        if ($deleteA = true)
            $deleteB = mysql_query("DELETE FROM menu WHERE id='" . $_GET["id"] . "'") or die(mysql_error());
        if ($deleteA = true) {         ?>
<meta http-equiv="refresh" content="0; url=index.php?menu=<?php echo $view; ?>" />
<?php } else { ?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php }
    } ?>
<form action="" method="post" name="DELETE" >
  <article class="module ">
    <header>
      <h3>დარწმუნებული ხართ, რომ გსურთ ამ ჩანაწერს წაშლა?</h3>
      <div class="submit_link"> <a href="index.php?menu=<?php echo $view; ?>" >
        <input  type="button" class="alt_btn" value="დაბრუნება">
        </a> </div>
    </header>
    <footer>
      <div class="submit_link">
        <?php $url_select = mysql_query("SELECT url FROM `menu` WHERE id = '" . $_GET["id"] . "' ");
    $url_row = mysql_fetch_array($url_select);   ?>
        <input type="hidden" name="url" value="<?php echo $url_row["url"]; ?>" >
        <input type="submit" value="წაშლა" class="alt_btn" name="delete">
      </div>
    </footer>
  </article>
  <!-- end of post new article -->
</form>
<?php
} elseif ($_GET["menu"] == "update") {
// $_SESSION["parent"] = $menu_data["parent"];
// $_SESSION["url"] = $menu_data["url"];
    if (isset($_POST["update"])) {
       $count = 0;
        foreach ($_POST as $ArrKEY => $ArrSTR) {
            $row[$count] = $ArrKEY;
            $data[$count] = $_POST[$ArrKEY];
//if($row[$count] == 'url') {			
//			$time = time();
//	        $data[$count] = translate($_POST['title']).$time;
// $postURL = $menu_data["url"];
//$update_page_url = mysql_query("UPDATE ".$type." SET url ='".$data[$count]." WHERE url ='".$postURL."' ") or die(mysql_error());
// } 
           $count++;
        }
       unset($row[$count - 1]);
        unset($data[$count - 1]);
        $update_menu = update_menu($id, $row, $data);
  if ($update_menu = true) {            ?>
<meta http-equiv="refresh" content="0; url=index.php?menu=<?php echo $view; ?>" />
<?php }
    } ?>
<form action="" method="post" name="sss">
  <article class="module ">
    <header>
      <h3 style="float:left">მენიუს პუნქტის რედაქტირება</h3>
      <div class="submit_link"> <a href="index.php?menu=menu" >
        <input  type="button" class="alt_btn" value="დაბრუნება">
        </a>
        <input type="checkbox" name="hidden" value="1" 
 <?php if($menu_data["hidden"]==1){?> checked="checked"<?php }?> />
        HIDDEN </div>
    </header>
    <div class="module_content">
      <fieldset class="width_quarter" >
        <select name="parent">
          <option value="0" >აირჩიეთ ზედა მენიუ</option>
          <?php selectMenuItemsEdit(0, 1, $lang, $menu_data["parent"]); ?>
        </select>
      </fieldset>
      <fieldset class="width_quarter" >
        <select name="type">
          <option >აირჩიეთ მენიუს ტიპი </option>
          <?php $menutypes = just_data('menutypes');
                          foreach($menutypes as $menutye):?>
          <option value="<?php echo $menutye['type']; ?>" <?php if($menutye['type'] == $menu_data["type"]){echo 'selected';} ?>><?php echo $menutye['title']; ?></option>
          <?php endforeach;  ?>
        </select>
      </fieldset>
      <fieldset class="width_quarter" >
        <input type="text" name="url"  value="<?php echo $menu_data["url"]; ?>" />
      </fieldset>
      <fieldset class="width_quarter" >
        <input type="text" name="tre" value="<?php echo $menu_data["tre"]; ?>"  />
      </fieldset>
      <div class="clear"></div>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური ENG</label>
        <input type="text" name="title_en" value="<?php echo $menu_data["title_en"]; ?>" >
      </fieldset>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური RUS</label>
        <input type="text" name="title_ru" value="<?php echo $menu_data["title_ru"]; ?>" >
      </fieldset>
      <fieldset class="width_quarter" >
        <label>მენიუს სათაური GEO</label>
        <input type="text" name="title_ge" value="<?php echo $menu_data["title_ge"]; ?>" >
      </fieldset>
      <fieldset class="width_quarter" >
        <select name="catID">
          <option value="">აირჩიეთ კატეგორია </option>
          <?php $categories = just_data('categories');
                          foreach ($categories as $item):?>
          <option value="<?php echo $item['id']; ?>" <?php if($item['id'] == $menu_data["catID"]){echo 'selected';} ?>><?php echo $item['name_ge']; ?></option>
          <?php endforeach;  ?>
        </select>
      </fieldset>
      <div class="clear"></div>
      <div class="width_3">
        <label>ENG</label>
        <fieldset >
          <textarea rows="4" name="text_en"><?php echo $menu_data['text_en']; ?></textarea>
        </fieldset>
      </div>
      <div class="width_3">
        <label>RUS</label>
        <fieldset >
          <textarea rows="4" name="text_ru"><?php echo $menu_data['text_ru']; ?></textarea>
        </fieldset>
      </div>
      <div class="width_3">
        <label>GEO</label>
        <fieldset >
          <textarea rows="4" name="text_ge"><?php echo $menu_data['text_ge']; ?></textarea>
        </fieldset>
      </div>
      <div class="clear"></div>
    </div>
    <footer>
      <div class="submit_link">
        <input type="submit" value="გაუქმება">
        <input type="submit" value="რედაქტირება" class="alt_btn" name="update">
      </div>
    </footer>
  </article>
</form>
<?php } elseif ($_GET["menu"] == "menu") { ?>
<article class="module ">
  <header>
    <h3 class="tabs_involved" style="color: #093"> <a href="index.php?menu=new">ახალი პუნქტი +</a> </h3>
    <div class="submit_link"> <a href="index.php?menu=menu">
      <input type="button" value="კონტენტი" class="alt_btn" >
      </a> </div>
  </header>
  <div class="tab_container" style="clear:both;">
    <div id="tab1" class="tab_content">
      <table class="tablesorter" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td ><?php display_menuitems(0, 1,'ge'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</article>
<?php } ?>
