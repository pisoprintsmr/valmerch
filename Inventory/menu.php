<?php
	include 'header.php';
	include './database.php';
	$sqlstatement="SELECT * FROM product";
	$result= mysqli_query($connect, $sqlstatement);
	include 'navbarAdmin.php';
	
	
	
?>


<div class="mx-2 fade_body imglog1">
	<div class="card-header">

		
	</div>
	<div class="card-body">
		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th>#</th>
		      <th>Product</th>
		      <th>Price</th>
		      <th>Quantity</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
			$i=0;
		    	while($data= mysqli_fetch_assoc($result)){
		    ?>
		    <tr>
			    <td><p><?php echo $data['id']?></p></td>
			    <td><?php echo $data['prod_name']?></td>
			    <td><?php echo $data['prod_price']?></td>
			    <td><?php echo $data['prod_qty']?></td>
			    <td><a class="btn btn-success mx-1" href=<?php echo '"edit.php?id='.$data['id'].'"' ?>><span class="fas fa-edit"></span> View</a><a class="btn btn-danger" href=<?php echo '"include/delete.php?id='.$data['id'].'"' ?>><span class="fas fa-trash"></span> Delete</a></td>
				
				
				
				<td><a href="delete-process.php?cafeid=<?php echo $row["cafeid"]; ?>">Delete</a></td>
			</tr>
			
				
		<?php 
		$i++;
		} 
		?>
		  </tbody>
		</table>
	</div>
</div>

<?php
     include "footer.php";
?>