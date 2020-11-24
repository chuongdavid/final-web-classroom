<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__. "/Database.php";


function postInput($string)
{
	return isset($_POST[$string]) ? $_POST[$string] : '';
	}

function getInput($string)
{
	return isset($_GET[$string]) ? $_GET[$string] : '';
}
function is_email_exists($email){
    $db = new Database;
    $check_email = $db -> fetchOne('user',"email = '".$email."'");  
      if(count($check_email)>0){
        return true;
      }
      else{
        return false;
      }
}
function base_url()
{
	return $url="http://localhost/Code/final-web-classroom/";
}
if (! function_exists('xss_clean')){
    function xss_clean($data)
    {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
    
            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
    
            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
    
            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
    
            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
    
            do
            {
                    // Remove really unwanted tags
                    $old_data = $data;
                    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
    
            // we are done...
            return $data;
    }
    }
function verify_email($email,$vkey){
    $mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->CharSet = 'utf-8';                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chuongddavid@gmail.com';                     // SMTP username
        $mail->Password   = 'ieibumydddhemnei';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('chuongddavid@gmail.com', 'Classroom');
        $mail->addAddress($email, 'Receiver');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Verify your account for classroom';
        $mail->Body    = "<p><a href='http://localhost/Code/final-web-classroom/public/verify.php?email=$email&vkey=$vkey'>Click here</a> to verify your classroom account.</p>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        return false;
    }
}
function send_join_request($id_student,$student_name,$id_class,$email){
    $mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->CharSet = 'utf-8';                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chuongddavid@gmail.com';                     // SMTP username
        $mail->Password   = 'ieibumydddhemnei';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('chuongddavid@gmail.com', 'Classroom');
        $mail->addAddress($email, 'Receiver');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Accept to join in your';
        $mail->Body    = "<p><a href='".base_url()."http://localhost/Code/final-web-classroom/public/verify.php'>Click here</a> to verify your classroom account.</p>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        return false;
    }
}
function reset_password($email){
    $db = new Database;
    if(!is_email_exists($email)){
        return array('code'=>1,'error'=>"Email does not exist");
    }
    $token = md5($email ."+".random_int(1000,2000));
    $exp = time() + 3600 * 24;
    $data = [
        'token' => $token,
        'expire_on' => $exp
    ];
    $db -> update('reset_token',$data,array('email' => $email));
    $email_reset = $db -> fetchOne('reset_token',"email = '".$email."'");
    if($email_reset == 0){
        $db -> insert('reset_token',array('email'=>$email,'token'=>$token,'expire_on'=>$exp));
        
    }
    $success = send_reset_password_email($email,$token);
    return array('code'=>0,'success'=> $success);
}
function send_reset_password_email($email,$token){
    $mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->CharSet = 'utf-8';                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chuongddavid@gmail.com';                     // SMTP username
        $mail->Password   = 'ieibumydddhemnei';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('chuongddavid@gmail.com', 'Classroom');
        $mail->addAddress($email, 'Receiver');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset your password for classroom';
        $mail->Body    = "<p><a href='http://localhost/Code/final-web-classroom/public/reset_pass.php?email=$email&token=$token'>Click here</a> to reset your password.</p>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        return false;
    }
}
function check_role($email){
    $db = new Database;
    $data_user =  $db -> fetchOne('user',"email = '".$email."'");
    if($data_user['role']==0){
        return 0;
    }elseif($data_user['role']==1){
        return 1;
    }
    else{
        return 2;
    }
}
 ?>