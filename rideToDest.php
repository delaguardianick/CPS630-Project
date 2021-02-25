<html>
    <head>
        <title>Ride And Deliver - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="OpenLayers.js"></script> -->
        <script src="maps2.js"></script>
    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>

    <h5>Ride to a destination from this source (inside the city or out of it max 50km far)</h5>
    <br>
    <input type="text" name="origin" id="origin" placeholder="Origin">
    <button type="button" id="find-me" >Use My Current Location</button>
    <br>
    <input type="text" name="destination" id="destination" placeholder="Destination">
    <button type="button" id="show-map" >Search</button>
    <p id = "status"></p>
    <a id = "map-link" target="_blank"></a>
    <div id="map"> </div>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM&callback=initMap"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>