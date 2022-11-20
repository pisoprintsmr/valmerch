<nav class="navbar navbar-expand-lg fixed-top navbar-dark fade_90">
          <a class="navbar-brand" href="#"><img src="images/Logo.png" style="height:30px; width:30px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Help
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="faqs.php">FAQ</a>
                  <a class="dropdown-item" href="queries.php">Queries</a>
                  <a class="dropdown-item" href="policy.php">Policies</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="aboutdevs.php">Our Team</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
            </ul>
            <div class="dropdown">
              <button class="btn my-2 my-sm-0" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" style="color:white;" aria-expanded="false">
                <span class="fa fa-shopping-cart"></span>  Cart
              </button>
              <div class="dropdown-menu dropdown-cart overflow-auto style-2" aria-labelledby="navbarDropdown1" id="show-cart12" style="width: 300; left:-130 ;">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="payment.php">Already in checkout</a>
              </div>
            </div>
            <?php
              if(!isset($_SESSION['userlogin'])){
                echo"<a href=\"login.php\"><button class=\"btn btn-success my-2 my-sm-0\"><span class=\"fa fa-user\"></span>Login</button></a>";
              }
              else if(isset($_SESSION['userlogin'])){
                echo"<a href=\"index.php?logout=true\"><button class=\"btn btn-danger my-2 my-sm-0\"><span class=\"fa fa-user\"></span>Logout</button></a>";
              }
            ?>
              
              
          </div>
        </nav>
        <br><br><br>