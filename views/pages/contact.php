
<?php
$error_message = "";

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
        $error_message .=  '<span class="alert alert-danger">'.lang('valid_email').'<br />';
    }
    $string_exp = "/^[A-Za-zა-ჰ .'-]+$/";
    if (!preg_match($string_exp, $first_name)) {
        $error_message .=  '<span class="alert alert-danger">'.lang('valid_name').'</span><br />';
    }
    if (strlen($comments) < 2) {
        $error_message .= '<span class="alert alert-warning">'.lang('valid_send').'</span><br />';
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
    $email_message .= "ტელეფონი: " . clean_string($telephone) . "\n";
    $email_message .= "შინაარსი: " . clean_string($comments) . "\n";
// create email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "from: " . $email_from . "\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "X-Mailer: PHP/" . phpversion();
    $sender = mail($email_to, $email_subject, $email_message, $headers);
	 
  } ?>
<div class="partner-section-grey">
  <div class="container" >
    <div class="contact-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 contact-icon">
          <div class="icon-box"> <i class="icon-phone-reciever"></i> </div>
          <h4><?php echo lang('phone'); ?></h4>
          <p> <?php echo $contact['phone']; ?></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 contact-icon">
          <div class="icon-box"> <i class="icon-map-location"></i> </div>
          <h4><?php echo lang('address'); ?></h4>
          <p><?php echo $contact['address_'.$lang]; ?></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 contact-icon">
          <div class="icon-box"> <i class="icon-chat-bubbles"></i> </div>
          <h4><?php echo lang('email'); ?></h4>
          <p><?php echo $contact['email']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <h2><?php echo lang('contactform'); ?></h2>
    </div>
    <div class="row mt-70">
      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
        <?php if (strlen($error_message) > 0) { echo $error_message; } ?>
        <form method="post" class="primary-form" action="">
          <div class="col-xs-4">
            <input type="text" name="name" placeholder="<?php echo lang('yourname'); ?>">
          </div>
          <div class="col-xs-4">
            <input type="email" name="email" placeholder="<?php echo lang('youremail'); ?>">
          </div>
          <div class="col-xs-4">
            <input type="text" name="subject" placeholder="<?php echo lang('yourphone'); ?>">
          </div>
          
          <div class="col-xs-12">
            <textarea name="message" placeholder="<?php echo lang('yourmessage'); ?>"></textarea>
          </div>
          <div class="center-holder">
            <button type="submit" class="button button-primary mt-30"><?php echo lang('send'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <div id="map"> 
 <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1h5ZXKmjxxTXDftWOK3NDi9N0Oy3SL-cC" width="100%" height="380"></iframe>
 
</div> 
