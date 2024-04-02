<?php

require_once 'connection/session.php';
$session = new session();
$session->forgetSession();
exit;
