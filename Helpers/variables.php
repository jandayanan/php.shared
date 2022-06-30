<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;

if( !function_exists ( 'carbon_now') ){
    /**
     * @param string $tz
     * @return Carbon
     */
    function carbon_now( $tz="Asia/Manila" ){
        return Carbon::now( env("APP_TIMEZONE", $tz ) );
    }
}

if( !function_exists ( 'carbon_parse') ){
    /**
     * @param $data
     * @param string $tz
     * @return Carbon
     */
    function carbon_parse( $data, $tz="Asia/Manila" ){
        return Carbon::parse( $data, env("APP_TIMEZONE", $tz ) );
    }
}


if( !function_exists ( 'carbon_days_of_month') ){
    function carbon_days_of_month( $month, $year=0, $max_days=0 ){
        $year = $year === 0 ? date("Y") : $year;
        $month = validate_month ( $month );
        $from_date = $year . "-" . $month . "-01";
        $to_date =  $year . "-" . $month . "-" . date('t', strtotime($from_date) );
        $max_days = $max_days > 0 ? $max_days : date('t', strtotime($from_date) );

        $period = CarbonPeriod::create($from_date, $to_date);
        $days = [];
        $day_count = 0;

        // Iterate over the period
        foreach ($period as $date) {
            if( $day_count < $max_days && $max_days != 0 ) {
                $days[] = $date->format ( 'Y-m-d' );
                $day_count++;
            }
        }

        return $days;
    }
}

if( !function_exists( 'object_has_trait') ){
    function object_has_trait( $trait, $object ){
        return in_array( $trait, class_uses_recursive( $object ));
    }
}

if( !function_exists("resolve_data") ){
    function resolve_data( $data=null, $target="", $default="" ){

        if( isset( $data[ $target ] ) &&
            !is_null( $data[ $target ] )
        ){
            return $data[ $target ];
        }

        return $default;
    }
}

if( !function_exists( 'stringify_boolean') ){
    function stringify_boolean( $value ){
        return $value === true ? "true" : "false";
    }
}

if( !function_exists ( "swap_values") ){
    function swap_values( &$from, &$to ){
        $temp = $from;
        $from = $to;
        $to = $temp;
    }
}

