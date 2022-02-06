<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
        $id = $_SESSION['userID'];
        $online = mysqli_query($con, "SELECT * FROM login WHERE userID = '$id'");
        $result1 =  mysqli_fetch_assoc($online);
        if ($result1['isAdmin'] == 1){
            header ("Location: admin.php");
        }
        $registered = mysqli_query($con, "SELECT * FROM registration WHERE registrationID = '$id'");
        $staff = mysqli_query($con, "SELECT * FROM staff WHERE staffID = '$id'");
        $student = mysqli_query($con, "SELECT * FROM student WHERE studentID = '$id'");
        $staffresult =  mysqli_fetch_assoc($staff);
        $studentresult =  mysqli_fetch_assoc($student);
        $result = mysqli_fetch_assoc($registered);
?>
        <!DOCTYPE html>
        <hmtl>
            <?php
                if(mysqli_num_rows($registered) > 0){
                    if ($result['regPDF'] == ''){ ?>
                    <head>
                        <title>Input Vaccination Certificate</title>
                        <style>
                            body {
                            background-image: url("img/bg1.png");
                            background-repeat: no-repeat;
                            background-size: cover;
                            font-family: Bebas Neue;
                            margin: 0px;
                            font-size: 50px;
                            }

                            a { 
                            text-decoration: none;
                            font-family: Bebas Neue;
                            color: white;
                            }

                            .input {
                            background-image: url("img/blue1.png");
                            background-repeat: no-repeat;
                            background-position: center;
                            background-size: 60%;
                            margin-top: 14%;
                            font-size: 80px;
                            }

                            .cpw {
                            background-image: url("img/black1.png");
                            background-repeat: no-repeat;
                            background-position: center;
                            background-size: 35%;
                            margin-top: -2%;
                            margin-bottom: 7%;
                            }


                        </style>
                    </head>
                    <body>
                    <div class="logo">
                    <center><img class="img1" src="img/login_logo.png" width=45% style="margin-top: 1%;"></center>
                    </div>
                    <div class="input">
                        <center><a href="registration2.php">INPUT VACCINATION CERTIFICATE</a></center>
                    </div>
                    <br>
                    <div class="cpw">
                    <center><a href="password.php">CHANGE PASSWORD</a></center>
                    </div>
                    <center><a href="logout.php"><img src="img/logout.png" width=15%></a></center>
                    </body>
                        <?php } 
    
                        else { ?>
                        <head>
                            <title>Not Yet Validated</title>
                            <style>
                                body {
                                background-image: url("img/bg1.png");
                                background-repeat: no-repeat;
                                background-size: 100%;
                                font-family: Bebas Neue;
                                margin: 0px;
                                font-size: 50px;
                                }

                                a { 
                                text-decoration: none;
                                font-family: Bebas Neue;
                                color: white;
                                }

                                .input {
                                background-image: url("img/red2.png");
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: 60%;
                                margin-top: 14%;
                                font-size: 80px;
                                color: white;
                                }

                                .cpw {
                                background-image: url("img/black1.png");
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: 35%;
                                margin-top: -2%;
                                margin-bottom: 7%;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="logo">
                            <center><img class="img1" src="img/login_logo.png" width=45% style="margin-top: 1%;"></center>
                            </div>
                            <div class="input">
                            <center>Not Yet Validated<center>
                            </div>
                            <br>
                            <div class="cpw">
                            <center><a href="password.php">CHANGE PASSWORD</a></center>
                            </div>
                            <center><a href="logout.php"><img src="img/logout.png" width=15%></a></center>
                            </body>
                            <?php } }
                        
                    else if(mysqli_num_rows($staff) > 0 || mysqli_num_rows($student) > 0) { ?>
                        <head>
                            <title>Welcome</title>
                            <style>
                                body{
                                    background-image: url("img/bg1.png");
                                    background-repeat: no-repeat;
                                    background-position: 0% 0%;
                                    background-size: 100%;
                                }
                                .container {
                                width: 100%;
                                height: 100%;
                                position: relative;
                                text-align: center;
                                margin: 0 auto;
                                }

                                .img1 {
                                display: flex;
                                align-items: center;
                                width: 35%;
                                padding-top: 30px;
                                padding-bottom: 30px;
                                }

                                h1 {
                                color:  white;
                                font-family: 'Roboto', sans-serif;
                                font-size: 35px;
                                }

                                .details {
                                margin-left: 10%;
                                background-color: rgba(0, 0, 0, 0.7);
                                font-family: 'Roboto', sans-serif;
                                float:  left;
                                width: 40%;
                                height: 100%px;
                                }

                                .personalinfo {
                                text-align: left;
                                padding-top: 20px;
                                padding-left: 10%;
                                font-family: 'Roboto', sans-serif;
                                color:  white;
                                font-size: 17px;
                                }

                                .doses {
                                display: flex;
                                }

                                .firstdose {
                                text-align: left;
                                padding-left: 10%;
                                width: 50%;
                                font-family: 'Roboto', sans-serif;
                                color:  white;
                                font-size: 17px;
                                }

                                .seconddose {
                                text-align: left;
                                padding-left: 10%;
                                width: 50%;
                                font-family: 'Roboto', sans-serif;
                                color:  white;
                                font-size: 17px;
                                padding-bottom: 20px;
                                }

                                .vaxcert {
                                font-family: 'Roboto', sans-serif;
                                height: 100%;
                                align: center;
                                }

                                .functions {
                                display: flex;
                                position: absolute;
                                justify-content: center;
                                bottom: 10px;
                                width: 98%;
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
                                font-family: 'Roboto', sans-serif;
                                font-size: 35px;
                                transition:  0.6s ease;
                                margin: 5px;
                                }

                                .button:hover {
                                background-color: black;
                                color: white;
                                }

                                h2{
                                color:  white;
                                font-family: 'Roboto', sans-serif;
                                font-size: 35px;
                                background-image: url("img/blue1.png");
                                background-repeat: no-repeat;
                                background-position: 87.5%;
                                background-size: 35%;
                                margin-top: 0;
                                }
                            </style>
                        </head>
                        <?php if(mysqli_num_rows($student) > 0){ ?>
                            <body>
                                <div class="container">
                                <div class="logo">
                                    <center><img class="img1" src="img/login_logo.png" width=60%></center>
                                </div>
                                <div class="details">
                                    <h1> DETAILS </h1>
                                    <div class="personalinfo">
                                        <p> PERSONAL DETAILS </p>
                                        <p> First Name: <?php echo $studentresult['studentFname']; ?> </p>
                                        <p> Middle Name: <?php  echo $studentresult['studentMname']; ?> </p>
                                        <p> Last Name: <?php  echo $studentresult['studentLname']; ?> </p>
                                        <p> Suffix: <?php  echo $studentresult['studentExt']; ?> </p>
                                        <p> Birthdate: <?php  echo $studentresult['studentBirthdate']; ?> </p>
                                        <p> Phone Number: <?php  echo $studentresult['studentPhone']; ?> </p>
                                    </div>
                                    <div class="doses">
                                        <div class="firstdose">
                                            <p> VACCINATION DETAILS </p>
                                            <p> First Dose: </p>
                                            <p> Date Given: <?php  echo $studentresult['studentDateGiven1']; ?> </p>
                                            <p> Vaccine: <?php  echo $studentresult['studentVac1']; ?> </p>
                                            <p> Brand: <?php  echo $studentresult['studentBrand1']; ?> </p>
                                            <p> Lot Number: <?php  echo $studentresult['studentLot1']; ?> </p>
                                            <p> Country: <?php  echo $studentresult['studentCountry1']; ?> </p>
                                        </div>
                                        <div class="seconddose">
                                            <p> &nbsp; </p>
                                            <p> Second	 Dose: </p>
                                            <p> Date Given: <?php  echo $studentresult['studentDateGiven2']; ?> </p>
                                            <p> Vaccine: <?php  echo $studentresult['studentVac2']; ?> </p>
                                            <p> Brand: <?php  echo $studentresult['studentBrand2']; ?> </p>
                                            <p> Lot Number: <?php  echo $studentresult['studentLot2']; ?> </p>
                                            <p> Country: <?php  echo $studentresult['studentCountry2']; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="vaxcert">
                                    <h2>VACCINATION CERTIFICATE</h2>
                                    <iframe src="pdf/<?php echo $studentresult['studentPDF']; ?>" width='30%' height='600px';></iframe>
                                </div>
                            </div>
                            <div class="functions">
                                <form>
                                <button type="submit" class="button" formaction="password.php"> CHANGE PASSWORD </button>			
                                <button type="submit" class="button" formaction="logout.php"> LOGOUT </button>
                                </form>
                            </div>
                            </body>
                        <?php }
                        else { ?>
                            <body>
                                <div class="container">
                                <div class="logo">
                                    <center><img class="img1" src="login_logo.png" width=60%></center>
                                </div>
                                <div class="details">
                                    <h1> DETAILS </h1>
                                    <div class="personalinfo">
                                        <p> PERSONAL DETAILS </p>
                                        <p> First Name: <?php echo $staffresult['staffFname']; ?> </p>
                                        <p> Middle Name: <?php  echo $staffresult['staffMname']; ?> </p>
                                        <p> Last Name: <?php  echo $staffresult['staffLname']; ?> </p>
                                        <p> Suffix: <?php  echo $staffresult['staffExt']; ?> </p>
                                        <p> Birthdate: <?php  echo $staffresult['staffBirthdate']; ?> </p>
                                        <p> Phone Number: <?php  echo $staffresult['staffPhone']; ?> </p>
                                    </div>
                                    <div class="doses">
                                        <div class="firstdose">
                                            <p> VACCINATION DETAILS </p>
                                            <p> First Dose: </p>
                                            <p> Date Given: <?php  echo $staffresult['staffDateGiven1']; ?> </p>
                                            <p> Vaccine: <?php  echo $staffresult['staffVac1']; ?> </p>
                                            <p> Brand: <?php  echo $staffresult['staffBrand1']; ?> </p>
                                            <p> Lot Number: <?php  echo $staffresult['staffLot1']; ?> </p>
                                            <p> Country: <?php  echo $staffresult['staffCountry1']; ?> </p>
                                        </div>
                                        <div class="seconddose">
                                            <p> &nbsp; </p>
                                            <p> Second	 Dose: </p>
                                            <p> Date Given: <?php  echo $staffresult['staffDateGiven2']; ?> </p>
                                            <p> Vaccine: <?php  echo $staffresult['staffVac2']; ?> </p>
                                            <p> Brand: <?php  echo $staffresult['staffBrand2']; ?> </p>
                                            <p> Lot Number: <?php  echo $staffresult['staffLot2']; ?> </p>
                                            <p> Country: <?php  echo $staffresult['staffCountry2']; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="vaxcert">
                                    <h1> VACCINATION CERTIFICATE </h1>
                                    <iframe src="pdf/<?php echo $staffresult['staffPDF']; ?>" width='30%' height='600px';></iframe>
                                </div>
                            </div>
                            <div class="functions">
                                <form>
                                <button type="submit" class="button" formaction="password.php"> CHANGE PASSWORD </button>			
                                <button type="submit" class="button" formaction="logout.php"> LOGOUT </button>
                                </form>
                            </div>
                            </body>
                        <?php } } 
                    else{   ?>
                        <head>
                        <title>Input Vaccination Details</title>
                            <style>
                                body {
                                background-image: url("img/bg1.png");
                                background-repeat: no-repeat;
                                background-position: 0% 0%;
                                background-size: 100%;
                                font-family: Bebas Neue;
                                margin: 0px;
                                font-size: 50px;
                                }

                                a { 
                                text-decoration: none;
                                font-family: Bebas Neue;
                                color: white;
                                }

                                .input {
                                background-image: url("img/red2.png");
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: 60%;
                                margin-top: 14%;
                                font-size: 80px;
                                color: white;
                                }

                                .cpw {
                                background-image: url("img/black1.png");
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: 35%;
                                margin-top: -2%;
                                margin-bottom: 7%;
                                }
                            </style>
                </head>
                <body>
                <div class="logo">
                <center><img class="img1" src="img/login_logo.png" width=45% style="margin-top: 1%;"></center>
                </div>
                <div class="input">
                    <center><a href="registration.php">INPUT VACCINATION DETAILS</a></center>
                </div>
                <br>
                <div class="cpw">
                <center><a href="password.php">CHANGE PASSWORD</a></center>
                </div>
                <center><a href="logout.php"><img src="img/logout.png" width=15%></a></center>
            </body>
        </hmtl>
<?php }
    }
    else {
        header("Location: form.php");
        exit();
    }
?>
