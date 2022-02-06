<?php
session_start();
include("config.php");
if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {

if(isset($_POST["submit"])){
  $id = $_SESSION['userID'];
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $lname = $_POST["lname"];
  $nameext = $_POST["nameext"];
  $birthdate = $_POST["birthdate"];
  $phone = $_POST["phone"];
  $date_given1 = $_POST["date_given1"];
  $country1 = $_POST["country1"];
  $lot_number1 = $_POST["lot_number1"];
  $vaccine1 = $_POST["vaccine1"];
  $brand1 = $_POST["brand1"];
  $date_given2 = $_POST["date_given2"];
  $country2 = $_POST["country2"];
  $lot_number2 = $_POST["lot_number2"];
  $vaccine2 = $_POST["vaccine2"];
  $brand2 = $_POST["brand2"];
      $query = "INSERT INTO registration VALUES($id, '$fname', '$mname', '$lname', '$nameext', '$birthdate', '$phone', '$date_given1', '$vaccine1', '$brand1', '$lot_number1', '$country1', '$date_given2', '$vaccine2', '$brand2', '$lot_number2', '$country2', '')";
      mysqli_query($con, $query);
      echo "Successfully Registered";
      header ("Location: registration2.php");
      exit();
  }
  }
else {
    header("Location: form.php");
    exit();
}
?>
