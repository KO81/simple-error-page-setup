<?php
function isHttps(){
    if (array_key_exists("HTTPS", $_SERVER) && 'on' === $_SERVER["HTTPS"]) {
        $prot='https://';return true;
    }
    if (array_key_exists("SERVER_PORT", $_SERVER) && 443 === (int)$_SERVER["SERVER_PORT"]) {
        $prot='https://';return true;
    }
    if (array_key_exists("HTTP_X_FORWARDED_SSL", $_SERVER) && 'on' === $_SERVER["HTTP_X_FORWARDED_SSL"]) {
        $prot='https://';return true;
    }
    if (array_key_exists("HTTP_X_FORWARDED_PROTO", $_SERVER) && 'https' === $_SERVER["HTTP_X_FORWARDED_PROTO"]) {
      $prot='https://';return true;
    }
    $prot='http://';return false;
}
if (isset($_GET["error"])) {
  $img =  $_GET["error"];
  if(isHttps() === false) {$ttt = "<p style='color:white;text-align:center;'>you're geting here, because of the wrong protocol.</p><hr>";} else {$ttt = '';};
  $newhtml = '<!doctype html>
              <html><head><title>KO81 Error "'.$img.'"</title></head>
              <body style="background-color:black">
              <h1 style="color:white;text-align:center;">KO81 Error page</h1>
              <br>
              <hr>
              <p style="color:white;text-align:center;">there was an '.$img.' error during page load</p>
              <hr>'.$ttt.'
              <img src="source/b/error/img/'.$img.'.jpg" style="width:100%;height:100%;margin:auto auto;"/>
              </body>
              </html>';
  print($newhtml);
  die('Direct access not permitted');
}
if(isHttps() === false) {
  $uri = $_SERVER['REQUEST_URI'];
  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $input = array("300", "301", "302", "303", "304", "307", "308", "400", "401", "402", "403", "404", "405", "406", "407", "408", "409", "410", "411", "412", "413", "414", "415", "416", "417", "422", "500", "501", "502", "503", "504", "505", "507", "511");
  $rand_keys = array_rand($input, 2);
  $location = $url.'?error='.$input[$rand_keys[0]];
  header("Location: ".$prot.$location."");
};
?>
