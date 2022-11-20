<?php
	require_once('config.php');
	session_start();
	require("functions.php");
  
  if(!isset($_SESSION['userlogin'])){
		
	}
	else{
		$sql2 = "SELECT * FROM ".$_SESSION['userlogin']['userid']."";
		$stmt = $db->prepare($sql2);
		$stmt->execute();
		$cartAccount = $stmt->fetchAll();
		$_SESSION['cart'] = $cartAccount;
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
  }
  
  $sql1 = "SELECT * FROM product";
  $stmt=$db->prepare($sql1);
  $stmt->execute();
  $allProducts = $stmt->fetchAll();
  $_SESSION['product'] = $allProducts;
?>
<html>
    <head>
    <title>Products</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="menustyle.css">
      <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <script src="js/menu.js"></script>
    </head>
    <body  class="bg">
        <?php include 'navbar.php' ?>
	  
	  
	  

<center><div class="product-title" >
<br>
      <h2><strong>BJ's Best Sellers</strong></h2>
	  <strong><p style="font-size:15px;">Our most popular products are based on the amount baked on Bread Joint's</p></strong>
     
	  
	  </div>
	  </center>
	
	  

      <section id="show-prod" class="products">
        

      </section>

<center><div class="product-title" >
<br>
      <h2><strong>BJ's Hot from the Oven</strong></h2>
	  	  <strong><p style="font-size:15px;">Our Bread Joint Bread and Pastries are baked fresh for you to order.</p></strong>
	  
     
	  
	  </div>
	  </center>

      <section id="show-prod1" class="products">
        
      </section>
     

     

      <?php
  include 'footer.php';
