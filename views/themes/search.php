<form method="get" action="index.php?amount1=<?php echo $_GET['amount1']; ?>&amp;amount2=<?php echo $_GET['amount2']; ?>&amp;category=<?php echo $_GET['category']; ?>&amp;garage=<?php echo $_GET['garage']; ?>" class="form-search">
  <div class="row align-items-center justify-content-center">
    <div class="col-sm-4 pt-3">
      <div id="amount" style="border: none; text-align:center; width:100%; background-color:transparent;"></div>
      <div id="slider-range"></div>
      <input type="hidden" id="amount1" name="amount1" 
  <?php if(isset($_GET['amount1']) && !empty($_GET['amount1'])){?> value="<?php echo $_GET['amount1'];?>" <?php }else{ ?>
  value="0" <?php }?>>
      <input type="hidden" id="amount2" name="amount2"
  <?php if(isset($_GET['amount2']) && !empty($_GET['amount2'])){?> value="<?php echo $_GET['amount2'];?>" <?php }else{ ?>
  value="500" <?php }?>>   
    </div>
    <div class="col-sm-3 pt-3">
      <div class="form-group">
        <?php $cateories = just_data('categories');?>
        <select name="category" class="form-control">
          <option value=""> - <?php echo lang('select');?> <?php echo lang('categories');?> - </option>
          <?php foreach($cateories as $catItem){?>
          <option value="<?php echo $catItem['id'];?>" <?php if($catItem['id']== $_GET['category']){?>selected<?php }?>><?php echo $catItem['name_'.$lang];?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-sm-3 pt-3">
      <div class="form-group">
        <select name="garage" class="form-control">
          <option value=""> - <?php echo lang('select');?> <?php echo lang('garage');?> - </option>
          <option value="1" <?php if($_GET['garage']==1){?>selected<?php }?>><?php echo lang('with_garage');?></option>
          <option value="2" <?php if($_GET['garage']==2){?>selected<?php }?>><?php echo lang('without_garage');?></option>
        </select>
      </div>
    </div>
     <input type="hidden" name="lang" value="<?php echo $lang; ?>"/>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary btn-block send_btn" ><?php echo lang('search'); ?></button>
    </div>
  </div>
</form>
