<?php 
    $login_message = '';
    $error_message = '';
	 
    if(isset($_POST['send_register'])) {
	if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['captcha2'])){ 
	
	$login = clear_data($_POST['username']);
	$email = clear_data($_POST['email']);
	$password = clear_data($_POST['password']);
	$password2 = clear_data($_POST['password2']);
	 $captcha = clear_data($_POST['captcha']);
	 $captcha2 = clear_data($_POST['captcha2']);
	 if($captcha != $captcha2){ $error_message .= lang('antispamnot'); }
	 if($password != $password2){ $error_message .= lang('passwordnotmuch'); }
	 if(!check_login($login)){ $error_message .= lang('sameuser'); }
	 if(($password == $password2) && (check_login($login))){
		 $reg['login'] = "'".clear_data($_POST['username'])."'";
		 $reg['email'] = "'".clear_data($_POST['email'])."'";
		 $reg['password'] = "'".sha1(md5(clear_data($_POST['password'])))."'";
		 $reg['url'] = "'user'";
		 $reg['status'] = "'1'"; 
		 $reg = implode(',',$reg);
		 $register = register($reg);
		if($register = true) $error_message .= lang('successregister'); 
		 }
	  
    }else{ $error_message .= lang('allfieldsrequide'); } } 
	
	/// AUTHORISATION
	
	if(isset($_POST['send_login'])) {
	if(!empty($_POST['username']) && !empty($_POST['password'])){ 
	
	$login = clear_data($_POST['username']);
	$password = sha1(md5(clear_data($_POST['password'])));
	 
	 
	 if(check_user($login,$password)){ 
	// $error_message = "ასეთი მომხმარებლის სახელი უკვე არსებობს ბაზაში!"; 
	  $_SESSION['username'] = $login;
	  header('Location: index.php');
	  }else $login_message .= lang('youenternotright'); 
	  
     }else{ $login_message .= lang('allfieldsrequide'); }
	 } 	
	$captcha_val = captcha();
	?>
<?php if(!isset($_SESSION['username'])){ ?>
<div class="wrapper row3">
  <main class="container clear">
    <div class="group">
      <article>
        <div class="one_half first">
          <h2 class="heading center"><?php echo lang('register');?></h2>
          <?php echo $error_message;?>
          <form name="regform" id="contactform" action="" method="post">
            <ul id="comments">
              <li>
                <input name="username" type="text" placeholder="<?php echo lang('username');?>" />
              </li>
              <li>
                <input name="email" type="text"   placeholder="<?php echo lang('email');?>" />
              </li>
              <li>
                <input name="password" type="password"  placeholder="<?php echo lang('password');?>" />
              </li>
              <li>
                <input name="password2" type="password"  placeholder="<?php echo lang('password2');?>" />
              </li>
              <li>
                <input name="captcha" type="text"  readonly="readonly"  value="<?php echo $captcha_val;?>" class="captcha one_half"  />
                <input name="captcha2" type="text" class="captcha one_half" placeholder="<?php echo lang('captcha2');?>" />
              </li>
              <li>
                <div class="clear"></div>
                <input type="submit" class="mainBtn"  value="<?php echo lang('register');?>" name="send_register"  />
              </li>
            </ul>
          </form>
        </div>
        <div class="one_half">
          <h2 class="heading center"><?php echo lang('login');?></h2>
          <?php echo $login_message;?>
          <form name="loginform" id="contactform" action="" method="post">
            <ul id="comments">
              <li>
                <input name="username" type="text" placeholder="<?php echo lang('username');?>" />
              </li>
              <li>
                <input name="password" type="password"  placeholder="<?php echo lang('password');?>" />
              </li>
              <li>
                <input type="submit" class="mainBtn"  value="<?php echo lang('enter');?>" name="send_login"  />
              </li>
            </ul>
          </form>
          <!--<img src="assets/images/register.jpg" alt="" width="100%" class="avatar" />--> 
        </div>
      </article>
    </div>
  </main>
</div>
<?php } ?>
