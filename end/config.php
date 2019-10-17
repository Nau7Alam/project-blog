<?php

ob_start();
session_start();


define('SERVER','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','loopcode');

//FOR SENDING EMAILS
define('SMTP_EMAIL','9797alam@gmail.com');
define('SMTP_PASS','@123Hunter97');
define('SITE_MAIL','wizardshad@gmail.com');



//echo(SERVER." ".USERNAME." ".PASSWORD." ".DATABASE);

$link = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);

require_once('support.php');




?>