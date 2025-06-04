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
        <div class="col-sm-3">
          <label>აირჩიეთ კატეგორია </label>
          <select name="catID" class="form-control form-control-sm">
            <option value=""> - აირჩიეთ -</option>
            <?php $categories = just_data('categories');
                          foreach ($categories as $item):?>
            <option value="<?php echo $item['id']; ?>" <?php if($item['id'] == $page_data['catID']){echo 'selected';} ?>><?php echo $item['name_ge']; ?></option>
            <?php endforeach;  ?>
          </select>
        </div>
        <div class="col-sm-3">
          <label>სათაური ENG</label>
          <input class="form-control form-control-sm" type="text" name="title_en" value="<?php echo $page_data['title_en']; ?>" placeholder="სათაური ENG" />
        </div>
        <div class="col-sm-3">
          <label>სათაური RUS</label>
          <input class="form-control form-control-sm" type="text" name="title_ru" value="<?php echo $page_data['title_ru']; ?>" placeholder="სათაური RUS" />
        </div>
        <div class="col-sm-3">
          <label>სათაური GEO</label>
          <input class="form-control form-control-sm" type="text" name="title_ge" value="<?php echo $page_data['title_ge']; ?>" placeholder="სათაური GEO" />
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="col-sm-12">
        <?php $my_files = select_data_files('files',$page_data['id']);?>
        <ul class="my_gallery">
          <?php foreach($my_files as $my_item):
		  $id1 = $my_item['id'];  ?>
          <li><img src="../photos/files/bear_<?php echo $my_item['filename'];?>" alt="" height="60"> <a href="#" id="<?php echo $id1;?>" class="delete"><i class="fa fa-remove"></i></a> </li>
          <?php  endforeach; ?>
        </ul>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="form-group">
        <div class="col-sm-4">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label>მთავარი ფოტო</label></td>
              <td><?php if (file_exists('../photos/' . $type . '/bear_' . $page_data['img'])) { ?>
                <img src="../photos/<?php echo $type; ?>/bear_<?php echo $page_data['img']; ?>"  width="45" />
                <?php } ?></td>
            </tr>
            <tr>
              <td colspan="2"><input class="form-control form-control-sm" type="file" name="img" value="" /></td>
            </tr>
          </table>
          <input type="hidden" class="form-control form-control-sm" name="url" value="<?php echo $view; ?>"  />
        </div>
        <div class="col-sm-4">
          <label>სხვა სურათები</label>
          <input type="file" name="files[]" multiple class="form-control form-control-sm" accept="image/*" value="">
        </div>
        <div class="col-sm-4">
          <label>project Price</label>
          <input class="form-control form-control-sm" type="text" name="price"  value="<?php echo $page_data['price']; ?>"   />
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="col-sm-3">
          <label>Square m2</label>
          <input class="form-control form-control-sm" type="text" name="sm" value="<?php echo $page_data['sm']; ?>"/>
        </div>
        <div class="col-sm-3">
          <label>Length</label>
          <input class="form-control form-control-sm" type="text" name="length" value="<?php echo $page_data['length']; ?>"/>
        </div>
        <div class="col-sm-3">
          <label>Width</label>
          <input class="form-control form-control-sm" type="text" name="width" value="<?php echo $page_data['width']; ?>"/>
        </div>
        <div class="col-sm-3">
          <label>Building Price</label>
          <input class="form-control form-control-sm" type="text" name="co" value="<?php echo $page_data['co']; ?>"/>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="float-right"> <span> GARAGE </span>
        <div class="radio">
          <label>
            <input type="radio" name="garage" <?php if($page_data['garage']==1){echo 'checked';}?> value="1">
            Yes</label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="garage" <?php if($page_data['garage']==2){echo 'checked';}?> value="2">
            No</label>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
        <textarea class="form-control form-control-sm" rows="4" name="text_en"><?php echo $page_data['text_en']; ?></textarea>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="key_en" value="<?php echo $page_data['key_en']; ?>" placeholder="KEYWORDS" />
        </div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="desc_en" value="<?php echo $page_data['desc_en']; ?>" placeholder="DESCRIPTION" />
        </div>
         <div class="clearfix"></div>
      </div>
      <div class="form-group">
        <textarea class="form-control form-control-sm " rows="4" name="text_ru"><?php echo $page_data['text_ru']; ?></textarea>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="key_ru" value="<?php echo $page_data['key_ru']; ?>" placeholder="KEYWORDS" />
        </div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="desc_ru" value="<?php echo $page_data['desc_ru']; ?>" placeholder="DESCRIPTION" />
        </div>
         <div class="clearfix"></div>
      </div>
      <div class="form-group">
        <textarea  class="form-control form-control-sm " rows="4" name="text_ge"><?php echo $page_data['text_ge']; ?></textarea>
         <div class="clearfix"></div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="key_ge" value="<?php echo $page_data['key_ge']; ?>" placeholder="KEYWORDS" />
        </div>
        <div class="col-sm-6">
          <input class="form-control form-control-sm" type="text" name="desc_ge" value="<?php echo $page_data['desc_ge']; ?>" placeholder="DESCRIPTION" />
        </div>
         <div class="clearfix"></div>
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
      <div class="clearfix"></div>
    </div>
  </form>
</div>
<!--  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label>pdf</label></td>
              <td><?php //if (file_exists('../pdf/'. $page_data['pdf'])) { ?>
                <h3>pdf/<?php //echo $page_data['pdf']; ?></h3>
                <?php //} ?></td>
            </tr>
            <tr>
              <td colspan="2"><input class="form-control form-control-sm" type="file" name="pdf"   /></td>
            </tr>
          </table>--> 
