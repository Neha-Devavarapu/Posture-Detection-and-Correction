<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];

$sql="Select * from `log` where
email='$email' and pwd='$pwd' ";
 $result=mysqli_query($connection,$sql);
 if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
    $login=1;
    session_start();
    $_SESSION['email']=$email;
    header('location:webcam.php');
    }
    else{
$invalid=1;
 }
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="login.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Petrona:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;700&display=swap" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>
  login page
</title>
</head>

<body>
<?php
if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh no sorry!</strong>Invalid details...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<?php
if($login){
  echo '<div class="alert alert-success succes-dismissible fade show" role="alert">
  <strong>Success!</strong>You are Successfully loggedIn
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>  
<div class="login">
    <div class="login-child"></div>
    <img class="login-item" alt="" src="public/ellipse-1.svg" /><img class="login-inner" alt=""
      src="public/ellipse-6.svg" /><a class="new-sign-up" id="newSignUp">New? Sign up</a>
    
    <img class="woman-doing-yoga-21" alt="" src="public/woman-doing-yoga-2@2x.png" />
    <form action="login.php" method="post" style="margin-inline:542px;padding-top: 59px;text-align:center;font-size: var(--font-size-7xl);color: var(--color-saddlebrown-100);" >
      <b class="login1" >LOGIN</b>
      <input class="email1" type="varchar" placeholder="E-mail" name="email" />
      <input class="password" type="password" placeholder="Password" name="pwd" />
      <button class="loginbutton" id="loginbutton" type="submit">
        <div class="rectangle1"></div>
        <div class="login2">Login</div>
      </button>
</form>
    <img class="p3-icon1" alt="" src="public/p3@2x.png" /><img class="p2-icon1" alt="" src="public/p2@2x.png" /><img
      class="p1-icon1" alt="" src="public/p1@2x.png" />
    <div class="control-your-body1" style="    padding-block: 56px;">Control your body to free your soul</div>
    <div class="a-good-stance1">
      <img src="public\physiohighresolutionlogoblackontransparentbackground-1@2x.png" alt=" " style="height: 94px;">
      
      A Good Stance and Posture reflect a Proper State of Mind
    </div>
  </div>

  <script>
    var newSignUp = document.getElementById("newSignUp");
    if (newSignUp) {
      newSignUp.addEventListener("click", function (e) {
        window.location.href = "index.php";
      });
    }

    
  </script>
</body>

</html>