if( !function_exists("timezones") ){
    function timezones(){
        $timezones = array(
            'Pacific/Midway'       => "(GMT-11:00) Midway Island",
            'US/Samoa'             => "(GMT-11:00) Samoa",
            'US/Hawaii'            => "(GMT-10:00) Hawaii",
            'US/Alaska'            => "(GMT-09:00) Alaska",
            'US/Pacific'           => "(GMT-08:00) Pacific Time (US & Canada)",
            'America/Tijuana'      => "(GMT-08:00) Tijuana",
            'US/Arizona'           => "(GMT-07:00) Arizona",
            'US/Mountain'          => "(GMT-07:00) Mountain Time (US & Canada)",
            'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
            'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
            'America/Mexico_City'  => "(GMT-06:00) Mexico City",
            'America/Monterrey'    => "(GMT-06:00) Monterrey",
            'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
            'US/Central'           => "(GMT-06:00) Central Time (US & Canada)",
            'US/Eastern'           => "(GMT-05:00) Eastern Time (US & Canada)",
            'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
            'America/Bogota'       => "(GMT-05:00) Bogota",
            'America/Lima'         => "(GMT-05:00) Lima",
            'America/Caracas'      => "(GMT-04:30) Caracas",
            'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
            'America/La_Paz'       => "(GMT-04:00) La Paz",
            'America/Santiago'     => "(GMT-04:00) Santiago",
            'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
            'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
            'Greenland'            => "(GMT-03:00) Greenland",
            'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
            'Atlantic/Azores'      => "(GMT-01:00) Azores",
            'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
            'Africa/Casablanca'    => "(GMT) Casablanca",
            'Europe/Dublin'        => "(GMT) Dublin",
            'Europe/Lisbon'        => "(GMT) Lisbon",
            'Europe/London'        => "(GMT) London",
            'Africa/Monrovia'      => "(GMT) Monrovia",
            'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
            'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
            'Europe/Berlin'        => "(GMT+01:00) Berlin",
            'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
            'Europe/Brussels'      => "(GMT+01:00) Brussels",
            'Europe/Budapest'      => "(GMT+01:00) Budapest",
            'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
            'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
            'Europe/Madrid'        => "(GMT+01:00) Madrid",
            'Europe/Paris'         => "(GMT+01:00) Paris",
            'Europe/Prague'        => "(GMT+01:00) Prague",
            'Europe/Rome'          => "(GMT+01:00) Rome",
            'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
            'Europe/Skopje'        => "(GMT+01:00) Skopje",
            'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
            'Europe/Vienna'        => "(GMT+01:00) Vienna",
            'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
            'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
            'Europe/Athens'        => "(GMT+02:00) Athens",
            'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
            'Africa/Cairo'         => "(GMT+02:00) Cairo",
            'Africa/Harare'        => "(GMT+02:00) Harare",
            'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
            'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
            'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
            'Europe/Kiev'          => "(GMT+02:00) Kyiv",
            'Europe/Minsk'         => "(GMT+02:00) Minsk",
            'Europe/Riga'          => "(GMT+02:00) Riga",
            'Europe/Sofia'         => "(GMT+02:00) Sofia",
            'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
            'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
            'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
            'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
            'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
            'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
            'Europe/Moscow'        => "(GMT+03:00) Moscow",
            'Asia/Tehran'          => "(GMT+03:30) Tehran",
            'Asia/Baku'            => "(GMT+04:00) Baku",
            'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
            'Asia/Muscat'          => "(GMT+04:00) Muscat",
            'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
            'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
            'Asia/Kabul'           => "(GMT+04:30) Kabul",
            'Asia/Karachi'         => "(GMT+05:00) Karachi",
            'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
            'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
            'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
            'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
            'Asia/Almaty'          => "(GMT+06:00) Almaty",
            'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
            'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
            'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
            'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
            'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
            'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
            'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
            'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
            'Australia/Perth'      => "(GMT+08:00) Perth",
            'Asia/Singapore'       => "(GMT+08:00) Singapore",
            'Asia/Taipei'          => "(GMT+08:00) Taipei",
            'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
            'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
            'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
            'Asia/Seoul'           => "(GMT+09:00) Seoul",
            'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
            'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
            'Australia/Darwin'     => "(GMT+09:30) Darwin",
            'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
            'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
            'Australia/Canberra'   => "(GMT+10:00) Canberra",
            'Pacific/Guam'         => "(GMT+10:00) Guam",
            'Australia/Hobart'     => "(GMT+10:00) Hobart",
            'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
            'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
            'Australia/Sydney'     => "(GMT+10:00) Sydney",
            'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
            'Asia/Magadan'         => "(GMT+12:00) Magadan",
            'Pacific/Auckland'     => "(GMT+12:00) Auckland",
            'Pacific/Fiji'         => "(GMT+12:00) Fiji",
        );

        return $timezones;
    }
}

if( !function_exists("month_text") ){
    function month_text( $month=0 ){
        if( $month > 12 || $month < 1 || !is_numeric( $month )){
            return "Invalid month";
        }

        return carbon_now ()->setMonth ( $month )->monthName;
    }
}

if( !function_exists("validate_month") ){
    function validate_month( $month=0 ){
        $month = $month === 0 ? carbon_now()->format ("m") : $month;

        if( $month > 12 || $month < 1 || !is_numeric( $month )){
            $month = date("m");
        }

        return $month;
    }
}

if( !function_exists("validate_pk") ){
    function validate_pk( $data=null, $target="id", $default="" ){

        if( isset( $data[ $target ] ) &&
            !is_null( $data[ $target ] )
        ){
            return $data[ $target ];
        }

        return $default;
    }
}

if( !function_exists('reverse_of') ){
    function reverse_of( $target ){
        $types = [
            'debit' => 'credit',
        ];

        if( array_key_exists( $target, $types ) ){
            return $types[ $target ];
        }

        if( in_array( $target, $types ) ){
            return array_search( $target, $types );
        }

        return $target;
    }
}
