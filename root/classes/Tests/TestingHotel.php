<?php
require "../Hotel.php";

$hotel = new Hotel(null,null,null,null);
$hotel->setHotelName("Ritz Carlton");
$hotel->setNumRooms(10);
$hotel->setPrice(2000);

$hotel->displayTestHotels();


