<div class="card">
  <form action="" method="post" class="form pForm"  enctype="multipart/form-data">
    <div class="card-header">
      <div class="pull-left">
        <p>
          <?php if(isset($id)){?>
          რედაქტირება
          <?php }else{ ?>
          დამატება
          <?php }?>
        </p>
      </div>
      <div class="pull-right">
        <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>" >დაბრუნება</a></p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-body">
      <div class="form-group">
        <div class="col-sm-4">
          <label>სათაური ENG</label>
          <input class="form-control form-control-sm" type="text" name="name_en" value="<?php echo $page_data["name_en"]; ?>" placeholder="სათაური" />
        </div>
        <div class="col-sm-4">
          <label>სათაური RUS</label>
          <input class="form-control form-control-sm" type="text" name="name_ru" value="<?php echo $page_data["name_ru"]; ?>" placeholder="სათაური" />
        </div>
        <div class="col-sm-4">
          <label>სათაური GEO</label>
          <input class="form-control form-control-sm" type="text" name="name_ge" value="<?php echo $page_data["name_ge"]; ?>" placeholder="სათაური" />
        </div>
      </div>
    <input type="hidden" name="url" value="<?php echo $view; ?>">
      <div class="clearfix"></div>
       <hr>
      <p></p>
    </div>
    <div class="card-footer">
      <div class="form-group">
        <div class="col-sm-3 offset-sm-6">
          <input class="btn btn-warning btn-block" type="submit" value="გაუქმება" />
        </div>
        <div class="col-sm-3">
          <input type="submit" value="შენახვა" class="btn btn-success btn-block" name="doit" />
        </div>
      </div>
    </div>
  </form>
</div>
