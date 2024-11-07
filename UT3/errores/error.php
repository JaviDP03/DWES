<?php
$dividiendo = 1;
$divisor = $_GET['divisor'] ?? 0;

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
echo $dividiendo / $divisor;
error_reporting(E_ALL & ~E_NOTICE);
