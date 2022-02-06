<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
        $id = $_SESSION['userID'];
        $online = mysqli_query($con, "SELECT * FROM login WHERE userID = '$id'");
        $result =  mysqli_fetch_assoc($online);
        if ($result['isAdmin'] == 1){
            header ("Location: admin.php");
        }
?>
        <!DOCTYPE html>
        <hmtl>
            <head>
                <title>
                    Change Password
                </title>
                <style>
                body {
                    background-image: url("img/bg1.png");
                    background-repeat: no-repeat;
                    background-position: 0% 0%;
                    background-size: cover;
                    font-family: Bebas Neue;
                    color: white;
                    
                }
                .cpw {
                    background-image: url("img/white3.png");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: 40%;
                    margin-top: 7.5%;
                    font-size: 60px;
                    margin-bottom: 2.5%;
                    password-shadow: 2px 2px 5px black;
                }

                table {
                    font-size: 35px;
                }
                .space {
                    margin-bottom: 10px;
                }

                .confirmspace {
                    margin-top: 1%;
                }
                input[type=password] {
                width: 55%;
                margin: 8px 0;
                box-sizing: border-box;
                border: 2px white;
                border-radius: 4px;
                font-size: 35px;
                font-family: 'Bebas Neue';
                }
                .back{  
                    position: fixed;
                    top: 2%;
                    left: 2%;
                }
                </style>
            </head>
            <body>
                <a href="index.php" style="position:relative; z-index:10;"><img src="img/back.png" class="back" width="7.5%"></a>
                <div class="logo">
                <center><img class="img1" src="img/login_logo.png" width=45% style="margin-top: 1%;"></center>
                </div>
                <center>
                <div class="cpw">
                CHANGE PASSWORD
                </div>
                <table border=0 width="40%">
                <tr>
                <td align=right>
                <form method="POST" action="password1.php">
                <div class="space">
                <label for="oldpw">Old Password:</label>
                <input type="password" id="oldpw" name="oldpw">
                </div>
                <div class="space">
                <label for="newpw">New Password:</label>
                <input type="password" id="newpw" name="newpw">
                </div>
                <label for="confpw">Confirm Password:</label>
                <input type="password" id="confpw" name="confpw">
                </td>
                </tr>
                </table>
                <table>
                    <tr><td>
				<?php if(isset($_GET['error'])) {?>
                <?php echo $_GET['error']; ?>
                <?php }
                else {?>
                <?php echo "&nbsp;"; ?>
                <?php } ?>
                </tr></td>
                </table>
                <div class="confirmspace">
                <button type="submit" name="submit" style="border:0; background-color: transparent; width: 12%;"> <img src="img/confirm.png" width=100%> </button>
                </div>
                </form>
            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>