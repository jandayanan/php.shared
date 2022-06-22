<?php
const DAYS = [
    'sunday' => 0,
    'monday' => 1,
    'tuesday' => 2,
    'wednesday' => 3,
    'thursday' => 4,
    'friday' => 5,
    'saturday' => 6,
];

if( !function_exists ( 'day_index') ){
    function day_index( $day ){
        return DAYS[ strtolower( $day ) ];
    }
}

if (!function_exists("validate_date")) {
    /**
     * Validate a given date.
     *
     * @return mixed
     */
    function validate_date($date)
    {
        $tempDate = explode('-', $date);
        try {
            // checkdate(month, day, year)
            return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
