<?php 
session_start();
include("config.php");
if(isset($_POST['submit'])) {  
    $id = $_SESSION['userID'];
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $confpw = $_POST['confpw'];
    $sql = "SELECT * FROM login WHERE userID='$id'";
    $result = mysqli_query($con, $sql);    
    $pw = mysqli_fetch_assoc($result);
    if($pw['password'] != $oldpw) {
        header ("Location: password.php?error=Incorrect Old Password");
    }
    else{
        if ($newpw != $confpw){
            header ("Location: password.php?error=Incorrect New Password and Confirm Password");
        }
        else{
            $query = ("UPDATE login SET password='$newpw' WHERE userID=$id");
            mysqli_query($con, $query);
            header ("Location: password.php?error=Successfully Changed");
        }
    }
}
else{
    echo "tite";
}
?>