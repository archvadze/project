<?php if(isset($view)){ 
if(isset($_POST["update"])){ 
		$count = 0;
		foreach($_POST as $ArrKEY => $ArrSTR){
		$row[$count] = $ArrKEY;
		$data[$count] = $_POST[$ArrKEY];
		$count++;
		 }
		unset($row[$count - 1]);
	    unset($data[$count - 1]);
		$update_data = update_one($type, $view, $row, $data);
if($update_data = true){ ?>
<meta http-equiv="refresh" content="0; url=index.php?view=<?php echo $view;?>&amp;type=<?php echo $type;?>" />
<?php }else {?>
<h4 class="alert_error">დაფიქსირდა შეცდომა</h4>
<?php } } ?>
<div class="card">
  <form action="" method="post"  enctype="multipart/form-data" name="UPDATEPAGE" id="UPDATEPAGE">
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
      <?php  foreach($pages as $key){ ?>
      <div class="form-group">
        <input type="hidden" name="url" class="form-control form-control-sm" value="<?php echo $key["url"];?>" />
        <div class="col-sm-4">
          <label>ADDRESS EN</label>
          <input type="text" name="address_en" class="form-control form-control-sm" value="<?php echo $key["address_en"];?>" />
        </div>
        <div class="col-sm-4">
          <label>ADDRESS RU</label>
          <input type="text" name="address_ru" class="form-control form-control-sm" value="<?php echo $key["address_ru"];?>" />
        </div>
        <div class="col-sm-4">
          <label>ADDRESS GE</label>
          <input type="text" name="address_ge" class="form-control form-control-sm" value="<?php echo $key["address_ge"];?>" />
        </div>
        <div class="col-sm-4">
          <label>mobile</label>
          <input type="text" name="web" class="form-control form-control-sm" value="<?php echo $key["web"];?>" />
        </div>
        <div class="col-sm-4">
          <label>EMAIL</label>
          <input type="text" class="form-control form-control-sm" name="email" value="<?php echo $key["email"];?>" />
        </div>
        <div class="col-sm-4">
          <label>PHONE</label>
          <input type="text" name="phone" class="form-control form-control-sm" value="<?php echo $key["phone"];?>" />
        </div>
        <div class="clearfix"></div>
      </div>
      <?php } ?>
      <div class="clearfix"></div>
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
