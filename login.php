<?php
	session_start();
	require("functions.php");
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['userlogin']);
	}
?>
<html>
    <head>
    <title>Valmerch Login</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <script src="js/register1.js"></script>
      <script src="js/login.js"></script>
      <style>
        .log {
          background-color: rgba(85, 91, 110, 0.548);
  }

        .login{
          margin-bottom: auto;
        }

        .but-login{
          background-color: #FFD6BA;
        }
      </style>
    </head>
    <body  class="bg">
        <?php
          include 'navbar.php';
        ?>

              <div class="container">
                <div class="row">
                  <div class="col log login mr-2 rounded"><h1>Login</h1>
                    <form name="formLogin" method="POST">
                    <div class="form-group form-signin">
                      <label for="emailLogin">Email address</label>
                      <input type="email" class="form-control" id="emaillogin" aria-describedby="emailHelp" placeholder="Enter email"
                    onkeyup="if(this.value.length >0){document.getElementById('btnLogin').disabled = false;} else {document.getElementById('btnLogin').disabled = true;}">
                    </div>
                    <div class="form-group">
                      <label for="passwordLogin">Password</label>
                      <input type="password" class="form-control" id="passwordlogin" placeholder="Password"
                      onkeyup="if(this.value.length >0){document.getElementById('btnLogin').disabled = false;} else {document.getElementById('btnLogin').disabled = true;}">
                    </div>
                    <button type="submit" class="btn but-login cbtn" id="login" >Login</button>
                  </form></div>
                    <div class="col log rounded"><h1>Sign-up</h1>
                    <form name="formSignup" method="POST">
                      <div class="row">
                        <div class="col">
                        <div class="form-group">  
                          <label for="fname">First name</label>
                          <input type="text" class="form-control" id="fname" placeholder="First Name" pattern="[a-zA-Z\s]+"required>
                        </div></div>
                        <div class="col">
                          <div class="form-group">  
                            <label for="lname">Last name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" pattern="[a-zA-Z\s]+"required>
                          </div>
                      </div>                        
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="userid" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                        <label for="Contact Number">Contact Number</label>
                        <input type="number" class="form-control" id="contact" placeholder="Contact Number" required>
                      </div>
                      <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                        <label for="Email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                      </div>
                      <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <label for="passwordConfirm">Confirm Password</label>
                        <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password" required>
                      </div>
                      <button type="submit" id="register"  class="btn but-login">Sign-up</button>
                    </form>
                  </div>                  
                </div>                
              </div>
        </div>


        
        <?php
  include 'footer.php';
?>
<script>
  console.log(<?$_SESSION['userlogin']?>);
</script>
<!-- <script>
function validLoginForm(){
  var emailLogin = document.forms["formLogin"]["emailLogin"].value;
  var passwordLogin = document.forms["formLogin"]["passwordLogin"].value;
  if (emailLogin == "" || emailLogin == " "){
    alert("Email must be filled out");
    return false;
  }
  else if (passwordLogin == "" || passwordLogin == " "){
    alert("Password must be filled out");
    return false;
  }
  else{alert("Welcome, Happy Shopping");
return true;}
}

function validSignupForm(){
 var fname = document.getElementById("fname").value.toLowerCase();
 var fame = fname.substring(1, fname.length);
 var pfname = fname.charAt(0).toUpperCase() + fame;

 var lname = document.getElementById("lname").value.toLowerCase();
 var lame = lname.substring(1, lname.length);
 var plname = lname.charAt(0).toUpperCase() + lame;
 
 var contact = document.getElementById("contact").value;
 var address = document.getElementById("address").value;
 var email = document.getElementById("email").value;
 var password = document.getElementById("password").value;
 var passwordConfirm = document.getElementById("passwordConfirm").value;
 

        
        if(fname == "" || lname == "" || contact == "" || address == "" || email == ""||password == ""||passwordConfirm=="")
        {alert("Please Input all fields");
         return false;}
        else { if(passwordConfirm != password){
          alert("Passwords Not Matching!");
          return false;}
          else{
            alert("Thanks for Signing-up "+pfname+" "+plname);
            return true;
          }
        }
      }



    </script> -->
  </body>
</html>