<?php
require "../Destination.php";


$destinationUnitTest= new Destination("",0,"");
$destinationUnitTest->setId(25);
$destinationUnitTest->setCity("Test City");
$destinationUnitTest->setPrice(21);
$destinationUnitTest->setDescription("City Unit Test");


$destinationUnitTest->displayDestination();


$destinationUnitTest2= new Destination("",0,"");
$destinationUnitTest2->setId(26);
$destinationUnitTest2->setCity("Test City 2");
$destinationUnitTest2->setPrice(12);
$destinationUnitTest2->setDescription("City Unit Test 2");


$destinationUnitTest2->displayDestination();