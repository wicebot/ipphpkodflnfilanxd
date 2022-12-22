<?php
  
  date_default_timezone_set('Europe/Istanbul');
if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check if ip is pass from proxy
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
    }
    
// Create the size of image or blank image
$image = imagecreate(600, 200);
  
// Set the background color of image
$background_color = imagecolorallocate($image, 0, 0, 0);
  
// Set the text color of image
$text_color = imagecolorallocate($image, 0, 153, 0);
  
// Function to create image which contains string.
imagestring($image, 7, 20, 15,  "Ip Adresin: ".strval($ipaddress), $text_color);
imagestring($image, 4, 20, 40,  "Tarih: ".date('d/m/y H:i:s a', time()), imagecolorallocate($image, 150, 150, 0));
imagestring($image, 4, 20, 60, "Kullanici: ".get_current_user(), $text_color);
imagestring($image, 3, 20, 80, $_SERVER['HTTP_USER_AGENT'], $text_color);

imagestring($image, 5, 280, 170, "CypTeR Sunar... illegalplatform.co", imagecolorallocate($image, 250, 0, 0));
header("Content-Type: image/png");
  
imagepng($image);
imagedestroy($image);
  
?>
