<?php
$host="localhost";
$username="root";
$password="password";
$db="es_dev";

function nextOrderRef()
{
$datetime=date("dmHi");
$randnum=mt_rand(10,99);
$orderref="OD" . $datetime . $randnum;
return $orderref;
}
?>