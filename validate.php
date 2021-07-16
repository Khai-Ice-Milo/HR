<?php
 
include_once('db.php');
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"]== "POST") {
     
    $adminname = test_input($_POST["aName"]);
    $password = test_input($_POST["aPassword"]);
    $stmt = $conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $users = $stmt->mysqli_fetch_all();
     
    foreach($users as $user) {
         
        if(($user['aName'] == $adminname) &&
            ($user['aPassword'] == $password)) {
                header("Location: adminpage.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
 
?>