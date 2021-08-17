<?php
session_start();


$_SESSION['user_id']=1;
$dsn='mysql:host=localhost;dbname=todo';
$user='root';
$pass='';
$option=array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

);
if(!isset($_SESSION['user_id'])){
    die('unsigned in');
}

try{
$con=new PDO( $dsn, $user ,$pass , $option);

$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION  );
//echo 'you are connected to database';

}
catch(PDDException $e){

    echo 'fail to connect' . $e->getMessage();
}


?>