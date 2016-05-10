<?php
include_once('connection2.php');
$uri="mongodb://logint:qwerty123@ds011820.mlab.com:11820/mailserver";

try{
$conn=new Mongoclient($uri);
$db=$conn->mailserver;
$collection=$db->logininfo;

echo " --- Registration Form --- ".PHP_EOL;
echo " Enter your username ".PHP_EOL;
$handle = fopen("php://stdin","r");
$line = fgets($handle);
$username=trim($line);
echo " Enter your password ".PHP_EOL;
$line2 = fgets($handle);
$password=trim($line2);
$pass=substr(sha1($password.$_SESSION['salt']),10,-10);
echo " Enter your Mobile number ".PHP_EOL;
$line3 = fgets($handle);
$mobile=trim($line3);
echo " Enter your email ".PHP_EOL;
$line4 = fgets($handle);
$email=trim($line4);
echo " Enter your Gender( Type m - male and f - female) ".PHP_EOL;
$line5 = fgets($handle);
$gender=trim($line5);
$userinfo=array('username'=> $username,
		'password'=>$pass,
	 	'email'=>$email,
		'mobile'=>$mobile,
		'gender'=>$gender);
$collection->insert($userinfo);
echo "UserRegistered".PHP_EOL;
mysql_query("Insert into userinfo values ('','$username','$pass','$mobile','$email','$gender')");
return include "mail.php";
//echo 'USER'.$obj['username'].PHP_EOL;


//$db=mysql_query("Select * from userinfo where username='$username'");
//$row=mysql_fetch_object($db);
//echo "$row".PHP_EOL;
//$susername=$row->username;
//if($row!="")
//{
//	echo "USERNAME ALREADY EXIST!!!".PHP_EOL;
//	return include "mail.php";
	
//}	

//else
	//{
	//echo "User Registration type yes to confirm or no to cancel".PHP_EOL;
	//$line6=fgets($handle);
	//$confirm=trim($line6);	
//		if($confirm=="yes")
//		{
	


//	echo " REGISTRATION SUCCESSFULL!! ".PHP_EOL;
//	//include_once('mail.php');
//	return include "mail.php";
//		}
//		else
//		{
//		echo "REGISTRATION CANCELED!!".PHP_EOL;
//		//include_once('mail.php');
//		return include "mail.php";
//		}
//	}

//}
}
catch(MongoConnectionException $e)
{
die('Error connecting to MongoDBserver '.$e->getMessage());
}
?>
