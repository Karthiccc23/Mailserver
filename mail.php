<?php
include_once('connection2.php');
include_once('session.php');
echo"-----Welcome to Mail Server-----".PHP_EOL;
echo"1)login\n2)Register\n";
echo"Enter your option or type exit to quit -  ";
$handle = fopen("php://stdin","r");
$line = fgets($handle);
switch(trim($line))
{
	case "1":
	echo "Login page".PHP_EOL;
	include ('loginmail.php');
//	return include ('loginmail.php');
	break;
	case "2":
	include_once('register.php');
	case "exit":
//	mysql_close($db);
	break;
	default:
	echo "Wrong option";
	include('mail.php');
	break;
}

?>
