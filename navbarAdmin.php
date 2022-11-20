<nav class="navbar navbar-expand-lg fixed-top navbar-dark fade_90">
          <a class="navbar-brand" href="#"><img src="images/Logo.png" style="height:30px; width:30px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orderhistory.php">Order History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inventory/menu.php">Inventory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="queriesAdmin.php">Customer Queries</a>
              </li>
            </ul>
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