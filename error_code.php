<?php
// to get this to work.
// create a folder with a bunch of error pictures in it.
// call them after the error code like 403 "403.jgg"
// where ever you like. and change the path of the "img" tag to your choosen path
// set error pages in your config file apache exsample "ErrorDocument 300 http://yourDomain.com/?error=300"
// put this at the very top of your index file. and you are done.

if (isset($_GET["error"])) {
  $img =  $_GET["error"];

  $newhtml = '<!doctype html>
              <html><head><title>Error "'.$img.'"</title></head>
              <body style="background-color:black">
              <h1 style="color:white;text-align:center;">Error page</h1>
              <br>
              <hr>
              <p style="color:white;text-align:center;">there was an '.$img.' error during page load</p>
              <hr>
              <img src="source/b/error/img/'.$img.'.jpg" style="width:100%;height:100%;margin:auto auto;"/>
              </body>
              </html>';


  print($newhtml);
  die('Direct access not permitted');
}
?>
