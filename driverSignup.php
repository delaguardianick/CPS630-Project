<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<html>
    <head>
        <title>Ride To Destination - Service A</title>
        <link rel="stylesheet" href="css/driverSignup.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/driverSignup.js"></script>
        
    </head>
    <body>

    <h2>Please fill out the form:</h2>
    <br>
    <form id="driver-form">
        <div class="">
            <div class="form-group">
                <label for="driverEmail">Email address</label>
                <input type="email" class="form-control" id="driverEmail" aria-describedby="emailHelp" placeholder="PS2@bahoo.ca">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="driverPassword">Password</label>
                <input type="password" class="form-control" id="driverPassword" placeholder="********">
            </div>
            <div class="form-group">
                <label for="driverPhone">Phone Number</label>
                <input type="number" class="form-control" id="driverPhone" placeholder="(123)-456-789">
            </div>
            <div class="form-group">
                <label for="driverCity">City</label>
                <input type="text" class="form-control" id="driverCity" placeholder="Toronto">
            </div>
            <div class="form-group">
                <label for="driverCar">Car Model</label>
                <input type="text" class="form-control" id="driverCity" placeholder="Honda Civic 2021">
            </div>
            <label class="mr-sm-2" for="inlineFormCustomSelect">Select your vehicle tier</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option value="1">Economy - 4 seater</option>
                    <option value="2">Extra Large - 6+ seater</option>
                    <option value="3">Premium - Luxury Vehicle</option>
                </select>
            <br><br>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Please describe your previous personal and professional experience as a driver.</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="I can't drive"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Explain how you would make sure to follow the PS2-COVID-19 driver guidelines.</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="mask"></textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I accept the <a href="http://www.godhatesshrimp.com/">Privacy Policy</a> </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    </body>
</html>