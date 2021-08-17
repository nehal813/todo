<?php

require_once 'init.php';
/*
if(isset($_GET['as'] , $_GET['item'])){
$as =$_GET['as'];
$item=$_GET['item'];

//switch($as){

//case 'done':
    if($as == 'done'){
    $donequery= $con->prepare("
    UPDATE items
    SET done  = 1
    WHERE id =:item
    AND user = :user
    ");
    $donequery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
    ]);


  //  break;
}else{
    $donequery= $con->prepare("
    UPDATE items
    SET done  = 0
    WHERE id =:item
    AND user = :user
    ");
    $donequery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
    ]);

}

}*/

if(isset( $_GET['as'] , $_GET['item'])){
    $as =$_GET['as'];
    $item=$_GET['item'];

  $delete= $con->prepare(" DELETE FROM items WHERE id=$item  ");
  $delete->execute([
    'item' => $item,
    'user' => $_SESSION['user_id']
]);

}
header('location: index.php');
?>