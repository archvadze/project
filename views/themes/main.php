<?php include('views/themes/header.php'); ?>
<?php if ($view == 'projects' && !isset($_GET['id'])){ ?>
<?php //include('views/themes/slides.php'); ?>
<div class="section-block-grey">
  <div class="container">
    <div class="row">
      <?php include('views/themes/search.php'); ?>
      <!-- <div class="section-heading center-holder"><h2><?php echo lang('latestProjects'); ?></h2></div>-->
      <?php //echo $menu_data['title_' . $lang]; ?>
      <?php //echo $menu_data['text_' . $lang]; ?>
      <?php 
if(!isset($_GET['page'])) { $_GET['page'] = 1; }
$per_page = 9; 
if(isset($_GET['amount1'])){	
unset($_SESSION['pages_count']);
	  /*echo $_GET['amount2'];
	  echo $_GET['category'];
	  echo $_GET['garage'];*/ 
	
	  if(empty($_GET['amount1'])){$sm1 = 1; }
	    else{$sm1 = $_GET['amount1']; }
	  if(empty($_GET['amount2'])){ $sm2 = 500; }
	    else{$sm2 = $_GET['amount2']; }
	  if(empty($_GET['category'])){ $categorySelect = " "; }
	    else{ $categorySelect =  " AND catID = '".$_GET['category']."' "; }
	  if(empty($_GET['garage'])){ $garageSelect = " "; }
	    else{ $garageSelect =  " AND garage = '".$_GET['garage']."' "; }
	 
	$select_table = "SELECT * FROM pages WHERE (sm BETWEEN ".$sm1." AND ".$sm2.") ".$categorySelect."
	".$garageSelect." AND url ='projects'";
	$variable = mysql_query($select_table) or die(mysql_error());
	$count = mysql_num_rows($variable);
	$pages_count = $_SESSION['pages_count'] = ceil($count/$per_page); 
   $page_list = paginationSearch('pages', 'projects', $sm1, $sm2, $categorySelect, $garageSelect, $_GET['page'], $per_page);
}else{
    $select_table = "SELECT * FROM pages WHERE url ='projects' ";
	$variable = mysql_query($select_table) or die(mysql_error());
	$count = mysql_num_rows($variable);
	$pages_count = ceil($count/$per_page); 
	unset($_SESSION['pages_count']);
    $page_list =  pagination('pages', 'projects', $_GET['page'], $per_page);
}
?>
      <?php $y =1;  foreach($page_list as $item){ ?>
      <div class="col-sm-4">
        <div class="service-block">
          <div class="upDataLeft">
            <h4><a href="?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $item['id']; ?>"><?php echo $item['title_' . $lang]; ?></a></h4>
          </div>
          <div class="upDataRight">
            <h4> <?php echo $item['sm'];?> <?php echo lang('sm');?></h4>
          </div>
          <?php if (!empty($item['img'])){ ?>
          <a href="?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $item['id']; ?>"><img  src="photos/<?php echo $type; ?>/bear_<?php echo $item['img']; ?>" alt="<?php echo $item['title_' . $lang]; ?>"></a>
          <?php }else{ ?>
          <a href="?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $item['id']; ?>"><img  src="photos/bear_noimage.png" alt="<?php echo $item['title_' . $lang]; ?>"></a>
          <?php } ?>
          <div class="inner-padd clearfix">
            <div class="service-block-content">
              <table class="table">
                <tr>
                  <td><i class="fa fa-th-large"></i> <?php echo lang('dimensions'); ?></td>
                  <td><?php echo $item['length'];?> X <?php echo $item['width'];?> <?php echo lang('sm'); ?></td>
                </tr>
                <tr>
                  <td><i class="fa fa-tags"></i> <?php echo lang('proprice'); ?></td>
                  <td><?php echo  $item['price'];?> <strong class="lari">4</strong></td>
                </tr>
                <tr>
                  <td><i class="fa fa-home"></i> <?php echo lang('buildhous'); ?></td>
                  <td><?php echo  $item['co'];?> <strong class="lari">4</strong></td>
                </tr>
              </table>
              <?php /*if($item['url']=='massmedia' || $item['url']=='publications'){ ?>
        <!--<p> <?php echo display_date($item['date']); ?> </p>-->
        <?php }else{ echo str_front($item['text_' . $lang], 50); }*/  ?>
            </div>
            <!--<div class="service-block-icon"> <a href="?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $item['id']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a> </div>--> 
          </div>
        </div>
      </div>
      <?php if($y % 3 == 0){?>
      <div class="clearfix"></div>
      <?php } ?>
      <?php $y++; }  ?>
      <div class="clearfix"></div>
      <div class="row text-center">
        <ul class="pagination"  id="paginate">
          <?php if(isset($_SESSION['pages_count']) && !empty($_SESSION['pages_count'])){
			   $pages_count = $_SESSION['pages_count'];
			   if($pages_count > 1){ 
           for ($i = 1; $i <= $pages_count; $i++) {  ?>
          <li <?php if($_GET['page']==$i){?> class="active" <?php }?> > <a href="index.php?amount1=<?php echo $_GET['amount1']; ?>&amp;amount2=<?php echo $_GET['amount2']; ?>&amp;category=<?php echo $_GET['category']; ?>&amp;garage=<?php echo $_GET['garage']; ?>&amp;lang=<?php echo $lang;?>&amp;page=<?php echo $i;?>"  class="paging" > <?php echo $i; ?> </a> </li>
          <?php  }  }
			    } else{				  
        if($pages_count > 1){ 
           for ($i = 1; $i <= $pages_count; $i++) {  ?>
          <li <?php if($_GET['page']==$i){?> class="active" <?php }?> > <a href="index.php?view=projects&amp;type=pages&amp;lang=<?php echo $lang;?>&amp;page=<?php echo $i;?>"  class="paging" > <?php echo $i; ?> </a> </li>
          <?php  }  } } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php /*?><div class="partner-section-grey">
  <div class="container">
    <div class="section-heading center-holder">
      <h2><?php echo lang('partners'); ?></h2>
    </div>
    <div class="owl-carousel owl-theme partners wow fadeInLeft" id="our-partners">
      <?php $mainPartners = select_data('pages','partners'); 
       $d = 1; foreach($mainPartners as $part){ ?>
      <div class="item"> <img src="photos/pages/bear_<?php echo $part['img']; ?>" alt="<?php echo $part['title_'.$lang]; ?>"> </div>
      <?php  $d++;  } ?>
    </div>
  </div>
</div><?php */?>
<?php }else{ ?>
<?php if(!empty($type)) { include('views/pages/'.$type.'.php'); } ?>
<?php } ?>
<?php include('views/themes/footer.php'); ?>
