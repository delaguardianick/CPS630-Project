<html>
    <head>
        <title>Ride And Deliver - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/rideToDest.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/rideToDest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>

    <br>
    <div id="form">
        <div id="pickup-location">
            <input type="text" name="origin" id="origin" placeholder="Origin">
            <input type="image" src="source/find-location.png" id="find-me" ></input>
            <br>
            <input type="text" name="destination" id="destination" placeholder="Destination">
            <br>
            <br>
        </div>
        <div id="pickup-time">Select pickup date and time:
            <br>
            <input type="date" name="date" id="date">
            <br>
            <input type="time" id="time" name="time">
        </div>
       
        <button type="button" id="show-map" >Search</button>
        <p id = "status"></p>
        <p id="radius"></p>
    </div>
    <div id="map"></div>
    <br>
    <br>
    <!-- TABLE -->
    <hr class="dashed">

    <div id="beside-table">
        <form id="tier-select">
            <p>Please select a tier:</p>
            <select name="users" onchange="showTable(this.value), SetPrice()" id="tier">
            <option value="">Select a person:</option>
            <option value="econ">Economy $</option>
            <option value="xl">XL $$</option>
            <option value="premium">Premium $$$</option>
            </select>
        </form>

        <div id="price"></div>
        <br>
        <br>
        <button>Continue to Payment</button>

    </div>
    <div id="show-car-table"></div>


    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM&libraries=places&map_ids-6789a6679abe1ef1&callback=initMap"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>