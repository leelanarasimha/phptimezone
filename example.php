<?php
include "timezones.php";

$time = new Timezones();

$date_time = $time->get_utc_timezone_date(date_default_timezone_get(), date('Y-m-d H:i:s'), $format = 'Y-m-d H:i:s');
echo $time->get_usertimezone_date('America/Vancouver', $date_time, $format = 'd,M y H:i:s');
