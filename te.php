<?php

require_once('db.php');

if(isset($_POST['register'])){
    
    $uPos = mysqli_real_escape_string($conn,$_POST['uPosApplied']);
    $uName= mysqli_real_escape_string($conn,$_POST['uName']);
    $uMail = mysqli_real_escape_string($conn,$_POST['uEmail']);
    $uPNum = mysqli_real_escape_string($conn,$_POST['uPNum']);
    $uHAdd = mysqli_real_escape_string($conn,$_POST['uHAdd']);
    $uColor = mysqli_real_escape_string($conn,$_POST['uColor']);
    $uICNum = mysqli_real_escape_string($conn,$_POST['uICNum']);
    $uKinname = mysqli_real_escape_string($conn,$_POST['uKinname']);
    $uKinrelation= mysqli_real_escape_string($conn,$_POST['uKinrelation']);
    $uKinnum1= mysqli_real_escape_string($conn,$_POST['uKinnum1']);
    $uKinnum2= mysqli_real_escape_string($conn,$_POST['uKinnum2']);
    $uFiles= mysqli_real_escape_string($conn,$_POST['uFiles']);
    $uAppliedTime= mysqli_real_escape_string($conn,$_POST['uAppliedTime']);
    $uStatus= mysqli_real_escape_string($conn,$_POST['uStatus']);

    $check_dup_email = "SELECT uEmail from users WHERE uEmail = '$uMail'";
    $result_check = mysqli_query($conn,$check_dup_email);
    
    $count = mysqli_num_rows($result_check);
    if($count > 0){
        echo "<script>
        alert('Email Exist!');
        </script>";
    }else{

    $sql = "INSERT into users (uPosApplied,uName, uEmail, uPNum, uHAdd, uColor, uICNum,upFile,uKinname,uKinrelation,uKinnum1,uKinnum2,uFiles,uAppliedTime,uStatus) VALUES ('$uPos','$uName', '$uMail', '$eMail','$uPNum', '$uHAdd','$uColor','$uICNum','$uKinname','$uKinrelation','$uKinnum1','$uKinnum2','$uFiles','$uAppliedTime','$uStatus')";
    $result = mysqli_query($conn,$sql);
    }if($result){
        echo "<script>
        alert(`Thank you for registering!`);
        </script>";
    }else{
        echo 'Check query!';
    }
}
?>