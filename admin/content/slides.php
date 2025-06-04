<div class="card">
  <div class="card-header">
    <div class="pull-left">
      <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;add">ახალის დამატება +</a></p>
    </div>
    <div class="pull-right">
      <p><a href="index.php?menu=menu" class="btn btn-default">მენიუ</a></p>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-responsive-sm table-hover table-outline">
      <thead class="thead-light">
        <tr>
          <th></th>
          <th width="10%">ID</th>
          <th width="30%">სურათი</th>
          <th width="45%">სათაური</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $pages = select_data($type,$view);
		  foreach ($pages as $item){ ?>
        <tr>
          <td></td>
          <td><?php echo $item["id"]; ?></td>
          <td><div class="avatar">
              <?php if (file_exists("../photos/" . $type . "/bear_" . $item["img"])) { ?>
              <img class="img-avatar" src="../photos/<?php echo $type; ?>/bear_<?php echo $item["img"]; ?>" />
              <?php } else { ?>
              <img src="../photos/bear_noimage.png" class="img-avatar"  />
              <?php } ?>
              <span class="avatar-status badge-success"></span> </div></td>
          <td><?php echo $item["title_ge"] ?></td>
          <td class="editors"><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;id=<?php echo $item["id"]; ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a> <a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;did=<?php echo $item["id"]; ?>" class="btn btn-default"><i class="fa fa-trash"></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">&nbsp;</div>
</div>
