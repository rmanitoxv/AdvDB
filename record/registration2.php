<?php
session_start();
require ('config.php');
if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
  $id = $_SESSION['userID'];
  $online = mysqli_query($con, "SELECT * FROM login WHERE userID = '$id'");
  $result =  mysqli_fetch_assoc($online);
  if ($result['isAdmin'] == 1){
      header ("Location: admin.php");
  }
if(isset($_POST["submit"])){
  if($_FILES["pdf"]["error"] == 4){
    echo
    "<script> alert('pdf Does Not Exist'); </script>"
    ;
  }
  else{
    $id = $_SESSION['userID'];
    $fileName = $_FILES["pdf"]["name"];
    $fileSize = $_FILES["pdf"]["size"];
    $tmpName = $_FILES["pdf"]["tmp_name"];

    $validpdfExtension = ['pdf'];
    $pdfExtension = explode('.', $fileName);
    $pdfExtension = strtolower(end($pdfExtension));
    if ( !in_array($pdfExtension, $validpdfExtension) ){
      echo
      "
      <script>
        alert('Invalid PDF Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('PDF Size Is Too Large');
      </script>
      ";
    }
    else{
      $newpdfName = uniqid();
      $newpdfName .= '.' . $pdfExtension;

      move_uploaded_file($tmpName, 'pdf/' . $newpdfName);
      $query = ("UPDATE registration SET regPDF='$newpdfName' WHERE registrationID=$id");
      if(mysqli_query($con, $query)){
        echo
        "
        <script>
            alert('Successfully Added');
            document.location.href = 'index.php';
        </script>
        ";
      }
      else{"
        <script>
        alert('Error');
    </script>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Vaccination Certificate</title>
    <style>
      body {
        background-image: url("img/bg1.png");
        background-repeat: no-repeat;
        background-position: 0% 0%;
        background-size: 100%;
        font-family: Bebas Neue;
      }

      input[type=file]{
        position: relative;
        padding: 10px 18px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px white;
        border-radius: 4px;
        font-size: 30px;
        font-family: 'Roboto';
        color: white;
      }

      .container {
        width: 100%;
        height: 100%;
        position: relative;
        text-align: center;
        margin: 0 auto;
      }

      .vaxcert {
        padding-top: 10%;
      }

      .button {
        padding-top: 3%;
      }

      h1 {
        background-image: url("img/red2.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 65%;
        font-family: 'Roboto';
        font-size: 70px;
        color: white;
        padding-bottom: 8px;
        margin-bottom: 0;
      }

      .choose{
        background-image: url("img/black1.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 35%;
        margin: 2.5%;
        f
      }

      label[for=pdf]{  
        font-family: 'Roboto';
        font-size: 65px;
        color: white;
        transition:  0.6s ease;
      }

      label[for=pdf]:hover{
        color: #9B111E;;
      }

      input[type=submit]{
        background-color: white;
        border: none;
        border-radius: 100px;
        color: black;
        padding: 15px 55px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-family: 'Roboto';
        font-size: 25px;
        transition:  0.6s ease;
      }

      input[type=submit]:hover {
        background-color: black;
        color: white;
      }
      input[type=file]::file-selector-button { 
        display: none;
      }
      input[type=file] { 
        width: 25%;
      }
      .middle{ 
        background-image: url("img/black1.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 30%;
        margin: auto;
        display: block;
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
		<div class="container">
			<div class="vaxcert">
        <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
          <h1> VACCINATION CERTIFICATE </h1>
          <div class="choose"><label for="pdf">CHOOSE FILE</label></div>
          <div class="middle"><input type="file" name="pdf" id="pdf" accept=".pdf"></div>
          <div class="button">
          <input type="submit" name="submit" value="SUBMIT">
        </form>
    <br>
  </body>
</html>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>