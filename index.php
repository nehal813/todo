<?php

include_once 'init.php';
$stmt=$con->prepare("SELECT id, name, done FROM items WHERE user= :user ");
$stmt->execute(
   [  'user' =>  $_SESSION['user_id']] 
);
$row=$stmt->fetch();
$count=$stmt->rowcount() ? $stmt :[];
//foreach($count  as $count){
//echo  $count['name'], '<br>';
//}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>To Do</title>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Shadows+Into+Light" />
<link rel="stylesheet" href="css/main.css">
<meta name="viewport" content="width=device-width, ,initial-scale=1  ">
</head>
<body>
    <div class="list">
<h1 class="header">To Do</h1>
<?php  if(!empty($count)): ?>

<ul class="items">
    <?php foreach($count  as $count): ?>
<li>
    <span class="item<?php echo $count['done']? 'done': '' ?>" > <?php echo $count['name'];  ?></span>
    <?php if($count['done']): ?>
<a href="mark.php?as=done&item=<?php echo $count['id'];  ?>"   class="mark-button">done and delete</a>
<?php endif; ?>
</li> 
<?php endforeach; ?>
  
    
</ul>

<?php else: ?>
    <p> you havent added any items yet</p>

    <?php endif; ?>

<form class="item-add" action="add.php"   method="post">

  <input class="input" type="text" name="name" placeholder="type a new item here" aueocomplete="off">
  

  <input class="submit" type="submit" value="Add">

</form>

    </div>



</body>
</html>