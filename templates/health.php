<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $disease=$_POST['disease'];
    $fitness=$_POST['fitness'];
    $exTime=$_POST['exTime'];
    $exercise=$_POST['exercise'];
    $unable=$_POST['unable'];
    $backPain=$_POST['backPain'];
    $jointPain=$_POST['jointPain'];
    $headache=$_POST['headache'];
    $symptoms=$_POST['symptoms'];

$connection=new  mysqli('localhost','root','','physio');
  if($connection){
  
    $sql="insert into `survey`
    (age,gender,height,weight,disease,fitness,
    exTime,exercise,unable,backPain,jointPain,
    headache,symptoms ) values('$age','$gender','$height',
    '$weight','$disease','$fitness','$exTime','$exercise',
    '$unable','$backPain','$jointPain','$headache','$symptoms')";
    $result=mysqli_query($connection,$sql);
    if($result){
        
        echo '
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        </style>
        </head>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Great job!</strong> Start your journey today.....
      </div> 
<a href="webcam.php/">
 <button>Start now</button>
</a>
    </html>';
    }
    else{
     die(mysqli_error($connection));
    }
 
 
  }
  else{
    die(mysqli_error($connection));
  }
}
?>