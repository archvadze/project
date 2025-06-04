<?php if(isset($id) && !empty($id)){
$menu_data =  get_data($type,$id); 
//update_hits($id);?>
<div class="section-block">
  <div class="container">
    <?php include('views/themes/search.php'); ?>
    <hr>
    <div class="row">
      <div class="col-sm-9">
        <div id="carousel-bounding-box">
          <div id="gallery" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php if (!empty($menu_data['img'])){ ?>
              <div class="item active" data-slide-number="0"> 
              <a href="#" class="thumb">
              <img src="photos/<?php echo $type; ?>/bear_<?php echo $menu_data['img']; ?>" alt="<?php echo $menu_data['title_' . $lang]; ?>" class="img-responsive">
              </a>
              </div>
              <?php } ?>
              <?php $i=1;  $galFiles = select_data_files('files',$menu_data['id']);
			     foreach($galFiles as $galBig){ ?>
              <div class="item" data-slide-number="<?php echo $i;?>"> 
              <a href="#" class="thumb">
              <img src="photos/files/bear_<?php echo $galBig['filename'];?>" class="img-responsive">
              </a> </div>
              <?php $i++; } ?>
            </div>
            <a class="carousel-control left" href="#gallery" data-slide="prev"><img src="../../style/img/srLeft.png"></a> <a class="carousel-control right" href="#gallery" data-slide="next"><img src="../../style/img/srRight.png"></a> </div>
        </div>
        <div id="slider-thumbs">
          <ul class="list-inline">
            <?php if (!empty($menu_data['img'])){ ?>
            <li> <a id="carousel-selector-0" data-target="#gallery" data-slide-to="0" class="selected"> <img src="photos/<?php echo $type;?>/bear_<?php echo $menu_data['img'];?>" alt="<?php echo $menu_data['title_'.$lang];?>" /> </a></li>
            <?php } ?>
            <?php $y = 1; foreach($galFiles as $gal){ ?>
            <li> <a id="carousel-selector-<?php echo $y;?>"  data-target="#gallery" data-slide-to="<?php echo $y;?>" > <img src="photos/files/bear_<?php echo $gal['filename'];?>" /> </a></li>
            <?php $y++; } ?>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="service-category-list">
          <div class="detail-heading">
            <h3><?php echo $menu_data['title_' . $lang]; ?></h3>
          </div>
          <h2> <?php echo $menu_data['sm'];?> <?php echo lang('sm');?></h2>
          <hr>
          <p><?php echo lang('proprice'); ?><div class="info"><i class="fa fa-info"></i><div class="hoverInfo"><?php echo lang('hoverinfo');?></div></div></p>
          <h3> <?php echo $menu_data['price'];?> <strong class="lari">4</strong></h3>
          
          <!--   <div class="single-broucher">
          <ul>
            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo lang('order'); ?></a>
          </ul>
        </div>-->
          <hr>
          <p><?php echo lang('preparationtime'); ?></p>
          <h4><?php echo lang('fromto'); ?></h4>
          <hr>
          <p><?php echo lang('buildhous'); ?><div class="info2"><i class="fa fa-info"></i><div class="hoverInfo2"><?php echo lang('hoverinfo2');?></div></div></p>
          <h4><?php echo $menu_data['co']; ?> <strong class="lari">4</strong></h4>
          <hr>
          <!--<div class="fb-like" data-href="http://atosaudit.ge/?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $id; ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>-->
          <div class="clearfix"></div>
          <?php //<ul> $cat = selectSameItem($menuCat['catID']); <li class="list-active-link"><a></li></ul> ?>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="text-content"> <?php echo $menu_data['text_' . $lang]; ?> </div>
    </div>
  </div>
</div>
<div class="modal fade modal-profile" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body"> </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<?php }?>
