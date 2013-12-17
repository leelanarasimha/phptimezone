<?php

/*
 * Timezone System in PHP
 * Sets the datetime and gets the datetime according to the timezone
 * @package		Timezones
 * @author     	( Leela Narasimha ) leela.narsimha@gmail.com
 */

class Timezones {
    
    /**
     * gets the datetime according to the timezone specified
     * @param String $timezone 
     * @param DATE $date
     * @param string $format
     * @return mixed date on success and FALSE on failure
     */
    public function get_usertimezone_date($timezone, $date, $format = 'Y-m-d') {

        if (!$timezone || $timezone == '')
            $timezone = date_default_timezone_get();
        $newTZ = new DateTimeZone($timezone);
        $strdate = strtotime($date);
        if (!$strdate) {
            return FALSE;
        }
        $date = date('Y-m-d H:i:s', strtotime($date));
        $date_obj = new DateTime($date);
        $date_obj->setTimezone($newTZ);
        return $date_obj->format($format);
    }
    
    /**
     * gets the UTC time zone according to the timezone specified
     * @param String $timezone 
     * @param DATE $date
     * @param string $format
     * @return mixed date on success and FALSE on failure
     */
    function get_utc_timezone_date($timezone, $date, $format = 'Y-m-d') {
        if (!$timezone || $timezone == '')
            $timezone = $this->utc_timezone;
        $strdate = strtotime($date);
        if (!$strdate) {
            return FALSE;
        }
        $date = date('Y-m-d H:i:s', strtotime($date));
        $serverTZ = new DateTimeZone(date_default_timezone_get());
        $newTZ = new DateTimeZone($timezone);
        $date_obj = new DateTime($date, $newTZ);
        $date_obj->setTimezone($serverTZ);
        return $date_obj->format($format);
    }

}
