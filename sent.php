<?php
include_once('connection2.php');
include_once('session.php');
echo"-----SENT-----".PHP_EOL;
$username=$_SESSION['username'];
//echo"$username";
$db=mysql_query("select * from mails where senid='$username'");
$i=1;
while($row=mysql_fetch_array($db))
{
//echo $row['mailid'].PHP_EOL;
echo"-----------------------------------".PHP_EOL;
echo "$i)TO -- ".$row['recid'].PHP_EOL;
echo "  SUBJECT --".$row['sub'].PHP_EOL;
echo "  MESSAGE --".$row['msg'].PHP_EOL;
echo"-----------------------------------".PHP_EOL;
$i++;
//echo$row['status'];
}


?>
