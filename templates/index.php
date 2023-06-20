<?php
$succes=0;
$user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $ph=$_POST['ph'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $pwd_confirm=$_POST['pwd_confirm'];

  $sql="Select * from `log` where
 email='$email' ";
 $result=mysqli_query($connection,$sql);
 if($result){
    $num=mysqli_num_rows($result);
    if(($num>0)||($pwd!=$pwd_confirm)){
        // echo "User already exists";
        $user=1;

    }
    else{
     $sql="insert into `log`(fname,lname,ph,email,pwd)
     values('$fname','$lname','$ph','$email','$pwd')";
     $result=mysqli_query($connection,$sql);
 if($result){
        //  echo "signup successfull";
        $succes=1;

 }
 else{
     die(mysqli_error($connection));
 
    }
 }
}
}
if(isset($_POST['submit'])){
  header("Location:login.php");
  exit;
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Petrona:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;700&display=swap" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Login page
  </title>
  
</head>

<body>
<?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh no sorry!</strong>User  already exists or invalid details or You entered the same password...
      
          
        </button>
      </div>';
      
    }
    ?>
     <?php
    if($succes){
        echo '<div class="alert alert-success succes-dismissible fade show" role="alert">
        <strong>Success!</strong>You are Successfully joined Physio...You can now start your journey...
        <a class="btn btn-outline-success" style="margin-inline-start:75px;" href="home.php" role="button">login</a>
        
         
        </button>
      </div>';
    }
    ?>
  
  <div class="content">
    <div class="sign-up">
      <div class="sign-up-child"></div>
      <img class="sign-up-item" alt="" src="public/ellipse-1.svg" /><img class="sign-up-inner" alt=""
        src="public/ellipse-6.svg" /><a class="already-a-user" id="alreadyAUser">Already a user? login</a><img
        class="woman-doing-yoga-2" alt="" src="public/woman-doing-yoga-2@2x.png" />
      <form  method="post" action="index.php">
        <input class="fname" type="text" placeholder="First-Name" name="fname" />
        <input class="lname" type="text"  placeholder="Last-Name" name="lname"/>
        <input class="phno"  type="tel" placeholder="Phone-Number" name="ph" />
        <input class="email" type="email" placeholder="E-mail" name="email" />
        <input class="createpass" type="password" placeholder="Create-Password" name="pwd"  />
        <input class="cpass" type="password" placeholder="Confirm-Password"  name="pwd_confirm" />
        <button type="submit"
          class="signupbutton" id="signupbutton">
          <div class="rectangle"></div>
          <div class="sign-up1">Sign-up</div>
        </button><b class="sign-up2">Sign-up</b>
      </form>
      <img class="p3-icon" alt="" src="public/p3@2x.png" /><img class="p2-icon" alt="" src="public/p2@2x.png" /><img
        class="p1-icon" alt="" src="public/p1@2x.png" />
      <div class="control-your-body">Control your body to free your soul</div>
      <div>
        <img src="public\physiohighresolutionlogoblackontransparentbackground-1@2x.png" alt=" ">
      </div>
      <div class="a-good-stance">
        <img src="public\physiohighresolutionlogoblackontransparentbackground-1@2x.png" alt=" " style="height: 94px;">

        A Good Stance and Posture reflect a Proper State of Mind
      </div>

    </div>
  </div>

  <script>
    var alreadyAUser = document.getElementById("alreadyAUser");
    if (alreadyAUser) {
      alreadyAUser.addEventListener("click", function (e) {
        window.location.href = "login.php";
      });
    }
    var signupbutton = document.getElementById("signupbutton");
    if (signupbutton) {
      signupbutton.addEventListener("click", function (e) {
        window.location.href = "./home.php";
      });
    }
  </script>
</body>

</html>