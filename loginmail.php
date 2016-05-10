<?php
include_once('connection2.php');
//session_start();
include_once ('session.php');
$uri="mongodb://logint:qwerty123@ds011820.mlab.com:11820/mailserver";
$conn=new Mongoclient($uri);


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

$i=0;
$username=trim($line);
$password=trim($line2);
$pass=substr(sha1($password.$_SESSION['salt']),10,-10);
$db=$conn->mailserver;
$collection=$db->logininfo;
$collections=$collection->find(array('username'=>$username,'password'=>$pass));
if(($collections->count())>0)
{
echo"Login successfull".PHP_EOL;
$_SESSION['username']=$username;
include ('user.php');
}
else
{
echo"Invalid Login".PHP_EOL;
return include('mail.php');
}
//print_r($collections);
//if($collections!="")
//{
//echo"Login successfull".PHP_EOL;
//$susername=$row->username;
//	$spassword=$row->password;
//	$_SESSION['username']=$username;
//include ('user.php');

//}
//else
//{

//echo"Login failed".PHP_EOL;
//return include 'mail.php';

//}




//$cursor=$collection->find();
//$num=$cursor->count();
//$db=mysql_query("Select * from userinfo where username='$username'");
//$row=mysql_fetch_object($db);
//if($row!="")
//{
//	$susername=$row->username;
  //      $spassword=$row->password;

//}


//	if($row!="" && $susername==$username && $spassword==$pass)
//	{
//	$susername=$row->username;
//	$spassword=$row->password;
//	$_SESSION['username']=$username;
//	echo "Login successful".PHP_EOL;
//	include ('user.php');
//
//	}
//	else 
//	{
//	echo "Invalid login - Please enter correct username and Password";
//	return include 'mail.php';
//	}	


?>

