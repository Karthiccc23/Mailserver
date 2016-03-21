<?php
include_once('connection2.php');
echo"Enter Recipient name".PHP_EOL;
$handle=fopen("php://stdin","r");
$line=fgets($handle);
$recipient=trim($line);
$sendfrom=$_SESSION['username'];
echo "Enter subject of the message".PHP_EOL;
$line2=fgets($handle);
$subject=trim($line2);
$status="sent";
echo"------- Enter the message to be sent-------".PHP_EOL;
$line3=fgets($handle);
$message=trim($line3);

$db=mysql_query("select * from userinfo where username='$recipient'");
$row=mysql_num_rows($db);
	if($row==1)
	{
	mysql_query("Insert into mails values('','$recipient','$sendfrom','$subject','$message','$status')");
	mysql_query("Insert into logdetails values('','->','$recipient','$message','delivered','$status')");
mysql_query("Update logdetails set senid = concat(senid,'$sendfrom')where recid = '$recipient' ");
	echo "Message Sent".PHP_EOL;
	include 'user.php';
	}
	else
	{
	echo"Message sending failed--Please check the recipient name".PHP_EOL;
	include 'user.php';
	}

?>
