<?php
  include 'database.php';
	// session_start();
	require("../functions.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Valmerch</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="../style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <style>
body, html {
    height: 100%;
  }
  .bg {
    /* The image used */
    background-image:linear-gradient(to bottom, rgba(252, 252, 252, 0.288) , rgba(68, 36, 25, 0.288)), url("../images/bg1.jpg");
  
    /* Full height */
    height: 100%;
  
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .box {
  	background-color: #D2B48C !important;

  }

.bg-tan{
    background-color: #D2B48C !important;
}
.title{
    font-size: larger;
    font-weight: bolder;
}
.card{
    margin-top: 10rem !important;
}
i{
    margin: 0 .5rem !important;
}

.fade_90{
    background-color: rgba(0, 0, 0, 0.288);
  }
  
 textarea{
 	resize: none !important;

 }

.log {
          background-color: rgba(68, 36, 25, 0.849);
          color: rgb(213, 193, 170);
        }

.login{
  margin-bottom: auto;
}

.but-login{
  background-color: #D5C1AA;
}

.imglog{
  filter: drop-shadow(20px 10px 0.75rem rgb(68, 36, 25));
}

.imglog1{
  filter: drop-shadow(-20px 10px 0.75rem rgb(68, 36, 25));
}

.imglog2{
  filter: drop-shadow(0 0 1rem rgb(68, 36, 25));
}
</style>

</head>

<body class="bg" >