?>
      <script>
          $(".addthis1").click(function(event){
          event.preventDefault();
          var name = $(this).attr("data-name");
          var cafepic = $(this).attr("data-cafepic");
          var cafeid = $(this).attr("data-cafeid");
          var price = document.getElementById("priceOf"+cafeid).val;
          var count = document.getElementById("cafe"+cafeid).val;

          addItemToCart(name, price, count, cafepic);
          displayCart();
      });

      $("#clear-cart").click(function(event){
          clearCart();
          displayCart();
      })


      function displayCart() {
          var cartArray = listCart();
          var output = "";
          
          for (var i in cartArray) {
              output += "<a class=\"dropdown-item\">"
                        +"<div class=\"row mb-0\">"
                          +"<div class=\"col-sm-7\">"
                            +"<p style=\"text-overflow: ellipsis;\"><img src='"+cartArray[i].cafepic+"' height=\"30\" width=\"30\"> "+cartArray[i].name+"</p>"
                          +"</div>"
                          +"<div class=\"col\">"
                            +"<p style=\"font-size: 80%;\">x "+cartArray[i].count+"<br>P "+cartArray[i].price+"</p>"
                          +"</div>"
                          +"<div class=\"col\" id=\"del-cart\">"
                            +"<button type=\"button\" class=\"close clearThis\" data-name='"+cartArray[i].name+"' data-price='"+cartArray[i].price+"' aria-label=\"Close\">"
                              +"<span aria-hidden=\"true\">&times;</span>"
                            +"</button>"
                          +"</div>"
                        +"</div>"
                      +"</a>"
          }

          output +="<div class=\"dropdown-divider\"></div>"
                +"<a class=\"dropdown-item\" href=\"payment.php\">Proceed to Checkout</a>"
                +"<div class=\"dropdown-divider\"></div>"
                +"<a class=\"dropdown-item\" href=\"topup.php\">Top-up</a>"


          $("#show-cart").html(output);
          $("#total-cart").html(totalCart());
          $("#total-count").html(countCart());
      }

      $("#del-cart").on("click",".delete-item", function(event){
          var name = $(this).attr("data-name");
          var price = $(this).attr("data-price");
          removeItemFromCartAll(name,price);
          displayCart();
      })

      $("#show-cart").on("click",".subtract-item", function(event){
          var name = $(this).attr("data-name");
          removeItemFromCart(name);
          displayCart();
      })

      $("#show-cart").on("click", ".plus-item", function(event){
          var name = $(this).attr("data-name");
          addItemToCart(name, 0 ,1);
          displayCart();
      })

      //*************************
      //Shopping Cart Functions
      var $_SESSION = <?php echo json_encode($_SESSION); ?>;
      var productsAll = <?php echo json_encode($_SESSION['product'],JSON_NUMERIC_CHECK); ?>;
      var cart = <?php 
          if(!isset($_SESSION['userlogin'])){
            echo '[]';
          }
          else{
            echo json_encode($_SESSION['cart'],JSON_NUMERIC_CHECK);
          }
          ?>;
      var Item = function(name, price, count, cafepic) {
          this.name = name
          this.price = price
          this.count = count
          this.cafepic = cafepic
      }

      function addItemToCart(name, price, count, cafepic){
          for(var i in cart) {
              if (cart[i].name === name){
                  cart[i].count+=count;
                  
                  return;
              }
          }
          var item = new Item(name, price, count, cafepic);
          cart = cart  || [];
          cart.push(item);

          
      }


      function removeItemFromCart(name, price){
          for(var i in cart) {
              if(cart[i].name === name && cart[i].price === price) {
                  cart[i].count --;
                  if( cart[i].count === 0) {
                      cart.splice(i, 1)
                  }
                  break;
              }
          }

      }


      function removeItemFromCartAll(name){
          for(var i in cart){
              if(cart[i].name === name){
                  cart.splice(i, 1)
                  break;
              }
          }

      }


      function clearCart(){
          cart = [];
          //<?php
          //$sql = "DELETE FROM ".$_SESSION['userlogin']['userid']."";
          //$stmt = $db->prepare($sql);
          //$stmt->execute();
          //?>

      }




      function countCart() {
          var totalCount = 0;
          for(var i in cart) {
              totalCount += cart[i].count;
          }
          
          return totalCount;
      }



      function totalCart() {
          var totalCost = 0;
          for(var i in cart){
              totalCost += cart[i].price * cart[i].count;
          }
          return totalCost.toLocaleString();
      } 



      function listCart() {
          var cartCopy = [];
          for (var i in cart){
              var item = cart[i];
              var itemCopy = {};
              for (var p in item) {
                  itemCopy[p] = item[p];
              }
              itemCopy.total = (item.price * item.count).toFixed(2);
              cartCopy.push(itemCopy);
          }
          return cartCopy;
      } 

      function loadCart() {
          $_SESSION = <?php echo json_encode($_SESSION); ?>;
          cart = <?php 
          if(!isset($_SESSION['userlogin'])){
            echo '[]';
          }
          else{
            echo json_encode($_SESSION['cart'],JSON_NUMERIC_CHECK);
          }
          ?>;
          //cart = JSON.parse(localStorage.getItem("shoppingCart"));
          console.log(cart);
      }

      $(function(){
              $('.clearThis').click(function(e){
                var name = $(this).attr("data-name");
                var price = $(this).attr("data-price");
                  e.preventDefault();
                      $.ajax({
                          type: 'POST',
                          url: 'processdelete.php',
                          data:{name:name, price:price},
                          success:function(){
                              setTimeout(function(){location.reload();}, 1000);
                              loadCart();
                              displayCart();
                              console.log(cart);
                              Swal.fire({
                                  'title': 'Success!',
                                  'text': 'Removed from cart',
                                  'type': 'success',
                                  showConfirmButton: false
                              })
                              
                          },
                          erros:function(){
                              Swal.fire({
                                  'title': 'Error',
                                  'text': 'There were errors while saving the data',
                                  'type': 'error'
                              })
                          }
                      });
                      
              })
              
          });

      $(function(){
              $('.addthis').click(function(e){
                var name = $(this).attr("data-name");
                var cafepic = $(this).attr("data-cafepic");
                var cafeid = $(this).attr("data-cafeid");
                var a = "priceOf"+cafeid;
                var b = "cafe"+cafeid;
                console.log(document.getElementById(a).value);
                var price = Number(document.getElementById(a).value);
                var count = Number(document.getElementById(b).value);
                  e.preventDefault();
                  if(count>0){
                    $.ajax({
                      type: 'POST',
                      url: 'processadd1.php',
                      data:{name:name, price:price, cafepic:cafepic, count:count},
                      success:function(data){
                          setTimeout(function(){location.reload();}, 1000);
                          loadCart();
                          displayCart();
                          Swal.fire({
                              'text': data,
                              
                              showConfirmButton: false
                          })
                      },
                      erros:function(data){
                          Swal.fire({
                              'title': 'Error',
                              'text': 'There were errors while saving the data',
                              'type': 'error'
                          })
                      }
                  });
                  }
                  else{

                  }
              })
          });

          function displayMenu(){
            $_SESSION = <?php echo json_encode($_SESSION); ?>;
             
            var output="";
            var output1="";
            
            for(var i=0;i<9;i++){
              if(productsAll[i].cafeid==(i+1)||i==((productsAll[i].cafeid-1)*3)){
                if(productsAll[i].prod_qty>=0){
                  if(productsAll[i].prod_price<4){
                output+="<div class=\"product-card\" style=\"position:relative;\"><span class=\"status\" style=\"position:absolute; top:0px; left:0px;\" >  </span>"
                          +"<div class=\"product-image\">"
                            +"<img src=\""+productsAll[i].cafepic+"\"  class=\"imgprod shadow\">"
                          +"</div>"
                          
                          +"<div class=\"product-info\">"
                            +"<h3 style=\"color:#555b6e\">"+productsAll[i].prod_name+"</h3>"
                            +"<form class=\"frm\">"
                              +"<div class=\"value-button shadow\" id=\"decrease"+productsAll[i].cafeid+"\" onclick=\"decreaseValue("+productsAll[i].cafeid+")\"><strong>-</strong></div>"
                              +"<input type=\"number\" id=\"cafe"+productsAll[i].cafeid+"\" value=\"0\" disabled/>"
                              +"'<div class=\"value-button shadow\" id=\"increase"+productsAll[i].cafeid+"\" onclick=\"increaseValue("+productsAll[i].cafeid+")\"><strong>+</strong></div>"
                              +"<p style=\"color:#555b6e\"><strong>Quantity</strong></p>"
                            +"</form>"
                            
                            +"<select id=\"priceOf"+productsAll[i].cafeid+"\">"
                              +"<option value=\""+productsAll[i].prod_price+"\">Small - ₱"+productsAll[i].prod_price+"</option>"
                              +"<option value=\""+productsAll[(i+1)].prod_price+"\">Medium - ₱"+productsAll[(i+1)].prod_price+"</option>"
                              +"<option value=\""+productsAll[(i+2)].prod_price+"\">Large - ₱"+productsAll[(i+2)].prod_price+"</option>"

                            +"</select>"
                            +"<br><br>"
                            +"<div class=\"card1\">"
                              +"<p style=\"color:#555b6e\"><button class=\"addthis\" data-name=\""+productsAll[i].prod_name+"\" data-cafepic=\""+productsAll[i].cafepic+"\" data-cafeid=\""+productsAll[i].cafeid+"\"><strong><img src=\"images/cart.png\" class=\"asd\"><strong>&nbsp;ADD TO CART</strong></strong></button></p>"
                            +"</div>"
                          +"</div>"
                        +"</div>"
                  }
                  else{
                    output+="<div class=\"product-card\">"
                            +"<div class=\"product-image\">"
                                    +"<img src=\""+productsAll[i].cafepic+"\"  class=\"imgprod shadow\">"
                                  +"</div>"
                                  +"<div class=\"product-info\">"
                                    +"<h3 style=\"color:#555b6e\">"+productsAll[i].prod_name+"</h3>"
                                    +"<form class=\"frm\">"
                                      +"<div class=\"value-button shadow\" id=\"decrease"+productsAll[i].cafeid+"\" onclick=\"decreaseValue("+productsAll[i].cafeid+")\"><strong>-</strong></div>"
                                      +"<input type=\"number\" id=\"cafe"+productsAll[i].cafeid+"\" value=\"0\" disabled/>"
                                      +"'<div class=\"value-button shadow\" id=\"increase"+productsAll[i].cafeid+"\" onclick=\"increaseValue("+productsAll[i].cafeid+")\"><strong>+</strong></div>"
                                      +"<p style=\"color:#555b6e\"><strong>Quantity</strong></p>"
                                    +"</form>"
                                    +"<select id=\"priceOf"+productsAll[i].cafeid+"\">"
                                      +"<option value=\""+productsAll[i].prod_price+"\">Small - ₱"+productsAll[i].prod_price+"</option>" 
                                      +"<option value=\""+productsAll[(i+1)].prod_price+"\">Medium - ₱"+productsAll[(i+1)].prod_price+"</option>"
                                      +"<option value=\""+productsAll[(i+2)].prod_price+"\">Large - ₱"+productsAll[(i+2)].prod_price+"</option>"

                                    +"</select>"
                                    +"<br><br>"
                                    +"<div class=\"card1\">"
                                      +"<p style=\"color:#555b6e\"><button class=\"addthis\" data-name=\""+productsAll[i].prod_name+"\" data-cafepic=\""+productsAll[i].cafepic+"\" data-cafeid=\""+productsAll[i].cafeid+"\"><strong><img src=\"images/cart.png\" class=\"asd\"><strong>&nbsp;ADD TO CART</strong></strong></button></p>"
                                    +"</div>"
                                  +"</div>"
                                +"</div>"
                      }
                    }
                    else{
                      

                    }
                }
                else{

                }
            }
            //var i=9
            for(var i=9;i<productsAll.length;i++){
              if(productsAll[i].cafeid==(i+1)||i==((productsAll[i].cafeid-1)*3)){
                if(productsAll[i].prod_qty>=0){
                  if(productsAll[i].prod_price<4){
                output1+="<div class=\"product-card\" style=\"position:relative;\"><span class=\"status\" style=\"position:absolute; top:0px; left:0px;\" ></span>"
                          +"<div class=\"product-image\">"
                            +"<img src=\""+productsAll[i].cafepic+"\"  class=\"imgprod shadow\">"
                          +"</div>"
                          +"<div class=\"product-info\">"
                            +"<h3 style=\"color:#555b6e\">"+productsAll[i].prod_name+"</h3>"
                            +"<form class=\"frm\">"
                              +"<div class=\"value-button shadow\" id=\"decrease"+productsAll[i].cafeid+"\" onclick=\"decreaseValue("+productsAll[i].cafeid+")\"><strong>-</strong></div>"
                              +"<input type=\"number\" id=\"cafe"+productsAll[i].cafeid+"\" value=\"0\" disabled/>"
                              +"'<div class=\"value-button shadow\" id=\"increase"+productsAll[i].cafeid+"\" onclick=\"increaseValue("+productsAll[i].cafeid+")\"><strong>+</strong></div>"
                              +"<p style=\"color:#555b6e\"><strong>Quantity</strong></p>"
                            +"</form>"
                            +"<select id=\"priceOf"+productsAll[i].cafeid+"\">"
                              +"<option value=\""+productsAll[i].prod_price+"\">Small - ₱"+productsAll[i].prod_price+"</option>"
                              +"<option value=\""+productsAll[(i+1)].prod_price+"\">Medium - ₱"+productsAll[(i+1)].prod_price+"</option>"
                              +"<option value=\""+productsAll[(i+2)].prod_price+"\">Large - ₱"+productsAll[(i+2)].prod_price+"</option>"

                            +"</select>"
                            +"<br><br>"
                            +"<div class=\"card1\">"
                              +"<p style=\"color:#555b6e\"><button class=\"addthis\" data-name=\""+productsAll[i].prod_name+"\" data-cafepic=\""+productsAll[i].cafepic+"\" data-cafeid=\""+productsAll[i].cafeid+"\"><strong><img src=\"images/cart.png\" class=\"asd\"><strong>&nbsp;ADD TO CART</strong></strong></button></p>"
                            +"</div>"
                          +"</div>"
                        +"</div>"
                  }
                  else{
                    output1+="<div class=\"product-card\">"
                            +"<div class=\"product-image\">"
                                    +"<img src=\""+productsAll[i].cafepic+"\"  class=\"imgprod shadow\">"
                                  +"</div>"
                                  +"<div class=\"product-info\">"
                                    +"<h3 style=\"color:#555b6e\">"+productsAll[i].prod_name+"</h3>"
                                    +"<form class=\"frm\">"
                                      +"<div class=\"value-button shadow\" id=\"decrease"+productsAll[i].cafeid+"\" onclick=\"decreaseValue("+productsAll[i].cafeid+")\"><strong>-</strong></div>"
                                      +"<input type=\"number\" id=\"cafe"+productsAll[i].cafeid+"\" value=\"0\" disabled/>"
                                      +"'<div class=\"value-button shadow\" id=\"increase"+productsAll[i].cafeid+"\" onclick=\"increaseValue("+productsAll[i].cafeid+")\"><strong>+</strong></div>"
                                      +"<p style=\"color:#555b6e\"><strong>Quantity</strong></p>"
                                    +"</form>"
                                    +"<select id=\"priceOf"+productsAll[i].cafeid+"\">"
                                      +"<option value=\""+productsAll[i].prod_price+"\">Small - ₱"+productsAll[i].prod_price+"</option>"
                                      +"<option value=\""+productsAll[(i+1)].prod_price+"\">Medium - ₱"+productsAll[(i+1)].prod_price+"</option>"
                                      +"<option value=\""+productsAll[(i+2)].prod_price+"\">Large - ₱"+productsAll[(i+2)].prod_price+"</option>"

                                    +"</select>"
                                    +"<br><br>"
                                    +"<div class=\"card1\">"
                                      +"<p style=\"color:#555b6e\"><button class=\"addthis\" data-name=\""+productsAll[i].prod_name+"\" data-cafepic=\""+productsAll[i].cafepic+"\" data-cafeid=\""+productsAll[i].cafeid+"\"><strong><img src=\"images/cart.png\" class=\"asd\"><strong>&nbsp;ADD TO CART</strong></strong></button></p>"
                                    +"</div>"
                                  +"</div>"
                                +"</div>"
                      }
                      
                    }
                    else{
                      

                    }
                }
                else{

                }
                if(i==19 || i==31){
                  output1+="</section>"
                  +"<section class=\"products\">"
                }
            }

            $("#show-prod").html(output);
            $("#show-prod1").html(output1);
            console.log(productsAll.length);

          }
          displayMenu();
          loadCart();	
          displayCart();
          console.log(cart);
          
      
      </script>

    </body>

</html>
