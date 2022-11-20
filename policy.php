<?php
	require_once('config.php');
	session_start();
	require("functions.php");
  
  if(!isset($_SESSION['userlogin'])){
		
	}
	else{
    if($_SESSION['userlogin']['userid']=="admin"){

    }
    else{
      $sql2 = "SELECT * FROM ".$_SESSION['userlogin']['userid']."";
      $stmt = $db->prepare($sql2);
      $stmt->execute();
      $cartAccount = $stmt->fetchAll();
      $_SESSION['cart'] = $cartAccount;
    }
		
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}
?>
<html>
    <head>
    <title>Policies</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

      <style>
        .log {
            background-color: rgba(85, 91, 110, 0.548);
          
        }
      </style>
    </head>
    <body  class="bg">
        <?php
          include 'navbar.php';
        ?>

<div class="container log mx-5 p-3 rounded imglog1">
  <h1>Cancellation and Refund Policies</h1>
  <p>The Valmerch is committed to ensuring that the personal information of individuals is handled responsibly and in accordance with Australian Commonwealth privacy laws. This Privacy Policy may be amended from time to time. If you have any concerns regarding privacy, please contact us here.</p>
  <p>Online Purchasing Customers' personal Credit Card information, gathered whilst in the process of conducting an online purchase, will be used only for Credit Card authorisation purposes. This information will be shared with our Payment Processing Authority, only in the context of purchasing Merchandise &/or Products.</p>
  <br>
  <p>The Valmerch does not store any credit card information. All credit card processing is securely conducted via Shopify Secure, using the financial industry's Secure Socket Layer (SSL) standards. We also offer Paypal for your convenience. Paypal utilizes the same SSL protocols with an encryption key length of 168-bits (the highest level commercially available). </p>
<br>
<p>Customers' other personal information, gathered by The Valmerch whilst in the process of conducting an online purchase, may also be used to inform the customer of additional products, special offers and services, which The Valmerch believes will be of interest to them. All marketing materials sent to the customer will include an option for the customer to request removal from mailing or contact lists for any future marketing. Valmerch members may also login to the members' area and un-tick the subscribe to the newsletter option.</p>
<br>
<p>Personal information will not be shared, sold, exchanged, leased or given to any third party not connected to the business of supplying products and services from The Valmerch.
</p>
<br>
<p>To reduce last-minute cancellations and the risk of "chargebacks" from customers, it is always a good idea to have your customers agree to your cancellation and refund policy. This should be attached to the customers' order for future reference. Occasion makes this easy for you and your customers.</p>
<br>
<p>In this article, we will help you define your cancellation and refund policy. Let's start by answering the following questions:</p>
<br>
<p>1.Do you want to give customers a refund?</p>
<br>
<p>2.When do they have to inform you by before the actual event date starts to cancel?</p>
<br>
<p>3.Do you want to keep their payment and give them store credit instead?</p>
<br>
<p>By answering the questions above, you can come up with some very simple and basic policies, like this one: To receive a refund, customers must notify at least 4 days before the start of the event. In all other instances, only a store credit is issued.</p>
<br>
<p>Below are six great examples of cancellation and refund policies:</p>
<br>
<p>1.Due to limited seating, we request that you cancel at least 48 hours before a scheduled class. This gives us the opportunity to fill the class. You may cancel by phone or online here. If you have to cancel your class, we offer you a credit to your account if you cancel before the 48 hours, but do not offer refunds. You may use these credits towards any future class. However, if you do not cancel prior to the 48 hours, you will lose the payment for the class. The owner has the only right to be flexible here.</p>
<br>
<p>2.Cancellations made 7 days or more in advance of the event date, will receive a 100% refund. Cancellations made within 3 - 6 days will incur a 20% fee. Cancellations made within 48 hours to the event will incur a 30% fee.</p>
<br>
<p>3.I understand that I am holding a spot so reservations for this event are nonrefundable. If I am unable to attend I understand that I can transfer to a friend.</p>
<br>
<p>4.If your cancellation is at least 24 hours in advance of the class, you will receive a full refund. If your cancellation is less than 24 hours in advance, you will receive a gift certificate to attend a future class. We will do our best to accommodate your needs.</p>
<br>
<p>5.You may cancel your class up to 24 hours before the class begins and request to receive a full refund. If cancellation is made day of you will receive a credit to reschedule at a later date. Credit must be used within 90 days.
You may request t</p>
<br>
<p>6.You may request to cancel your ticket for a full refund, up to 72 hours before the date and time of the event. Cancellations between 25-72 hours before the event may transferred to a different date/time of the same class. Cancellation requests made within 24 hours of the class date/time may not receive a refund nor a transfer. When you register for a class, you agree to these terms.</p>
<br>
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
                                  'type': 'error',
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
                  else{}
              })
          });


          loadCart();	
          displayCart();
          console.log(cart);
      
      </script>

    </body>

</html>

