<!DOCTYPE html>
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
        if ($result['isStaff'] == 1 || $result['isStudent'] == 1){
            header ("Location: index.php");
        }
    }
else{
?>

<html>
    <head>
        <title> LOGIN </title>
        <style>
            body{
            background-image: url("img/bg1.png");
            background-repeat: no-repeat;
            background-position: 0% 0%;
            background-size: 100%;        
            }
            input[type=text] {
            width: 15%;
            padding: 10px 18px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px white;
            border-radius: 4px;
            font-size: 30px;
            font-family: 'Bebas Neue';
            }

            input[type=password] {
            width: 15%;
            padding: 10px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px white;
            border-radius: 4px;
            font-size: 30px;
            font-family: 'Bebas Neue';
            }

            label[for="uname"] {
            color:  white;
            font-family: 'Bebas Neue';
            font-size: 40px;
            }

            label[for="pw"] {
            color:  white;
            font-family: 'Bebas Neue';
            font-size: 40px;
            }

            .container {
            padding-top: 30px;
            width: 100%;
            position: relative;
            text-align: center;
            margin: 0 auto;
            }

            .img1 {
            display: flex;
            align-items: center;
            width: 35%;
            }

            .vaxrecords {
            }

            .login {
            padding-top: 4%;
            }

            h1 {
            color:  white;
            font-family: 'Roboto', sans-serif;
            font-size: 150px;
            padding-bottom: 0px;
            margin-bottom: 0px;
            }

            h2 {
            color:  white;
            font-family: 'Roboto', sans-serif;
            font-size: 40px;
            margin-top: -1%;
            }

            .button {
            background-color: white;
            border: none;
            border-radius: 100px;
            color: #00008B;
            padding: 15px 55px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-family: 'Bebas Neue';
            font-size: 35px;
            transition:  0.6s ease;
            }

            .button:hover {
            background-color: #00008B;
            color: white;
            }

            table {
                color:  white;
                font-family: 'Bebas Neue';
                font-size: 30px;
                margin-top: 0px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
		<div class="container">
			<div class="logo">
				<center><img class="img1" src="img/login_logo.png" width=60%></center>
			</div>
			<div class="vaxrecords">	
				<h1> Vaccine Records </h1>
				<h2> MAKING PLM A BETTER AND SAFER PLACE </h2>
			</div>
			<div class="login">
			<form action="login.php" method="post">
  				<label for="uname">Username: </label>
 				<input type="text" id="uname" name="username">
 				<br>
  				<label for="pw">Password: </label>
				<input type="password" id="pw" name="password">
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
				<button class="button" name="submit"> Login </button>
			</form>
			</div>
		</div>
	</body>
</html>
<?php } ?>