<?php $slideshow = select_data_asc('slides', 'slides'); ?>
<div class="pogoSlider" id="js-main-slider">
  <?php foreach ($slideshow as $item){ ?>
  <div class="pogoSlider-slide" data-transition="fade" data-duration="1000" style="background-image:url('photos/slides/bear_<?php echo $item['img']; ?>');">
    <div class="container">
      <div class="slider-content">
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12">
            <h2 class="pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500"><?php echo $item['title_' . $lang]; ?></h2>
            <div class="pogoSlider-slide-element hidde" data-in="slideRight" data-out="slideUp" data-duration="750" data-delay="900"><?php echo $item['text_' . $lang]; ?></div>
           <?php /*?> <?php if(!empty($item['link'])){ ?>
            <a href="<?php  echo $item['link']; ?>" class="button-lg button-primary mt-30 pogoSlider-slide-element"  data-in="slideRight" data-out="slideDown" data-duration="1150" data-delay="500" target="_blank"><?php echo lang('readmore'); ?></a>
            <?php } ?><?php */?></div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
