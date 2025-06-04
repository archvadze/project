<?php session_start();//print_r($_SESSION);
if(isset($_GET['yid'])){ ?>
<iframe  width="100%" height="360" 
src="https://www.youtube.com/embed/<?php echo $_GET['yid'];?>?autoplay=1&amp;rel=0&amp;controls=1&amp;info=0" 
name="youtube embed" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php }else{ //$count = count($pages); ?>
<iframe  width="100%" height="360" 
src="https://www.youtube.com/embed/<?php echo $pages[0]['yid'];?>?autoplay=1&amp;rel=0&amp;controls=1&amp;info=0" 
name="youtube embed" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } ?>
<div class="section-block">
  <div class="container">
    <div class="row">
      <?php   $i = 1; 	 
	  foreach ($pages as $item){  ?>
      <div class="col-sm-3 thumbnail">
        <div> <a href="index.php?view=<?php echo $item['url'];?>&amp;type=videos&amp;yid=<?php echo $item['yid'];?>"> <img src="http://img.youtube.com/vi/<?php echo $item['yid'];?>/0.jpg" alt="<?php echo $item['title_'.$lang];?>"> </a> </div>
        <?php if(isset($item['title_'.$lang]) && !empty($item['title_'.$lang])){ ?>
        <div class="post-content">
          <h4><a href="index.php?view=<?php echo $item['url'];?>&amp;type=videos&amp;yid=<?php echo $item['yid'];?>" > <?php echo $item['title_'.$lang];?> </a></h4>
        </div>
        <?php } ?>
      </div>
      <?php if ($i % 4 ==  0) { ?>
      <div class="clearfix"></div>
      <?php } 
	   $i++;  } ?>
    </div>
  </div>
</div>
