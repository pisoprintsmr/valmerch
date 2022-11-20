<?php
	require('config.php');
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
    <body class="bg">
       <?php
        include 'navbarpay.php';
       ?>

			  
			  <div class="container-fluid mb-4">
            <div class="row">
              <div class="col-6 imglog1 shadow ml-5 rounded-left log py-2">
              <form>
              <input type="radio" name="paymentselect" onClick="hideB()">Credit Card&ensp;&ensp;
              <input type="radio" name="paymentselect" onClick="hideA()" checked>BJ Coins
              </form>
                <div id='ccardPay'><?php include 'creditcard.php';?></div>
                <div id='topupPay' style="visibility:hidden;"><?php include 'topuppay.php';?></div>
              </div>
              <div class="col-5 mr-5 fade_body_pay rounded-right shadow py-2">
                <h2>Cart</h2><br>
                <div id="show-cart" class="cart-last overflow-auto style-2">
                </div>
                <div id="show-cart1">

                </div>
              </div>
						</div>
        </div>
        <?php
  include 'footer.php';
?>
				<script>
        

          function hideA(){
            document.getElementById("ccardPay").style.visibility="hidden";
            document.getElementById("topupPay").style.visibility="visible";
            document.getElementById("ccardPay").style.height="0px";
            document.getElementById("topupPay").style.height=null;
          }

          function hideB(){
            document.getElementById("ccardPay").style.visibility="visible";
            document.getElementById("topupPay").style.visibility="hidden";
            document.getElementById("topupPay").style.height="0px";
            document.getElementById("ccardPay").style.height=null;
          }

          hideA();
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

      function thouNum(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      var totalAll =0;
      function displayCart() {
          var cartArray = listCart();
          var output = "";
          var output1 = "";
          
          
          for (var i in cartArray) {
              output += "<div class=\"mx-3\">"
                        +"<div class=\"row mb-0\">"
                          +"<div class=\"col-sm-4\">"
                            +"<p style=\"text-overflow: ellipsis;\"><img src='"+cartArray[i].cafepic+"' height=\"30\" width=\"30\"> "+cartArray[i].name+"</p>"
                          +"</div>"
                          +"<div class=\"col\">"
                            +"<p style=\"font-size: 80%;\">x "+cartArray[i].count+"<br>P "+cartArray[i].price+"</p>"
                          +"</div>"
                          +"<div class=\"col\">"
                            +"<p style=\"font-size: 80%;\">Subtotal:<br>P "+(cartArray[i].price*cartArray[i].count)+"</p>"
                          +"</div>"
                          +"<div class=\"col\" id=\"del-cart\">"
                            +"<button type=\"button\" class=\"close clearThis\" data-name='"+cartArray[i].name+"' data-price='"+cartArray[i].price+"' aria-label=\"Close\">"
                              +"<span aria-hidden=\"true\">&times;</span>"
                            +"</button>"
                          +"</div>"
                        +"</div>"
                      +"</div>"
              totalAll=totalAll+(cartArray[i].price*cartArray[i].count);
          }

          output1+= "<br><div class=\"row\">"
                    +"<div class=\"col-sm-3\">"
                      +"<h3>Total: </h3>"
                    +"</div>"
                    +"<div class=\"col\"><h2>₱ "
                    +thouNum(totalAll)
                    +"</h2></div>"
                    +"</div>"

          $("#show-cart1").html(output1);
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

      var cart = <?php echo json_encode($_SESSION['cart'],JSON_NUMERIC_CHECK);?>;
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
          cart = <?php echo json_encode($_SESSION['cart'],JSON_NUMERIC_CHECK);?>;
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
                                  'type': 'error',
                              })
                          }
                      });  
              })
          });

      $(function(){
              $('.addthis').click(function(e){
                var valid = this.form.checkValidity();
                if(valid){
                var cartArray = listCart();
                var orders = cartArray.map(function(elem){return elem.name;}).join(", ");
                var price = thouNum(totalAll);
                  e.preventDefault();
                    $.ajax({
                      type: 'POST',
                      url: 'processpayment.php',
                      data:{orders:orders, price:price},
                      success:function(data){
                          // loadCart();
                          // displayCart();
                          if(data!="Please fill up your cart"){
                            setTimeout(function(){location.href="checkout.php"} , 3000);   
                            Swal.fire({
                              'title': 'Nice!',
                              'text': data,
                              'type': 'success',
                              showConfirmButton: false
                            })
                          }
                          else{
                            Swal.fire({
                              'title': 'HMMP!',
                              'text': data,
                              'type': 'error',
                          })
                          }
                      },
                      erros:function(data){
                          Swal.fire({
                              'title': 'Error',
                              'text': 'There were errors while saving the data',
                              'type': 'error'
                          })
                      }
                  });
              }})
          });
          $(function(){
              $('.addthiscoins').click(function(e){
                var valid = this.form.checkValidity();
                if(valid){
                var cartArray = listCart();
                var orders = cartArray.map(function(elem){return elem.name;}).join(", ");
                var price = totalAll
                var coins = <?php echo json_encode($_SESSION['userlogin']['coins'],JSON_NUMERIC_CHECK);?>;
                console.log(price);
                  e.preventDefault();
                    $.ajax({
                      type: 'POST',
                      url: 'processpaymentcoins.php',
                      data:{orders:orders, price:price, coins:coins},
                      success:function(data){
                          // loadCart();
                          // displayCart();
                          if(data=="Please fill up your cart"){  
                            setTimeout(function(){location.href="payment.php"} , 1000);
                            Swal.fire({
                              'title': 'HMMP!',
                              'text': data,
                              'type': 'error',
                            })
                          }
                          else if(data=="Please Top-up"){   
                            setTimeout(function(){location.href="payment.php"} , 1000);
                            Swal.fire({
                              'title': 'HMMP!',
                              'text': data,
                              'type': 'error',
                            })
                          }
                          else{
                            setTimeout(function(){location.href="checkout.php"} , 3000);
                            Swal.fire({
                              'title': 'Nice!',
                              'text': data,
                              'type': 'success',
                              showConfirmButton: false
                          })
                          }
                      },
                      erros:function(data){
                          Swal.fire({
                              'title': 'Error',
                              'text': 'There were errors while saving the data',
                              'type': 'error'
                          })
                      }
                  });
              }})
          });

          $(function(){
              $('.topupbutton').click(function(e){
                var valid = this.form.checkValidity();
                if(valid){
                var topupval = document.getElementById("topupval").value;
                var coins = <?php echo json_encode($_SESSION['userlogin']['coins'],JSON_NUMERIC_CHECK);?>;
                console.log(topupval);
                  e.preventDefault();
                    $.ajax({
                      type: 'POST',
                      url: 'processtopup.php',
                      data:{topupval:topupval, coins:coins},
                      success:function(data){
                          if(data!="BJ Coins added to your account"){  
                            setTimeout(function(){location.href="payment.php"} , 1000);
                            Swal.fire({
                              'title': 'HMMP!',
                              'text': data,
                              'type': 'error',
                            })
                          }
                          else{
                            setTimeout(function(){location.href="payment.php"} , 500);
                            Swal.fire({
                              'title': 'Nice!',
                              'text': data,
                              'type': 'success',
                              showConfirmButton: false
                          })
                          }
                      },
                      erros:function(data){
                          Swal.fire({
                              'title': 'Error',
                              'text': 'There were errors while saving the data',
                              'type': 'error'
                          })
                      }
                  });
              }})
          });


          loadCart();	
          displayCart();
          console.log(totalAll);
          console.log(<?php echo json_encode($_SESSION['userlogin']['coins'],JSON_NUMERIC_CHECK);?>)
      
      </script>

    </body>

</html>
