<?php
$CONFIG = array (
  'trusted_proxies' => 
      array (
        0 => '172.0.0.0/8',
      ),
);

if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
echo '<p align="center">Client IP is: ' . $ip . '</p>';

phpinfo();
