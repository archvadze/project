<?php if($view == 'logout') unset($_SESSION['username']);
//ini_set("memory_limit","64M");
//ini_set ("display_errors", "1");
//error_reporting(E_ALL ^ E_NOTICE);
/*<?php echo $web;?>/*/
$mainUrl = 'index.php?page=1';
$web = "http://".$_SERVER["HTTP_HOST"];
/*$menutypes = just_data('menutypes');
$menutypes_array = array($menutypes[0][1], 
                         $menutypes[1][1],
						 $menutypes[2][1], 
						 $menutypes[3][1], 
						 'main', 
						 'mypage',
						 'cars',
						 'hotels',
						 'tours',
						 'searchresult',
						 'logout',
						 'signup' );
if (in_array($view, $menutypes_array)){
if (in_array($type, $menutypes_array)){*/
$languages = array('ru', 'ge');
if (isset($_GET['lang'])) {
    if (in_array($_GET['lang'], $languages)) {
        $_SESSION['lang'] = $_GET['lang'];
    }
    define('lang', in_array($_SESSION['lang'], $languages) ? $_SESSION['lang'] : 'ge');
} else {
    $_SESSION['lang'] = 'ge';
}
$lang = $_SESSION['lang'];
if(isset($lang) || isset($lang)){ include('lang/'.$lang.'.php'); }
else{ include('lang/'.$_GET['lang'].'.php'); } ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
<meta name="google-site-verification" content="ECyl41cUpzTlg216H2-DoqzNlBD12lzUxco_3LUC5KI" />
<!--<meta http-equiv="refresh" content="0;url=<?php echo $mainUrl; ?>" />-->
<title>
<?php 
if(isset($_GET['edit']) || isset($_GET['id'])){
	$title = get_data($_GET['type'],$_GET['id']);
    echo $title['title_' . $lang];
}elseif(isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] != 'mypage'){
	$title = menu_data($_GET['view']);
	echo $title['title_' . $lang];
}else{  echo lang('sitetitle'); }
if($lang=='ge'){$fbLang='ka_GE';}elseif($lang=='ru'){$fbLang='ru_RU';}else{$fbLang='en_GB';} 
?>
</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="style/img/logos/logo-shortcut.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="title" content="<?php 
if(isset($edit) || isset($id)){ echo "";}
echo $menu_data['title_' . $lang]; ?>">
<?php if(empty($id)){ $result_meta = mysql_query("SELECT * FROM " . $type . " WHERE  url = '" . $view . "'"); ?>
<meta name="keywords" content="<?php
    if ($result_meta) {
        while ($result_meta_fetch = mysql_fetch_array($result_meta)) {
            if (!empty($result_meta_fetch['keywords_' . $lang])) {
                echo $result_meta_fetch['keywords_' . $lang] . ', ';
            }
        }
    }?> <?php echo $_SERVER['SERVER_NAME']; ?>">
<?php } else { ?>
<meta name="keywords" content="<?php echo $menu_data['keywords_' . $lang]; ?>">
<?php } ?>
<meta name="description" content="<?php echo $menu_data['description_' . $lang]; ?>">
<link rel="stylesheet" href="style/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="style/css/font-awesome.css" type="text/css">
<link rel="stylesheet" type="text/css" href="style/css/icomoon.css" type="text/css">
<link rel="stylesheet" href="style/css/pogo-slider.min.css" type="text/css">
<link rel="stylesheet" href="style/css/slider.css" type="text/css">
<link rel="stylesheet" href="style/css/animate.css" type="text/css">
<link rel="stylesheet" href="style/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="style/css/default.css" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="style/css/styles.css" type="text/css">
<?php $contact = getOne('contact','contact'); ?>
<?php if(isset($id)){ ?>
<meta property="fb:app_id" content="2121942204798529" />
<meta property="og:url"           content="http://proeqti.ge/?view=<?php echo $menu_data['url']; ?>&amp;type=<?php echo $type; ?>&amp;lang=<?php echo $lang; ?>&amp;id=<?php echo $id; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $menu_data['title_'].$lang; ?>" />
<meta property="og:description"   content="<?php echo $menu_data['text_'].$lang; ?>" />
<meta property="og:image"         content="http://proeqti.ge/photos/<?php echo $menu_data['url']; ?>/bear_<?php echo $menu_data['img']; ?>" />
<?php }else{ ?>
<meta property="og:url"           content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="" />
<meta property="og:description"   content="" />
<meta property="og:image"         content="http://proeqti.ge/style/img/logos/logo.png" />
<?php } ?>
</head>
<body>
<?php /*?><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=2121942204798529&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> <?php */?>
<!--<div id="preloader">
  <div class="row loader">
    <div class="loader-icon"></div>
  </div>
</div>-->
<div id="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12 left-holder">
        <ul class="top-bar-info">
          <li><i class="fa fa-globe"></i> proeqti.ge
            <?php //echo  $contact['site_title'.$lang]; ?>
          </li>
          <li><i class="fa fa-map-marker"></i> <?php echo  $contact['address_'.$lang]; ?> </li>
          <li><i class="fa fa-phone"></i> <?php echo  $contact['phone']; ?></li>
          <li><i class="fa fa-envelope-o"></i> <?php echo  $contact['email']; ?></li>
        </ul>
      </div>
      <div class="col-sm-3 col-xs-12 right-holder">
        <?php
      $params = $_GET;
        foreach ($languages as $language){
         $params["lang"] = $language;
    printf('<a href="?%s" class="top-appoinment"><img src="style/img/'.$language.'.png"'.' alt='.$language.'/></a>', http_build_query($params));
		}  ?>
      </div>
    </div>
  </div>
</div>
<header>
  <nav class="navbar navbar-default navbar-custom" data-spy="affix" data-offset-top="50">
    <div class="container">
      <div class="row">
        <div class="navbar-header navbar-header-custom">
          <button type="button" class="navbar-toggle collapsed menu-icon" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-logo" href="#"><img src="style/img/logo.png" alt="logo"></a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php display_children(0, 1, $lang); ?>
        </div>
      </div>
    </div>
  </nav>
</header>
