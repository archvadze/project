<?php include("check.php"); 
$lang = 'ge'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<?php include ("head.php"); ?>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="index.php">DASHBOARD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a href="../index.php" target="_blank">საიტის ნახვა</a> </li>
      </ul>
    </div>
  </nav>
</header>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h5 class="page-header">
       
      <a class="btn btn-danger btn-block" href="index.php?view=menu&amp;type=menu"> 
      მენიუს ყველა პუნქტი</a> 
      </h5>
      <?php display_children_admin(0, 1, $lang); ?>
      <div class="list-group panel"> 
      <a href="index.php?view=categories&amp;type=categories" class="list-group-item"> &raquo; კატეგორიები</a>
      <a href="index.php?view=users&amp;type=users&amp;id=1" class="list-group-item">ადმინისტრატორი</a>
      <a href="logout.php" class="list-group-item">სისტემიდან გასვლა</a>
      </div>
    </div>
    <div class="col-sm-9">
      <?php if (isset($_GET['view'])){ include ("../admin/content/manage.php");}
    //    elseif (isset($_GET['menu'])){ include ("../admin/content/manage_menu.php");}  ?>
    </div>
  </div>
</div>
<footer class="app-footer" style="padding:10px 20px;">
  <?php include("footer.php"); ?>
</footer>
</body>
</html>
