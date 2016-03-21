<?php
include_once('connection2.php');
echo " --- Registration Form --- ".PHP_EOL;
echo " Enter your username ".PHP_EOL;
$handle = fopen("php://stdin","r");
$line = fgets($handle);
$username=trim($line);
echo " Enter your password ".PHP_EOL;
$line2 = fgets($handle);
$password=trim($line2);
echo " Enter your Mobile number ".PHP_EOL;
$line3 = fgets($handle);
$mobile=trim($line3);
echo " Enter your email ".PHP_EOL;
$line4 = fgets($handle);
$email=trim($line4);
echo " Enter your Gender( Type m - male and f - female) ".PHP_EOL;
$line5 = fgets($handle);
$gender=trim($line5);

$db=mysql_query("Select * from userinfo where username='$username'");
$row=mysql_fetch_object($db);
//echo "$row".PHP_EOL;
//$susername=$row->username;
if($row!="")
{
	echo "USERNAME ALREADY EXIST!!!".PHP_EOL;
	return include "mail.php";
	
}	

else
	{
	echo "User Registration type yes to confirm or no to cancel".PHP_EOL;
	$line6=fgets($handle);
	$confirm=trim($line6);	
		if($confirm=="yes")
		{
	mysql_query("Insert into userinfo values ('','$username','$password','$mobile','$email','$gender')");


	echo " REGISTRATION SUCCESSFULL!! ".PHP_EOL;
	//include_once('mail.php');
	return include "mail.php";
		}
		else
		{
		echo "REGISTRATION CANCELED!!".PHP_EOL;
		//include_once('mail.php');
		return include "mail.php";
		}
	}
?>
