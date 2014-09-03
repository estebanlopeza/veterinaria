<?php
include('db.php');

if( $db->checkLogin($_POST['usuario'], $_POST['password']) ){
  header('Location: ./index.html');
}else{
  header('Location: ./login.html?error=1');
}


//$row = mysqli_fetch_assoc($result);
?>