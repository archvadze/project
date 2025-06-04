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
          
          <input class="form-control form-control-sm" type="text" name="title_en" value="<?php echo $page_data["title_en"]; ?>" placeholder="სათაური ENG" />
        </div>
        <div class="col-sm-4">
          
          <input class="form-control form-control-sm" type="text" name="title_ru" value="<?php echo $page_data["title_ru"]; ?>" placeholder="სათაური RUS" />
        </div>
        <div class="col-sm-4">
          
          <input class="form-control form-control-sm" type="text" name="title_ge" value="<?php echo $page_data["title_ge"]; ?>" placeholder="სათაური GEO" />
        </div>
      </div>
      
      <div class="clearfix"></div>
       <hr>
      <div class="form-group">
        <div class="col-sm-6">
           <label>YOUTUBE ID</label>
           <input class="form-control form-control-sm" type="text" name="yid" value="<?php echo $page_data["yid"]; ?>" />  
          <input type="hidden" class="form-control form-control-sm" name="url" value="<?php echo $view; ?>"  />
        </div>
        
      </div>
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
