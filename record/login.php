<?php
    session_start();
    include("config.php");

    if(isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

if(empty($username)) {
    header ("Location: form.php?error=Username is required");
    exit();
}
else if(empty($password)) {
    header ("Location: form.php?error=Passsword is required");
    exit();
}

$sql = "SELECT * FROM login WHERE username='$username'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $username && $row['password'] == $password) {
        echo "Successfully Logged In";
        if($row['isAdmin'] == '1'){
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['userID'];
            header("Location: admin.php");
            exit();}
        else{
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['userID'];
            header("Location: index.php");
            exit();}
    }
    else{
        header("Location: form.php?error=Incorrect Password");
    }
}
else{
    header("Location: form.php?error=Incorrect Username");
}

?>
