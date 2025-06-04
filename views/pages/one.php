<?php if ($type == 'one'){ 
 $onPage = getOne($type,$view);?>
<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 mb-30">
       <?php if (!empty($onPage['img'])){ ?>
        <img  src="photos/<?php echo $type; ?>/bear_<?php echo $onPage['img']; ?>" alt="<?php echo $onPage['title_' . $lang]; ?>">
        <?php } ?>
        <hr>
        
        <div class="single-broucher">
          <?php  if (!empty($onPage['youtube'])){ ?>
          <iframe width="100%" height="160" src="https://www.youtube.com/embed/<?php echo $onPage['youtube']; ?>"></iframe>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="detail-heading">
          <h2><?php echo $onPage['title_' . $lang]; ?></h2>
        </div>
        <div class="text-content"> <?php echo $onPage['text_' . $lang]; ?>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php  } ?>
<?php  //include('views/themes/widget.php'); ?>
