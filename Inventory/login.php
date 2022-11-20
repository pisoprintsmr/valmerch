
<?php
     include "header.php";
?>

        <?php
          include 'navbarAdmin.php';
        ?>

<form action="include/login.php" method="post">

 <div class="container col-6">
        <div class="card bg-tan">
            <div class="title  card-header">
             <i class="fas fa-user"></i>
                ADMIN
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group my-2">
                        
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group my-2">
                        
                        <input type="password" name="password" class="form-control" >
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn bg-white shadow" name="lgn"><i class="fas fa-key fa-xl"></i>Login</button>
            </div>
            
        </div>
    </div>

</form>

<?php
     include "footer.php";
?>

