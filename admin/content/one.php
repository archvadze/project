<?php   
if (isset($view)) {
	$one = getOne($type, $view);
	 
    if (isset($_POST['update'])) { 
	    
        if (!empty($_FILES['img']['name'])) {
            $filePath = '/photos/' . $type . '/bear_'.$one['img'];
            if (file_exists($filePath)):
             unlink($filePath);
             endif;
           $prefix = date('ymdhis');
            $fileName = $prefix . $_FILES['img']['name'];
            image_upload($type, $prefix);
        } else {
           $fileName = $one['img'];
        }
       // mysql_query("UPDATE " . $view . " SET img = '" . $fileName . "' WHERE id = '" . $id . "'");
 $update_file = mysql_query("UPDATE " . $type . " SET img = '" . $fileName . "' WHERE url = '" . $view . "'");
  
        if ($update_file = true) {
			 /*print_r($_POST);
			 exit();*/
            $count = 0;
            foreach ($_POST as $ArrKEY => $ArrSTR) {
                $row[$count] = $ArrKEY;
                $data[$count] = $_POST[$ArrKEY];
                $count++;
            }
            unset($row[$count - 1]);
            unset($data[$count - 1]);

            $update_data = update_one($type, $view, $row, $data);

            if ($update_data = true) { ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>" />
<?php } else { ?>

<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php }

  }

 } 
 
 
 ?>
<div class="card">
  <form action="" method="post"  enctype="multipart/form-data">
    <div class="card-header">
      <div class="pull-left">
        <p>რედაქტირება</p>
      </div>
      <div class="pull-right">
        <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>">დაბრუნება</a></p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-body">
    <div class="form-group">
      <div class="col-sm-4">
        <label>სათაური ENG</label>
        <input type="text" name="title_en" class="form-control form-control-sm" value="<?php echo $one['title_en']; ?>"  />
      </div>
      <div class="col-sm-4">
        <label>სათაური RUS</label>
        <input type="text" name="title_ru" class="form-control form-control-sm" value="<?php echo $one['title_ru']; ?>"  />
      </div>
      <div class="col-sm-4">
        <label>სათაური GEO</label>
        <input type="text" name="title_ge" class="form-control form-control-sm" value="<?php echo $one['title_ge']; ?>"  />
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
      <div class="col-sm-6">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label>მთავარი ფოტო</label></td>
            <td><?php if (file_exists('../photos/' . $type . '/bear_' . $one['img'])) { ?>
              <img src="../photos/<?php echo $type; ?>/bear_<?php echo $one['img']; ?>"  width="45" />
              <?php } ?></td>
          </tr>
          <tr>
            <td colspan="2"><input class="form-control form-control-sm" type="file" name="img" value="" /></td>
          </tr>
        </table>
        <input type="hidden" class="form-control form-control-sm" name="url" value="<?php echo $view; ?>"  />
      </div>
       <div class="col-sm-6">
        <label>youtube ID</label>
        <input type="text" name="youtube" class="form-control form-control-sm" value="<?php echo $one['youtube']; ?>"  />
      </div>
       
      <div class="clearfix"></div>
      <hr>
      <div class="form-group">
        <label>ENG</label>
        <fieldset >
          <textarea rows="4" class="form-control form-control-sm"  name="text_en"><?php echo $one['text_en']; ?></textarea>
        </fieldset>
      </div>
      <div class="form-group">
        <label>RUS</label>
        <fieldset >
          <textarea rows="4" class="form-control form-control-sm"  name="text_ru"><?php echo $one['text_ru']; ?></textarea>
        </fieldset>
      </div>
      <div class="form-group">
        <label>GEO</label>
        <fieldset >
          <textarea rows="4" class="form-control form-control-sm"  name="text_ge"><?php echo $one['text_ge']; ?></textarea>
        </fieldset>
      </div>
      <input type="hidden" name="url" value="<?php echo $view; ?>" />
    </div>
    <div class="card-footer">
      <div class="form-group">
        <div class="col-sm-3 offset-sm-6">
          <input type="submit" class="btn btn-warning btn-block" value="გაუქმება" />
        </div>
        <div class="col-sm-3">
          <input type="submit" class="btn btn-success btn-block" value="განახლება" name="update" />
        </div>
      </div>
    </div>
  </form>
</div>
<?php } else { ?>
<?php } ?>
