<?php
include_once('connection2.php');
include_once('session.php');
//echo"$username";
$db=mysql_query("select * from mails where recid='$username'");
$i=1;
$nfrows=mysql_num_rows($db);
if($nfrows=="")
{
echo"No Messages".PHP_EOL;
}
while($row=mysql_fetch_array($db))
{
//echo $row['mailid'].PHP_EOL;
echo"-----------------------------------".PHP_EOL;
echo "$i)FROM -- ".$row['senid']."          ID --" .$row['mailid'].PHP_EOL;
echo "  SUBJECT --".$row['sub'].PHP_EOL;
echo "  MESSAGE --".$row['msg'].PHP_EOL;
echo"-----------------------------------".PHP_EOL;
$i++;
}
echo "Type f- forward r-reply d-delete log-history  message or type back to mainmenu".PHP_EOL;
$handle=fopen("php://stdin","r");
$line=fgets($handle);
switch(trim($line))
	{
	case "f":
	echo "Enter ID of the message which you need to forward ".PHP_EOL;
	$line2=fgets($handle);
	$id=trim($line2);
	$db=mysql_query("select * from mails where mailid='$id'");
	$row=mysql_fetch_object($db);
        if($row!="")
        {
	$senid=$row->senid;
	$subject=$row->sub;
	$message=$row->msg;
	$status="forward";
	 echo " Enter Recipient name to forward ".PHP_EOL;
         $line3=fgets($handle);
        $recid=trim($line3);
        mysql_query("Insert into mails values('','$recid','$username','$subject','$message','$status')");  

 mysql_query("Insert into logdetails values('','->','$recid','$message','delivered','$status')");
mysql_query("Update logdetails set senid = concat(senid,'$username')where recid = '$recid' ");


     echo "Message Forwarded".PHP_EOL;
include('user.php');
	}
else
{
echo "Wrong Recipient name/ ID of the message".PHP_EOL;
}
	
	break;
	case "r":
	echo "Enter ID of the message which you need to reply ".PHP_EOL;
        $line2=fgets($handle);
        $id=trim($line2);
	$db=mysql_query("select * from mails where mailid='$id'");
        $row=mysql_fetch_object($db);
        if($row!="")
        {
        $recid=$row->senid;
	echo "Enter subject of the message".PHP_EOL;
	$line2=fgets($handle);
	$subject=trim($line2);
	//$status="sent";
	echo"------- Enter the message to be sent-------".PHP_EOL;
	$line3=fgets($handle);
	$message=trim($line3);

        //$subject=
       // $message=$row->msg;
        $status="reply";
	   mysql_query("Insert into mails values('','$recid','$username','$subject','$message','$status')");
     echo "Message Replied".PHP_EOL;
	include('user.php');

	}
	else
	{
	echo "Wrong ID of the message".PHP_EOL;
	}


	break;
	case "d":
	 echo "Enter ID of the message which you need to delete ".PHP_EOL;
        $line5=fgets($handle);
        $id=trim($line5);
	mysql_query("Delete from mails where mailid = '$id'");
	echo"Message Deleted".PHP_EOL;
	include('user.php');
	case "log":
	echo "History of the messages".PHP_EOL;
	$logg=mysql_query("select senid,recid,status,parentst from logdetails where senid='$username' OR recid='$username'");
	while($log=mysql_fetch_array($logg))
	{
	echo"-----------------------------------".PHP_EOL;
	echo "	FROM (Parent IDs)-- ".$log['senid'].PHP_EOL ;        
	echo "  Status --".$log['parentst'].PHP_EOL;
	echo"-----------------------------------".PHP_EOL;
 
	}	

	
	include('user.php');

	break;
	case "back":
	include('user.php');
	break;
	default:
	echo"Wrong option".PHP_EOL;
	include('user.php');
	}

?>
