<?php
include_once('connection2.php');
echo"-----Welcome" .$_SESSION['username']."-----".PHP_EOL;
echo"1)Compose\n2)Inbox\n3)Sent\n4)Logout\n";
echo"Enter your option -  ";
$handle = fopen("php://stdin","r");
$line = fgets($handle);
switch(trim($line)) 
{
        case "1":
        include ('compose.php');
        break;
        case "2":
        include ('inbox.php'); 
	break;
        case "3":
	include ('sent.php'); 
        break;
	case "4":
	return include "mail.php";
	break;
	case "exit":
	break;
        default:
        echo "Wrong option";
	include('user.php');
        break; 
}   




?>
