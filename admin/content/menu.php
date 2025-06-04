<div class="card">
  <div class="card-header">
    <div class="pull-left">
      <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>&amp;add">ახალის დამატება +</a></p>
    </div>
    <div class="pull-right">
      <p><a href="index.php??view=menu&amp;type=menu" class="btn btn-default">მენიუ</a></p>
    </div>
  </div>
  <div class="card-body">
    <?php display_menuitems(0, 1,'ge'); ?>
  </div>
  <div class="card-footer">&nbsp;</div>
</div>
