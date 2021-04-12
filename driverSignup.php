<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<html>
    <head>
        <title>Driver Signup</title>
        <link rel="stylesheet" href="css/driverSignup.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/driverSignup.js"></script>
        
    </head>
    <body>
    <h2 id="dTitle">Apply to become a driver:</h2>
    <div class="row">
        <div id="left-side" class="col">
            <div class="row">
                <img src="source/cp-make-money-214596dd03.png" alt="" id="imgMoney" class="col-4">
                <div id="smallText" class="col-8">
                    <h6>Earn anytime, anywhere</h6>
                    <p>Drive when and where you want. And choose how and when you want to get paid.</p>
                </div>
            </div>

            <div class="row">
                <img src="source/cp-easy-78e34e6408.png" alt="" id="imgEasy" class="col-4">
                <div id="smallText" class="col-8">
                    <h6>Set your own schedule</h6>
                    <p>Only drive when it works for you. There’s no office or boss. That means you’ll always start and stop on your time—because with the Uber app, you’re in charge.</p>
                </div>
            </div>

            <div class="row">
                <img src="source/cp-set-schedule-8844d68611.png" alt="" id="imgTime" class="col-4">
                <div id="smallText" class="col-8">
                    <h6>Signing up is easy</h6>
                    <p>Sign up to gain access to the app. After your account activation is complete, you can start earning.</p>
                </div>
            </div>
        </div>

        <div id="driver-form" class="col">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
            <div class="form-group">
                <label for="dEmail">Email address</label>
                <input type="email" class="form-control" id="dEmail" aria-describedby="emailHelp" placeholder="PS2@bahoo.ca">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="dPassword">Password</label>
                <input type="password" class="form-control" id="dPassword" placeholder="********">
            </div>
            <div class="form-group">
                <label for="dPhone">Phone Number</label>
                <input type="tel" class="form-control" id="dPhone" placeholder="(123)-456-789">
            </div>
            <div class="form-group">
                <label for="dCity">City</label>
                <input type="text" class="form-control" id="dCity" placeholder="Toronto">
            </div>
            <div class="form-group">
                <label for="dCar">Car Model</label>
                <input type="text" class="form-control" id="dCity" placeholder="Honda Civic 2021">
            </div>
            <label class="mr-sm-2" for="dTier">Select your vehicle tier</label>
                <select class="custom-select mr-sm-2" id="dTier">
                    <option selected>Choose...</option>
                    <option value="1">Economy - 4 seater</option>
                    <option value="2">Extra Large - 6+ seater</option>
                    <option value="3">Premium - Luxury Vehicle</option>
                </select>
            <br><br>
            <div class="form-group">
                <label for="dExperience">Please describe your previous personal and professional experience as a driver.</label>
                <textarea class="form-control" id="dExperience" rows="3" placeholder="I can't drive"></textarea>
            </div>
            <div class="form-group">
                <label for="dCovid">Explain how you would make sure to follow the PS2-COVID-19 driver guidelines.</label>
                <textarea class="form-control" id="dCovid" rows="3" placeholder="mask"></textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dPrivacy">
                <label class="form-check-label" for="dPrivacy">I accept the <a href="http://www.godhatesshrimp.com/">Privacy Policy</a> </label>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div
<!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    </body>
</html>