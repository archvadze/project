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
          <input class="form-control form-control-sm" type="text" name="title_en" value="<?php echo $page_data["title_en"]; ?>" placeholder="სათაური" />
        </div>
        <div class="col-sm-4">
          <label>სათაური RUS</label>
          <input class="form-control form-control-sm" type="text" name="title_ru" value="<?php echo $page_data["title_ru"]; ?>" placeholder="სათაური" />
        </div>
        <div class="col-sm-4">
          <label>სათაური GEO</label>
          <input class="form-control form-control-sm" type="text" name="title_ge" value="<?php echo $page_data["title_ge"]; ?>" placeholder="სათაური" />
        </div>
      </div>
      <!-- <div class="clear"></div>
      <div class="width_full">
        <?php $my_files = select_data_files('files',$page_data['id']);?>
        <ul class="my_gallery">
          <?php foreach($my_files as $my_item): ?>
          <li><img src="../photos/files/bear_<?php echo $my_item['filename'];?>" alt="" height="50"></li>
          <?php  endforeach; ?>
        </ul>
      </div>-->
      <div class="clearfix"></div>
       <hr>
      <div class="form-group">
        <div class="col-sm-6">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label>მთავარი ფოტო</label></td>
              <td><?php if (file_exists("../photos/" . $type . "/bear_" . $page_data["img"])) { ?>
                <img src="../photos/<?php echo $type; ?>/bear_<?php echo $page_data["img"]; ?>"  width="45" />
                <?php } ?></td>
            </tr>
            <tr>
              <td colspan="2"><input class="form-control form-control-sm" type="file" name="img" value="" /></td>
            </tr>
          </table>
          <input type="hidden" class="form-control form-control-sm" name="url" value="<?php echo $view; ?>"  />
        </div>
        <div class="col-sm-6">
          <label>ბმული</label>
          <input class="form-control form-control-sm" type="text" name="link"  value="<?php echo $page_data["link"]; ?>" placeholder="http://bear.ge"  />
        </div>
      </div>
      
       <div class="clearfix"></div>
      <hr>
      <div class="form-group">
        <label>ENG</label>
        <textarea class="form-control form-control-sm" rows="4" name="text_en"><?php echo $page_data['text_en']; ?></textarea>
      </div>
      <div class="form-group">
        <label>RUS</label>
        <textarea class="form-control form-control-sm" rows="4" name="text_ru"><?php echo $page_data['text_ru']; ?></textarea>
      </div>
      <div class="form-group">
        <label>GEO</label>
        <textarea  class="form-control form-control-sm" rows="4" name="text_ge"><?php echo $page_data['text_ge']; ?></textarea>
      </div>
      <div class="clearfix"></div>
       <hr>

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
