<div class="card">
  <form action="" method="post">
    <div class="card-header">
      <div class="pull-left">
        <p>რედაქტირება</p>
      </div>
      <div class="pull-right">
        <p><a href="index.php?view=<?php echo $view; ?>&amp;type=<?php echo $type; ?>">დაბრუნება</a></p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-body">
      <div class="form-group">
      <div class="col-sm-4">
        <label>username</label>
        <input type="text" class="form-control form-control-sm" name="username" value="<?php echo $page_data["username"]; ?>" placeholder="username" />
      </div>
      <div class="col-sm-4">
        <label>email</label>
        <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $page_data["email"]; ?>" placeholder="username" />
      </div>
      <div class="col-sm-4">
        <label>password</label>
        
        <input type="password" name="password" class="form-control form-control-sm" value="" placeholder="password" />
      </div>
      <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="card-footer">
      <div class="form-group">
        <div class="col-sm-3 offset-sm-6">
          <input type="submit" class="btn btn-warning btn-block" value="გაუქმება" />
        </div>
        <div class="col-sm-3">
          <input type="submit" value="შენახვა" class="btn btn-success btn-block" name="doit" />
        </div>
      </div>
    </div>
  </form>
</div>
