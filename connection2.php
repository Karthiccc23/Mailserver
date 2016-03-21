<?php
$con=mysql_connect("localhost","root","Qwerty123") or die (mysql_error());
mysql_query("create database if not exists maildb");
mysql_select_db("maildb");
mysql_query('create table if not exists mails(
mailid int(11) NOT NULL AUTO_INCREMENT,
recid varchar(50) NOT NULL,
senid varchar(50) NOT NULL,
sub varchar(50) NOT NULL,
msg text NOT NULL,
status varchar(20) NOT NULL,
primary key( mailid)
);');
mysql_query('create table if not exists userinfo(
user_id int(11) NOT NULL AUTO_INCREMENT,
username char(50) NOT NULL,
password varchar(50) NOT NULL,
mobile bigint(20) NOT NULL,
email varchar(50) NOT NULL,
gender enum("m","f") NOT NULL,
primary key (user_id)
);');



?>
