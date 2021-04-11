<html>
    <head>
        <title>Payment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/payment.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/doublePayment.js"></script>
    </head>
    <body>

        <!-- PAYMENT
     -->
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 id="payment-header" class="display-4">Proceed to Checkout</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-sm" id="payment">
                    <div class="card">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link disabled"> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link disabled"> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm" id="confirm-pay"> Confirm Payment </button>
                                    </form>
                                </div>
                            </div> <!-- End -->
                        </div>
                    </div>    
                </div>
                </div>
                <div class="col-sm" id="summary1">
                    <div class="card" id="summary-card1">
                        <div class="card-body">
                            <input type="radio" name="chooseRide" value="summary1" id="chooseRide1">
                            <!-- <h5 class="card-title">Purchase Summary</h5>
                            <p class="card-text" >By placing your order, you agree to our privacy notice and conditions of use.</p> -->
                        </div>
                        <ul class="list-group list-group-flush">
                             <?php
                                        //is the user logged in? if they are then change nav bar
                                if(isset($_SESSION["userid"])){
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'>" . $_SESSION["userid"] ."</div></li>";
                                }
                                else{
                                    //if not logged in
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'> None, Please Login! </div></li>";
                                }
                            ?>
                            <!-- <li class="list-group-item" >User ID: <div class="value" id="userId"></div></li> -->
                            <li class="list-group-item">Pickup Location: <div class="value" id="pickup1"></div></li>
                            <li class="list-group-item">Destination: <div class="value" id="destination1"></div></li>
                            <li class="list-group-item">Pickup date: <div class="value" id="date1"></div></li>
                            <div id="summary-car-info">
                                <li class="list-group-item">Distance: <div class="value" id="distance1">></div></li>
                                <li class="list-group-item">Trip Time: <div class="value" id="tripTime1">></div></li>
                            </div>
                            <div id="summary-car-info">
                                <li class="list-group-item">Car ID:<div class="value" id="carId1"></div></li>
                                <li class="list-group-item">Car Model: <div class="value" id="carModel1"></div></li>
                            </div>
                            <div id="summary-car-info">
                                <li class="list-group-item">Driver: <div class="value" id="driver1"></div></li>
                                <li class="list-group-item">Price: <div class="value" id="price1"></div></li>
                            </div>
                        </ul>
                        <!-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div> -->
                    </div>  
                </div>
                <div class="col-sm" id="summary2">
                    <div class="card" id="summary-card2">
                        <div class="card-body">
                            <input type="radio" name="chooseRide" id="chooseRide2" value="summary2">

                            <!-- <h5 class="card-title">Purchase Summary</h5>
                            <p class="card-text" >By placing your order, you agree to our privacy notice and conditions of use.</p> -->
                        </div>
                        <ul class="list-group list-group-flush">
                             <?php
                                        //is the user logged in? if they are then change nav bar
                                if(isset($_SESSION["userid"])){
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'>" . $_SESSION["userid"] ."</div></li>";
                                }
                                else{
                                    //if not logged in
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'> None, Please Login! </div></li>";
                                }
                            ?>
                            <!-- <li class="list-group-item" >User ID: <div class="value" id="userId"></div></li> -->
                            <li class="list-group-item">Pickup Location: <div class="value" id="pickup2"></div></li>
                            <li class="list-group-item">Destination: <div class="value" id="destination2"></div></li>
                            <li class="list-group-item">Pickup date: <div class="value" id="date2"></div></li>
                            <div id="summary-car-info">
                                <li class="list-group-item">Distance: <div class="value" id="distance2">></div></li>
                                <li class="list-group-item">Trip Time: <div class="value" id="tripTime2">></div></li>
                            </div>
                            <div id="summary-car-info">
                                <li class="list-group-item">Car ID:<div class="value" id="carId2"></div></li>
                                <li class="list-group-item">Car Model: <div class="value" id="carModel2"></div></li>
                            </div>
                            <div id="summary-car-info">
                                <li class="list-group-item">Driver: <div class="value" id="driver2"></div></li>
                                <li class="list-group-item">Price: <div class="value" id="price2"></div></li>
                            </div>
                        </ul>
                        <!-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div> -->
                    </div>  
                </div>
                <div class="row" id="rating-all">
                <h5>Please take a moment to review the service received</h5>
                <fieldset class="rating"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> <input type="radio" class="reset-option" name="rating" value="reset" /> </fieldset>
                <p id="thanks"></p>
            </div>
                <!-- <div id="payment-status"></div> -->
            </div> 
        </div>

  
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>