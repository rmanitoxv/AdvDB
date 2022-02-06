<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
        $id = $_SESSION['userID'];
        $online = mysqli_query($con, "SELECT * FROM login WHERE userID = '$id'");
        $result =  mysqli_fetch_assoc($online);
        if ($result['isStaff'] == 1 || $result['isStudent'] == 1){
            header ("Location: index.php");
        }
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $user = $_POST["user"];
                $confirmpassword = $_POST["confirmpassword"];
                $duplicate = mysqli_query($con, "SELECT * FROM login WHERE username = '$username'");
                if(mysqli_num_rows($duplicate) > 0){
                    header ("Location: newuser.php?error=User Already Added");
                }
                else{
                    if($password == $confirmpassword){
                        if ($user == 'Staff'){
                            $sql = " INSERT INTO login VALUES('', '$username', '$password', 0, 1, 0)";
                            mysqli_query($con, $sql);
                            header ("Location: newuser.php?error=Successfully Added");
                            exit();
                        }
                        else {
                            $sql = " INSERT INTO login VALUES('', '$username', '$password', 0, 0, 1)";
                            mysqli_query($con, $sql);
                            header ("Location: newuser.php?error=Successfully Added");
                            exit();
                        }
                    }
                else{
                    header ("Location: newuser.php?error=Password and Confirm Password is invalid");
                }
              }
            }
?>
        <!DOCTYPE html>
        <hmtl>
            <head>
                <title>
                    Add New User
                </title>
                <style>
                    body{
                        background-image: url("img/bg1.png");
                        background-repeat: no-repeat;
                        background-position: 0% 0%;
                        background-size: 100%;        
                    }
                    #text{
                        width: 100%;
                        margin-bottom: 7.5px;
                        box-sizing: border-box;
                        border: 2.5px white;
                        border-radius: 4px;
                        font-family: 'Bebas Neue';
                        font-size: 30px;
                        color: black;
                    }
                    label {
                        color:  white;
                        font-family: 'Bebas Neue';
                        font-size: 20px;
                    }
                    .type{
                        color:  white;
                        font-family: 'Bebas Neue';
                        font-size: 20px;
                    }
                    .register {
                        text-align: left;
                        width: 27.5%;
                        margin: auto;

                    }
                    h1 {
                        background-image: url("img/red2.png");
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 50%;
                        color:  white;
                        font-family: 'Bebas Neue';
                        font-size: 60px;
                        margin-top: 115px;
                    }
                    .container {
                        padding-top: 30px;
                        width: 100%;
                        position: relative;
                        text-align: center;

                    }
                    .button {
                        background-color: white;
                        border: none;
                        border-radius: 100px;
                        color: black;
                        padding: 15px 55px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-family: 'Bebas Neue';
                        font-size: 25px;
                        transition:  0.6s ease;
                    }

                    .button:hover {
                        background-color: black;
                        color: white;
                    }
                    .user{
                        font-family: 'Bebas Neue';
                        font-size: 25px;
                        color: white;
                    }
                    .back{  
                        position: fixed;
                        top: 2%;
                        left: 2%;
                    }
                </style>
            </head>
            <body>
                <a href="admin.php" style="position:relative; z-index:10;"><img src="img/back.png" class="back" width="7.5%"></a>
                <div class="container">
                <h1> Add New User </h1>
                <div class="register">
				<table align="center" border="0">
                    <form class="" action="" method="post" autocomplete="off" ectype="multipart/form-data">
                        <tr><td width="20%"><label for="username">Username : </label>
                        <td><input type="text" name="username" id = "text" required value=""></td></tr>
                        <tr><td><label for="password">Password : </label>
                        <td><input type="password" name="password" id = "text" required value=""></td></tr>
                        <tr><td><label for="confirmpassword">Confirm Password : </label>
                        <td><input type="password" name="confirmpassword" id = "text" required value=""></td></tr>
                        <tr><td>
                            <div class="type">User Type:</div>
                            </td><td>
                            <input type="radio" name="user" value="Student" required value="">
                            <label for="Student">Student</label><br>
                            <input type="radio" name="user" value="Staff" required value="">
                            <label for="Staff">Staff</label><br>
                        </td></tr>
                </table>
                </div>
                <table align="center">
                    <tr><td class="user">
                    <?php if(isset($_GET['error'])) {?>
                    <?php echo $_GET['error']; ?>
                    <?php }
                    else {?>
                    <?php echo "&nbsp;"; ?>
                    <?php } ?>
                    </tr></td>
                    </table>
                    <br>
                    <button type="submit" class="button" name="submit">Submit</button>
                
                    </form>
                </div>     
            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>