<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("Location: index.php"); 
    exit();
}

if (isset($_POST["username"]) && isset($_POST["password"])) {

require "config.php"; 
$manager = clear_data($_POST['username']);
$password = sha1(md5(clear_data($_POST['password'])));

if(check_user($manager,$password)){ 
	   $_SESSION['manager'] = $manager;
	  header('Location: index.php');
	  }  
	  
   

//$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters

//$password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
 
  $sql = mysql_query("SELECT id FROM users WHERE username='".$manager."' AND password='".$password."' AND url='admin' LIMIT 1");  $existCount = mysql_num_rows($sql); // count the row nums
  if ($existCount == 1) { // evaluate the count
     while($row = mysql_fetch_array($sql)){ 
        $admin_id = $row["id"];
   }
  $_SESSION["id"] = $admin_id;
  $_SESSION["manager"] = $manager;
  $_SESSION["password"] = $password;
  header("location: index.php");
  } else { echo 'That information is incorrect, try again <a href="index.php">Click Here</a>'; exit(); }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<?php include ("head.php"); ?>
</head>
<body id="LoginForm">
<div class="container">
 
  <div class="login-form">
    <div class="main-div">
      <div class="panel">
        <h2>Admin Login</h2>
       
      </div>
      <form id="Login" method="POST" action="">
        <div class="form-group">
          <input type="text" class="form-control" name="username" value="" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" value="" placeholder="Password">
        </div>
        <?php /*?><div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div><?php */?>
        <input type="submit" name="submit" id="submit" value="LOGIN" class="btn btn-primary" />
      </form>
    </div>
  </div>
</div>
</body>
</html>
