<div class="card">
<form action="" method="post" name="sss">
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
      <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>" >დაბრუნება</a>
        <label>
          <input type="checkbox" class="form-control form-control-sm" name="hidden" value="1" 
 <?php if($menu_data["hidden"]==1){?> checked="checked"<?php }?> />
          HIDDEN </label>
      </p>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="card-body">
    <div class="form-group">
      <div class="col-sm-4">
      <label>ზედა მენიუ</label>
        <select name="parent" class="form-control form-control-sm" >        
          <option value="" > - აირჩიეთ - </option>
          <?php selectMenuItemsEdit(0, 1, $lang, $menu_data["parent"]); ?>
        </select>
      </div>
      <div class="col-sm-4">
      <label>მენიუს ტიპი</label>      
        <select name="type" class="form-control form-control-sm" >
          <option > - აირჩიეთ - </option>
          <?php $menutypes = just_data('menutypes');
                          foreach($menutypes as $menutye):?>
          <option value="<?php echo $menutye['type']; ?>" <?php if($menutye['type'] == $menu_data["type"]){echo 'selected';} ?>><?php echo $menutye['title']; ?></option>
          <?php endforeach;  ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label>URL</label>
        <input type="text" name="url" class="form-control form-control-sm" value="<?php echo $menu_data["url"]; ?>" />
      </div>
      <!--<div class="col-sm-3">
        <label>TRE</label>
        <input type="text" name="tre" class="form-control form-control-sm" value="<?php echo $menu_data["tre"]; ?>"  />
      </div>-->
    </div>
    <div class="clearfix"></div>
     <hr>
    <div class="form-group">
      <div class="col-sm-4">
        <label>მენიუს სათაური ENG</label>
        <input type="text" name="title_en" class="form-control form-control-sm" value="<?php echo $menu_data["title_en"]; ?>" >
      </div>
      <div class="col-sm-4">
        <label>მენიუს სათაური RUS</label>
        <input type="text" name="title_ru" class="form-control form-control-sm" value="<?php echo $menu_data["title_ru"]; ?>" >
      </div>
      <div class="col-sm-4">
        <label>მენიუს სათაური GEO</label>
        <input type="text" name="title_ge" class="form-control form-control-sm" value="<?php echo $menu_data["title_ge"]; ?>" >
      </div>
      
    </div>
    <div class="clearfix"></div>
     <hr>
    <div class="form-group">
      <label>ENG</label>
      <fieldset >
        <textarea rows="4" name="text_en"><?php echo $menu_data['text_en']; ?></textarea>
      </fieldset>
    </div>
    <div class="form-group">
      <label>RUS</label>
      <fieldset >
        <textarea rows="4" name="text_ru"><?php echo $menu_data['text_ru']; ?></textarea>
      </fieldset>
    </div>
    <div class="form-group">
      <label>GEO</label>
      <fieldset >
        <textarea rows="4" name="text_ge"><?php echo $menu_data['text_ge']; ?></textarea>
      </fieldset>
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
