<?php

$db = mysqli_connect('localhost', 'shreyase_root', 'Crunk@123', 'shreyase_shreyaset');
if($db->connect_errno){
	die('Sorry Database not connected !!!');
}
//msg91 config 
define('MSG91_AUTH_KEY', "268352AZUjUpCXUD95c90c479");
// sender id should 6 character long
define('MSG91_SENDER_ID', 'SHRYET');

define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);


?>