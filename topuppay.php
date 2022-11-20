<form>

<h2> BJ Coins Payment </h2>
<div class="form-group">  
<label for="fname">Your Coins:</label> &ensp; <span class="fas fa-coins"></span>
<?php if(isset($_SESSION['userlogin'])){echo $_SESSION['userlogin']['coins'];} else{echo 'Please Login to topup and order';}?>
</div>

<div class="row">
<div class="col">
<div class="form-group">  
    <label for="fname">Top-up?</label>
    <input type="number" class="form-control" placeholder="How much?" id="topupval">
</div>
</div>
<div class="col">
<div class="form-group">  
    <label for="fname">Payment Option</label>
    <select name="cars" id="cars" class="form-control">
        <option value="gchash">G-Cash</option>
        <option value="paymaya">Paymaya</option>
        <option value="bank">Over-the-Counter</option>
        <option value="others">Others</option>
        </select>
    </div>
</div>
</div>
<div class="form-group">  
    <label for="fname">Email <span class="text-muted">(Optional)</span></label>
    <input type="email" class="form-control" id="emailCC" placeholder="Email" >
</div>
<div class="row">
    <div class="col-2">
        <div class="form-group">  
        <input type="button" class="btn but-login topupbutton" id="topupnow" value="Top-up">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <div class="form-group">  
        <input type="submit" class="btn but-login addthiscoins" id="submitCC" value="Confirm">
        </div>
    </div>
<div class="col-2">
    <div class="form-group">  
    <input type="button" class="btn but-login" id="goBack" value="Go Back" onclick="javascript:location.href='menu.php'">
    </div>
</div>
</div>
</form>