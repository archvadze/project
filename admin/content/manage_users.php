<?php if($view == "users"){
 
if(isset($_POST["update"])){ 
if(isset($_POST['password']) && !empty($_POST['password'])){
	      $user_username = clear_data($_POST['username']);
          $user_email = clear_data($_POST['email']);
		  $user_password = sha1(md5(clear_data($_POST['password'])));
	      $update_user = mysql_query("UPDATE `users` SET  username = '".$user_username."', password = '".$user_password."', email = '".$user_email."' WHERE id = '".$_SESSION['id']."'");
		// print_r($user_up);
  if($update_user) { 
  unset($_SESSION['manager']); ?>
  <meta http-equiv="refresh" content="0; url=index.php?view=users&amp;type=users&id=1&lang=ge" /> <?php } }
  else{ echo  "<h1 style='text-align:center;'>PASSWORD REQUID</h1>"; }}	 ?>
 
<?php $this_data = get_data('users', $_SESSION['id']); ?>
<form action="" method="post" name="user">
  <article class="module ">
    <header>
      <h3 style="float:left">საიტის ადმინისტრატორის რედაქტირება</h3>
      <div class="submit_link"> <a href="index.php?menu=menu" >
        <input  type="button" class="alt_btn" value="დაბრუნება">
        </a> </div>
    </header>
    <div class="module_content">
      <fieldset  >
        <label>username</label>
        <input type="text" name="username" value="<?php echo $this_data["username"];?>" >
      </fieldset>
      <fieldset  >
        <label>EMAIL (info@yoursite.com)</label>
        <input type="email" name="email" value="<?php echo $this_data["email"];?>" >
      </fieldset>
      <fieldset  >
        <label>password</label>
        <input type="password" name="password" value="" >
      </fieldset>
      <div class="clear"></div>
    </div>
    <footer>
      <div class="submit_link">
        <input type="submit" value="გაუქმება">
        <input type="submit" value="რედაქტირება" class="alt_btn" name="update">
      </div>
    </footer>
  </article>
   
</form>
<?php } ?>
