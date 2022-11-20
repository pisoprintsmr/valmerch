<form>
                  <h2> Credit Card Payment </h2>
                  <div class="form-group">  
                    <label for="fname">Name on Card</label>
                    <input type="text" class="form-control" id="FullName" placeholder="Full Name" pattern="[a-zA-Z\s]+" required>
                  </div>
                  <div class="form-group">  
                    <label for="fname">Credit Card Number</label>
                    <input type="number" class="form-control" id="ccnum" placeholder="Credit Card Number" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">  
                        <label for="fname">Security Code</label>
                        <input type="number" class="form-control" id="ccscode" placeholder="CCV" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">  
                        <label for="fname">Expiration Date</label>
                        <input type="number" class="form-control" id="expdate" placeholder="mm/yy" required>
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
                        <input type="submit" class="btn but-login addthis" id="submitCC" value="Confirm">
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">  
                        <input type="button" class="btn but-login" id="goBack" value="Go Back" onclick="javascript:location.href='menu.php'">
                      </div>
                    </div>
                  </div>
                </form> 
                <br><br>
                