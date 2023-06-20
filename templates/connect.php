<?php
$connection=mysqli_connect('localhost','root','','physio');
  if(!$connection){
  
   die(mysqli_error($connection));

  }
  
?>