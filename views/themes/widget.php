<?php $error_message = "";
if (isset($_POST['email'])) {
    $admin_email = get_data('users',1);
    $email_to = $admin_email['email'];
    $email_subject = "კონტაქტი";

    function died($error) {        
        echo $error . "<br />";
        //die(); 
    }
    // validation expected data exists 
if(!isset($_POST['name']) && !isset($_POST['email']) && !isset($_POST['subject']) && !isset($_POST['message'])){
        died(lang('valid_error'));
    } 
    $first_name = $_POST['name']; // required 
    $email_from = $_POST['email']; // required 
    $telephone = $_POST['subject']; // not required 
    $comments = $_POST['message']; // required
    
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (!preg_match($email_exp, $email_from)) {
        $error_message .= lang('valid_email').'<br />';
    }
    $string_exp = "/^[A-Za-zა-ჰ .'-]+$/";
    if (!preg_match($string_exp, $first_name)) {
        $error_message .=  lang('valid_name').'<br />';
    }
    if (strlen($comments) < 2) {
        $error_message .= lang('valid_send').'<br />';
    }
    
    if(empty($error_message)){ 
$error_message = lang('success');
   }
    $email_message = "ფორმის მონაცემები.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "სახელი: " . clean_string($first_name) . "\n";
    $email_message .= "ელ.ფოსტა: " . clean_string($email_from) . "\n";
    $email_message .= "სათაური: " . clean_string($telephone) . "\n";
    $email_message .= "შინაარსი: " . clean_string($comments) . "\n";
// create email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "from: " . $email_from . "\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "X-Mailer: PHP/" . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
 } ?>
<div class="widget">
  <h2 class="title">Get in touch!</h2>
  <?php if (strlen($error_message) > 0) { echo $error_message; } ?>
  <form action="" method="post">
    <input class="span4" type="text" name="name" id="name" value="<?php echo lang('yourname'); ?>" onFocus="if (this.value == '<?php echo lang('yourname'); ?>') this.value = '';" onBlur="if (this.value == '') this.value = '<?php echo lang('yourname'); ?>';" />
    <input type="text" name="subject" class="span4" value="<?php echo lang('phone'); ?>" onFocus="if (this.value == '<?php echo lang('phone'); ?>') this.value = '';" onBlur="if (this.value == '') this.value = '<?php echo lang('phone'); ?>';" />
    <input class="span4" type="text" name="email" id="email" value="<?php echo lang('youremail'); ?>" onFocus="if (this.value == '<?php echo lang('youremail'); ?>') this.value = '';" onBlur="if (this.value == '') this.value = '<?php echo lang('youremail'); ?>';" />
    <textarea name="message" id="message" class="span4" onFocus="if (this.value == '<?php echo lang('yourmessage'); ?>') this.value = '';" onBlur="if (this.value == '') this.value = '<?php echo lang('yourmessage'); ?>';" ><?php echo lang('yourmessage'); ?></textarea>
    <div class="clear"></div>
    <input type="reset" class="btn dark_btn" value="<?php echo lang('reset'); ?>" />
    <input type="submit"  name="submit" class="btn send_btn" value="<?php echo lang('send'); ?>" />
    <div class="clear"></div>
  </form>
  <!--<h2 class="title"><span>links</span></h2>
  <ul class="links">
    <li><a href="#">Lorem ipsum dolor sit amet, consectetur</a></li>
    <li><a href="#">Ut labore et dolore magna aliqua.</a></li>
    <li><a href="#">Duis aute irure dolor in reprehenderit</a></li>
    <li><a href="#">In voluptate velit esse cillum</a></li>
  </ul>--> 
</div>
<div class="widget"> 
  <!--<h2 class="title"><span>recent posts</span></h2>
  <ul class="recent_post">
    <li> <a href="#"><img src="images/img8.jpg" alt="" /></a>
      <div><a href="#">It is a long established fact that a reader will be distracted </a></div>
      16th July, 2020
      <div class="clear"></div>
    </li>
  </ul>
  <p><a href="#" class="arrow_link">Go to the portfolio</a></p>--> 
</div>
