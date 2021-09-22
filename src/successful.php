<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"      rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">

  <title>Successfully Changed</title>
</head>
<body>
  <img src="images/UpdatedVCUHeader.jpg" height="63px" width="100%" />

  <nav class="navbar navbar-light navbar-expand-md text-right" style="background:#333333;">
    <div class="container-fluid"><a class="navbar-brand" href="#"><img src="images/eIDLogo.jpeg" height="79px" width="144px"></a>

      <h1 style="padding-top: 11px; margin-right: 12%; font-size: 25px; text-align: center; color:white; font-family: sans-serif;">
        Account Management Portal
      </h1>
      <div class="d-md-flex justify-content-md-end" id="navcol-1"><i class="fa fa-bell"></i>
      </div>
    </div>
  </nav>

  <p id="para">Password changed Successfully!</p>
  <div id="green-box">
    <p>You have been logged out of Account Management Portal.<br>
      Please close your browser.</p>
  </div>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
    crossorigin="anonymous"></script>
</body>
</html>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $database = "u520126276_users";
    $username = "u520126276_admin";
    $password = "414Project";

    $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
    PDO::ATTR_EMULATE_PREPARES => false
    ];

    // make connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $set_info = $conn->prepare('INSERT INTO users (eid,currentpassword,newpassword,newpasswordconfirm) VALUES (?,?,?,?)');
    $set_info->bindValue(1,$_POST['eid']);
    $set_info->bindValue(2,$_POST['currentpassword']);
    $set_info->bindValue(3,$_POST['newpassword']);
    $set_info->bindValue(4,$_POST['newpasswordconfirm']);
    $set_info->execute();

?>