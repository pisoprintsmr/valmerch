<?php
    include "header.php";
    include 'navbarAdmin.php';
	$id=$_GET['id'];
	$sqlstatement="SELECT * FROM product WHERE id=".$id;
	$result=mysqli_query($connect,$sqlstatement);
	$data=mysqli_fetch_assoc($result);
	$product=$data['prod_name'];
	$price=$data['prod_price'];
	$quantity=$data['prod_qty'];

	if (isset($_POST['save'])) {
		$product=$_POST['Product'];
		$price=$_POST['Price'];
		$quantity=$_POST['Quantity'];

		$sqlstatement="UPDATE product SET prod_name = '$product', prod_price = '$price', prod_qty= '$quantity'  WHERE ID = '$id'";
		mysqli_query($connect,$sqlstatement);
		header('location:menu.php');
	}

?>

<form method="post" action="">
	<div class="container col-6">
        <div class="fade_caro imglog1 rounded">
            <div class="title  card-header">
             <i class="fas fa-edit"></i>
                EDIT
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="Product">Product</label>
                    <div class="input-group my-2">
                        
                        <textarea class="form-control" rows="1" name="Product"><?php echo $product ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Price">Price</label>
                    <div class="input-group my-2">
                        
                        <input type="text" autocomplete="off" name="Price" class="form-control" value=<?php echo $price ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group my-2">
                        
                        <input type="text" autocomplete="off" name="Quantity" class="form-control" value=<?php echo $quantity ?>>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn bg-white shadow" name="save"><i class="fas fa-save fa-xl"></i>Save</button>
            </div>
            
        </div>
    </div>
</form>





<?php
     include "footer.php";
?>