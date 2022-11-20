<?php
	
  include ('database.php');
	session_start();
	require("functions.php");
	$sqlstatement="SELECT * FROM order_history";
	$result= mysqli_query($connect, $sqlstatement);
	include 'navbarAdmin.php';
?>
<html>

  <head>
  <title>Bread Joint Online</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- <link rel="stylesheet" type="text/css" href="menustyle.css"> -->
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <script src="js/menu.js"></script>
  </head>
    <body class="bg">
    <div class="mx-2 fade_body imglog1">
	<div class="card-header">

		
	</div>
	<div class="card-body">
		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th>#</th>
			  <th>Username of Customer</th>
			  <th>Date</th>
        <th>Orders</th>
        <th>Total Amount</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	while($data= mysqli_fetch_assoc($result)){
		    ?>
		    <tr>
			    <td><p><?php echo $data['id']?></p></td>
				<td><?php echo $data['userid']?></td>
				<td><?php echo $data['date']?></td>
          <td><?php echo $data['orders']?></td>
          <td><?php echo $data['price']?></td>
			</tr>	
		<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
    </body>

</html>
