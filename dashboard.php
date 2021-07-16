<?php
require('db.php');
//single login

    
session_start();
    if (isset($_POST['login'])){
        $eMail = $_POST['aEmail'];
        $uPassword = $_POST['aPassword'];

        $sql = "SELECT * FROM admins WHERE aEmail = '$eMail' AND aPassword = '$uPassword'";
        $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['aName'] = $row['aName'];
                $_SESSION['a_id'] = $row['a_id'];
        
                $userType = $row['aType'];
                if ($userType === 'SuperAdmin'){
                    echo "<script>alert('Welcome Super Admin');
                    window.location.href='supadminpage.php';
                </script>";
                } else {
                    echo "<script>alert('Login Successful');
                    window.location.href='adminpage.php';
                    </script>";    
                }
        }else{
            echo "<script>alert('Email or Password is wrong!');
            window.location.href='dashboard.php';
            </script>";
        }
    }

    


?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/login.css">
    <title>Login Page</title>
</head>
 
<body>
    <form action="#" method="post">
        <div class="login-box">
            <h1>Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Email"
                        id="aEmail" name="aEmail">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                        id="aPassword" name="aPassword">
            </div>
 
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
</body>
 
</html>