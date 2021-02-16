<?php 
echo '
<nav class="navbar navbar-expand-lg navbar-light text-white d-flex">
    <a class="navbar-brand text-white" href="index.php"> <img src="https://images-na.ssl-images-amazon.com/images/I/61nuuPxUvaL.png" alt="" id="logo"> ClosedWeather</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Forecast
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item text-white" href="current.php">Current</a>
            <a class="dropdown-item text-white" href="minute.php">Minutely</a>
            <a class="dropdown-item text-white" href="hourly.php">Hourly</a>
            <a class="dropdown-item text-white" href="daily.php">Daily</a>
            <a class="dropdown-item text-white" href="historical.php">Historical</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
          <div class="  text-white dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item text-white" href="about.php">About Us</a>
            <a class="dropdown-item text-white" href="term.php">Terminology</a>
            <a class="dropdown-item text-white" href="contact-us.php">Contact Us</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="alerts.php">Alerts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="spotify.php">Playlists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="comparison.php">City Comparison</a>
        </li>
        
      </ul>
    
    <div class="form-inline">
      <input class="form-control" type="text" placeholder="Search for City"  id ="city"  name = "city">
      <button class="btn search-btn btn-primary my-2 my-sm-0" type="submit" onclick="searchCity()"><i class="fa fa-search" ></i></button>
    </div>
    </div>
    </nav>
';
?>