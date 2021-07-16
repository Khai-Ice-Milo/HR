
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
        alert('Sorry! your email exist in our database, please use a new email address. Or change it to @gomamam.com!');
        </script>";
    }else{

    $sql = "INSERT into users (uPosApplied, uName, uEmail, uPNum, uHAdd, uColor, uICNum,uKinname,uKinrelation,uKinnum1,uKinnum2,uFiles,uAppliedTime,uStatus) VALUES ('$uPos','$uName', '$uMail','$uPNum', '$uHAdd','$uColor','$uICNum','$uKinname','$uKinrelation','$uKinnum1','$uKinnum2','$uFiles','$uAppliedTime','$uStatus')";
    $result = mysqli_query($conn,$sql);
    }if($result){
        echo "<script>
        alert(`Thank you for registering!, We will call you after the reviewing process`);
        header('https://www.gomamam.com/');
        </script>";
    }else{
        echo 'Check query!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="img/x-icon" href="img/GoMamam-LOGO.ico" />
    <title>GoMamam Dispatcher Registration</title>
</head>
<body>
    <img src="img/GoMamam-LOGO.png" alt="logo" height="255px;">
    <div class="form" id="reg_form">
    <form action="#" method="POST" class="reg-form-container">
    <input type="date" name="uAppliedTime" id="uAppliedTime" value="<?php echo date('Y-m-d'); ?>" readonly  hidden>
    <!--POSITION AREA-->
    <div class="pForm" id="pForm">
    <label><b>Applying for position</b></label>
    <select name="uPosApplied" id="uPosApplied">
        <option value="Part-Time">Part Time</option>
        <option value="Contracted">Contracted</option>
        <option value="Semi-Contracted">Semi Contracted</option>
    </select><br><br>
</div>
    <!-- Position End -->

    <!--Details User -->
    <div class="uForm" id="uForm">
    <label><b>Fullname</b></label>
    <input type="text" placeholder="Enter Fullname" name="uName" id="uName" required><br>

    <label><b>E-mail</b></label>
    <input type="text" placeholder="Enter Email" name="uEmail" id="uEmail" required><br>

    <label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="uPNum" id="uPNum" required><br>

    <label><b>Home Address</b></label>
    <input type="text" placeholder="Home Address" name="uHAdd" id="uHAdd" required><br><br>


    <label><b>IC Color</b></label>
    <select name="uColor" id="uColor" style="text-align:center;">
        <option value="Yellow">Yellow</option>
        <option value="Red">Red</option>
    </select>
    <br><br>
    <label><b>Identity Card Number</b></label>
    <input type="text" placeholder="IC Number" name="uICNum" id="uICNum" required><br><br>


    <!-- NEXT OF KIN -->
 
    <div class="kin">
    <h1>Next of kin details</h1>
    <label><b>Fullname</b></label>
    <input type="text" placeholder="Enter Fullname" name="uKinname" id="uKinname" required><br>


    <label><b>Relationship</b></label>
    <input type="text" placeholder="Enter Relationship" name="uKinrelation" id="uKinrelation" required><br>


    <label><b>Phone Number 1</b></label>
    <input type="text" placeholder="Enter Phone Number" name="uKinnum1" id="uKinnum1" required><br>

    <label><b>Phone Number 2</b></label>
    <input type="text" placeholder="Enter Phone Number" name="uKinnum2" id="uKinnum2" required>
    </div>
    <br><br>
    <!--NEXT OF KIN END -->


    <!-- ADMIN -->
    <!--
    <label><b>GoMamamam ID</b></label>
    <input type="text" placeholder="GoMamam ID" name="GoMamamID" id="GoMamamID" required><br>
    
    -->
    <!--admin end-->
    <!-- Details End -->

    <!--File Upload -->
    <div class="formUpload" id="formUpload" >
    <h1 class="text-white" style="background-color:#faae40;">Please read carefully<br></h1>
    <p><span style="font-size:23px;"><b>Files to upload are:</b></span><br><br><b>1. Identity Card<br>2. Car License<br>3. Car Insurance<br>4. Curriculum Vitae</b><br><span style="font-size:20px;"><b>Uploaded files must be in PDF<b></span></p>

    <input class="form-control center" type="file" name="uFiles" id="uFiles" accept="application/pdf" multiple required>
    <br>
    </div>
    <div class="status" id="status">
     <input type="text" name="uStatus" id="uStatus" value="Pending" required readonly hidden>
    <!--Upload End -->
    <button type="submit" class="btn btn-primary" name="register" id="register">Register</button>
    </form>
    </div><br>
</body>
</html>
