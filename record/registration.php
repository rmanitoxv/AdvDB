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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <style>
      body {
        font-family: Bebas Neue;
        background-image: url("img/bg1.png");
        background-repeat: no-repeat;
        background-position: 50% 0%;
        background-size: cover;
      }

      input {
        width: 50%;
        padding: 10px 18px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px white;
        border-radius: 4px;
        font-size: 20px;
      }

      label {
        color:  white;
        font-size: 20px;
      }

      .container {
        margin-top: 1%;
        width: 100%;
        position: relative;
        text-align: center;
        margin: 0 auto;
      }

      .register {
        text-align: right;
        margin: auto;
        width: 70%;
      }

      table {
        background-color: rgba(0, 0, 0, 0.7);
        padding-right: 120px;
      }

      h1 {
        background-image: url("img/red2.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 50%;
        color:  white;
        font-family: 'Roboto';
        font-size: 60px;
        margin-top: 1%;
      }

      h2 {
        color:  white;
        font-size: 25px;
        text-align: center;
        margin-bottom: 0;
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
        font-size: 25px;
        transition:  0.6s ease;
      }

      .button:hover {
        background-color: black;
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
  <a href="index.php" style="position:relative; z-index:10;"><img src="img/back.png" class="back" width="7.5%"></a>
  <center><img class="img1" src="img/login_logo.png" width=40% style="margin-top:2%;"></center>
		<div class="container">
			<div class="reg"><h1> REGISTRATION </h1></div>
			<div class="register">
				<table align="center">
					<th>
						<td>
            <form class="" action="registration1.php" method="post" autocomplete="off" ectype="multipart/form-data">
              <?php if(isset($_GET['error'])) {?>
              <p class="error"> <?php echo $_GET['error']; ?></p>
              <?php } ?>      
              <label for="fname">First Name : </label>
              <input type="text" name="fname" id = "fname" required value=""> <br>
              <label for="mname">Middle Name : </label>
              <input type="text" name="mname" id = "mname" required value=""> <br>
              <label for="lname">Last Name : </label>
              <input type="text" name="lname" id = "lname" required value=""> <br>
              <label for="nameext">Suffix : </label>
              <input type="text" name="nameext" id = "nameext"> <br>
              <label for="birthdate">Birthdate : </label>
              <input type="date" name="birthdate" id = "birthdate" required value=""> <br>
              <label for="phone">Phone Number : </label>
              <input type="text" name="phone" id = "phone" required value=""> <br>
              </td>
              </th>
              <th>
                <td>
							<h2> FIRST DOSE </h2><br>
              <label for="date_given1">Date Given: </label>
              <input type="date" name="date_given1" id = "date_given" required value=""> <br>
              <label for="vaccine1">Vaccine: </label>
              <input type="text" name="vaccine1" id = "vaccine" required value=""> <br>
              <label for="brand1">Brand: </label>
              <input type="text" name="brand1" id = "brand" required value=""> <br>
              <label for="lot_number1">Lot Number: </label>
              <input type="text" name="lot_number1" id = "lot_number"> <br>
              <label for="country1">Country: </label>
              <input type="text" name="country1" id = "country" required value=""> <br>
              </td>
              </th>
              <th>
                <td>
							<h2> SECOND DOSE </h2><br>
              <label for="date_given2">Date Given: </label>
              <input type="date" name="date_given2" id = "date_given" required value=""> <br>
              <label for="vaccine2">Vaccine: </label>
              <input type="text" name="vaccine2" id = "vaccine" required value=""> <br>
              <label for="brand2">Brand: </label>
              <input type="text" name="brand2" id = "brand" required value=""> <br>
              <label for="lot_number2">Lot Number: </label>
              <input type="text" name="lot_number2" id = "lot_number"> <br>
              <label for="country2">Country: </label>
              <input type="text" name="country2" id = "country" required value=""> <br>
            </td>
        </th>
      </table>
    </div>
        <br><br>						
        <button name="submit" class="button"> REGISTER </button>
      </form>
  </body>
</html>
<?php 
    }
    else {
        header("Location: form.php");
        exit();
    }
?>

