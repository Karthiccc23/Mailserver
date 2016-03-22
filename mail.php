<?php
include_once('connection2.php');
include_once('session.php');
$_SESSION['salt']="kjsadhuqheiukjdsjkwrjlwe";
echo"-----Welcome to Mail Server-----".PHP_EOL;
echo"1)login\n2)Register\n";
echo"Type admin for administrator login(username-admin,password-admin)".PHP_EOL;
echo"Enter your option number or type exit to quit -  ";
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
	include('register.php');
	case "exit":
//	mysql_close($db);
	break;
	case "admin":
	echo"Enter Username".PHP_EOL;
	$handle = fopen("php://stdin","r");
	$line = fgets($handle);
	echo"Enter Password".PHP_EOL;
	system('stty -echo');
	$handle2 = fopen("php://stdin","r");
	$line2 = fgets($handle2);
	system('stty echo');
	//echo"\n";
	$username=trim($line);
	$password=trim($line2);
	if($username=="admin"&&$password=="admin")
	{
	echo"Login successfull".PHP_EOL;
	echo "-----Welcome Administrator----".PHP_EOL;
	echo "--Mail server system logs-- ".PHP_EOL;
	$i='0';
	$logg=mysql_query("select * from logdetails");
        while($log=mysql_fetch_array($logg))
        {
	  $logid=$log['logid'];
	  $senid=$log['senid'];
	 $recid=$log['recid'];
	 $msg=$log['msg'];
	 $status=$log['status'];
	$parentst=$log['parentst'];
	
	echo" LOGID   SENDERID   RECIPIENTID    MESSAGE         		 STATUS    PARENTSTATUS".PHP_EOL;
	echo"$logid   $senid     $recid         $msg      $status     $parentst".PHP_EOL;

        }
	include('mail.php');
	}
	else
	{
	echo"Invalid login".PHP_EOL;
	include('mail.php');
	}
	break;
	default:
	echo "Wrong option";
	include('mail.php');
	break;
}

?>
