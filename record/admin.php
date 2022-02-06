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
?>
        <!DOCTYPE php>
        <php>
            <head>
                <style>
                    body {
                        font-size: 0px;
                        margin: 0px;
                    }
                    table {
                        margin-top:2%;
                        margin-bottom:2%;
                    }
                </style>
                <title>
                    Admin
                </title>
                </head>
            <body>

            <table width=100%>
                <tr><td width=2%></td><td width=80% height=20%>               
                <img src="img/admin_logo.png" width=70%>
                </a>
                </td>

                <td>
                <a href="logout.php">
                <center>
                <img src="img/admin_logoutbutton.png" alt="Logout" width=75%>
                </a>
                </td>
                </tr>
                </table>


                <center>
                <a href="newuser.php">
                <img src="img/admin_newuser.png" alt="New User" width=100%>
                </a>

                <a href="validatestudents.php">
                <img src="img/admin_student.png" alt="Student" width=100%>
                </a>

                <a href="validatestaff.php">
                <img src="img/admin_staff.png" alt="Staff" width=100%>
                </a>
                </center>

            </body>
        </php>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>
