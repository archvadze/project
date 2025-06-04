<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <h2><?php echo $menu_data['title_' . $lang]; ?></h2>
    </div>
    <div class="latest-projects">
      <?php /*?><div id="filters" class="center-holder">
        <button class="isotop-button" data-filter="*">Show all</button>
        <button class="isotop-button" data-filter=".financical">Financical</button>
        <button class="isotop-button" data-filter=".business">Business</button>
        <button class="isotop-button" data-filter=".marketing">Marketing</button>
      </div><?php */?>
      <div class="row">
        <div class="isotope-grid">
          <?php  foreach ($pages as $item){ //isotope-item ?>
          <div class="col-md-4 col-sm-6 col-xs-12  business">
            <?php if(!empty($item['img']) && $item['img'] != 'noimage.png'){ ?>
            <a href="photos/<?php echo $type; ?>/bear_<?php echo $item['img']; ?>">
            <div class="project-item">
              <div class="overlay-container"> <img src="photos/<?php echo $type; ?>/bear_<?php echo $item['img']; ?>" alt="<?php echo $item['title_' . $lang]; ?>">
                <div class="project-item-overlay">
                  <h4><?php echo $item['title_' . $lang]; ?></h4>
                </div>
              </div>
            </div>
            </a>
            <?php }else{  ?>
            <h5> * <?php echo $item['title_' . $lang]; ?></h5>
            <hr>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        <div class="clearFix"></div>
      </div>
    </div>
    
  </div>
</div>
<hr>