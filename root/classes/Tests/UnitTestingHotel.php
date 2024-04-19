<?php
require "../Hotel.php";
/////////UNIT TEST FOR HOTEL CLASS/////////////
$hotel = new Hotel("",0,0,0);
$hotel->setHotelName("Ritz Carlton");
$hotel->setNumRooms(10);
$hotel->setPrice(2000);
$hotel->displayTestHotels();

$hotel1 = new Hotel("",0,0,0);
$hotel1->setHotelName("Test");
$hotel1->setNumRooms(10);
$hotel1->setPrice(2000);
$hotel1->displayTestHotels();


