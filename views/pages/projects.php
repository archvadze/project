<?php if(isset($id) && !empty($id)):

$menu_data =  get_data($type,$id); ?>

<div class="single_coloum">
  <h2 class="title"> <?php echo $menu_data['title_' . $lang]; ?></a> </h2>
  <h3><?php echo lang('donor'); ?> - <?php echo $menu_data['donor_' . $lang]; ?></h3>
  <h3><?php echo lang('amount'); ?> - <?php echo $menu_data['amount']; ?></h3>
  <h3><?php echo lang('duration'); ?> - <?php echo $menu_data['duration']; ?></h3>
  <?php echo $menu_data['text_' . $lang]; ?> </div>
<?php if($menu_data['img'] != 'noimage.png'){ ?>
<div id="attachments">
  <ul>
    <?php $hose_images = select_files($menu_data['id']); ?>
    <?php  foreach($hose_images as $item): ?>
    <li><a target="_blank" href="photos/files/bear_<?php echo $item['filename']; ?>"> <img src="photos/files/bear_<?php echo $item['filename']; ?>" class="borderedbox" alt="<?php echo $menu_data['title_' . $lang]; ?>" /></a></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php } ?>
<?php else: ?>
<h2 class="title"><?php echo $menu_data['title_'.$lang]; ?></h2> 
<div class="single_coloum"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="project_table">
    <thead>
      <tr>
        <th width="40%"><?php echo lang('project'); ?></th>
        <th width="25%"><?php echo lang('donor'); ?></th>
        <th width="10%"><?php echo lang('year'); ?></th>
        <th width="10%"><?php echo lang('amount'); ?></th>
        <th width="15%"><?php echo lang('status'); ?></th>
      </tr>
    </thead>
    <tbody>
<?php
    $per_page = 24; 
    $select_table = "SELECT * FROM projects  ORDER BY id DESC ";
	$variable = mysql_query($select_table) or die(mysql_error());
	$count = mysql_num_rows($variable);
	$pages_count = ceil($count/$per_page); ?>
<script type="text/javascript">
        $(document).ready(function() {
		   function Display_Load(){
               $("#load").fadeIn(1000, 0);
                 $("#load").html(""); }
                                    function Hide_Load(){ $("#load").fadeOut('slow');}
                                    $("#paginate li:first").css({'color': '#C00'}).css({'border': '1px solid #C00'});
                                    Display_Load();
                                    $("#content").load("ajax_projects.php?page=1", Hide_Load());
                                    $("#paginate li").click(function() {
                                        Display_Load();
                                        $("#paginate li")
                                                .css({'border': '1px solid #f5f5f5'})
                                                .css({'color': '#000'});
                                        $(this)
                                                .css({'color': '#C00'})
                                                .css({'border': 'none'});
                                        var pageNum = this.id;
                                        $("#content").load("ajax_projects.php?page=" + pageNum, Hide_Load());
                                    });
                                });
     </script>
<tbody id="content"></tbody>
 
<tfoot class="link" align="center">
 <tr>
        <td colspan="5"> <ul id="paginate">
    <?php if($pages_count > 1){?>
   
    <?php  for ($i = 1; $i <= $pages_count; $i++) { 
	echo '<li id="' . $i . '">' . $i . '</li>';
	} ?>
   
    <?php } ?>
  </ul>
  </td>
      </tr>
</tfoot>
 
</table>
 
<div id="load" align="center" ></div>
</div>
<?php endif; ?>
