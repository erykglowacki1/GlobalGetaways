<?php
require "../Product.php";

$productUnitTest = new Product(0,0,0,0,0);
$productUnitTest->setProductId(100);
$productUnitTest->setFlightId(12);
$productUnitTest->setActivityId(13);
$productUnitTest->setHotelId(14);
$productUnitTest->setDestinationId(15);

$productUnitTest->displayProduct();