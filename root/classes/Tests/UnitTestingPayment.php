<?php
require "../Payment.php";


$payment = new Payment(0,"",0,0);
$payment->setCardNum("12414141515");
$payment->setOwnerName("Eryk Glowacki");
$payment->setUserId(14);
$payment->setProductId(21);

$payment->displayPaymentInfo();