<?php
include_once('connection2.php');
//session_start();
include_once ('session.php');
echo"Mail server login".PHP_EOL;
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
$db=mysql_query("Select * from userinfo where username='$username'");
$row=mysql_fetch_object($db);
if($row!="")
{
	$susername=$row->username;
        $spassword=$row->password;

}


	if($row!="" && $susername==$username && $spassword==$password)
	{
	$susername=$row->username;
	$spassword=$row->password;
	$_SESSION['username']=$username;
	echo "Login successful".PHP_EOL;
	include ('user.php');

	}
	else 
	{
	echo "Invalid login - Please enter correct username and Password";
	return include 'mail.php';
	}	


?>

