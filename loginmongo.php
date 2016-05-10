<?php
//phpinfo();
$uri="mongodb://logint:qwerty123@ds011820.mlab.com:11820/mailserver";

try{
$conn=new Mongoclient($uri);
$db=$conn->mailserver;
$collection=$db->logininfo;
$cursor=$collection->find();
$num=$cursor->count();
if($num >0)
{
foreach($cursor as $obj)
echo 'USER'.$obj['username'].PHP_EOL;
}
else
{
echo "aerae".PHP_EOL;
}
//$userinfo=array('username'=> 'jack',
//		'password'=>'jack',
//	 	'email'=>'kp444@mail.com',
//		'mobile'=>'8622356895',
//		'gender'=>'m');
//$collection->insert($userinfo);
echo "Connection successful".PHP_EOL;
}
catch(MongoConnectionException $e)
{
die('Error connecting to MongoDBserver '.$e->getMessage());
}


?>
