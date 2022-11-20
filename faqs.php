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
?>
<html>
    <head>
    <title>FAQs</title>
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
        .FAQss  {
          color: rgb(103, 53,32);
          border-style: solid tan;
          margin: 60px auto;
          padding: 20px; 
          width: 820px;
          height: 800px; 
        }
      </style>
    </head>
    <body  class="bg">
        <?php
          include 'navbar.php'
        ?>
			  <div class="FAQss fade_body imgLog1">
		<ul id="basics" class="faq_group">
		 <h1>Frequently Asked Questions</h1>
			<h3>TOPIC</h3>
			<li class="faq_item">
				<a class="faq_trigger"><span><strong>Can we pay through COD?</strong></span></a>
          <div class="text-component">
		  <p>No. We only accept Credit Cards, Gcash, Paymaya. Don't worry, we always encrypt all information so it'll be safe with us</p>
          </div>
			</li>

			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>How do I sign up?</strong></span></a>
          <div class="text-component">
			 <p>Click on the Login button on the upper right corner of the page to sign up an account.</p> 
			 </div>
			</li>

			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>Can I remove an order?</strong></span></a>
          <div class="text-component">
            <p>You can remove your order by clicking the "x" when you open your cart or when you're in the checkout.</p> 
			 </div>
		</ul>
		<ul id="delivery" class="faq_group">
			<h3>Delivery</h3>
			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>What should I do if my order hasn't been delivered yet?</strong></span></a>
          <div class="text-component">
            <p>Make a query under Help>Queries. Please provide your email address so we can reply back to you.</p> 
			 </div>
			</li>
			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>When will my order arrive?</strong></span></a>
          <div class="text-component">
            <p>The order will arrive at the exact time given.</p> 
			 </div>
				
			</li>
		</ul>
		<ul id="account" class="faq_group">
		<h3>Account</h3>
			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>How do I change my password?</strong></span></a>
          <div class="text-component">
            <p>Go to the account settings and click the password change.</p> 
			 </div>
				
			</li>
			<li class="faq_item">
				<a class="faq_trigger" ><span><strong>How do I delete my account?</strong></span></a>
          <div class="text-component">
            <p>You can delete your account by going to account settings and click the "Delete Account".</p> 
			 </div>
				
			</li>
			<li class="faq_item">
				<a class="faq_trigger"><span><strong>I forgot my password. How do I reset it?</strong></span></a>
          <div class="text-component">
          <p>You can reset your password by clicking the "Forgot Password".</p> 
			 </div>
				
			</li>
		</ul></div>
	
  </div>
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
                              'title': 'Success!',
                              'text': data,
                              'type': 'success',
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
          loadCart();	
          displayCart();
          console.log(cart);
      
      </script>

    </body>

</html>
