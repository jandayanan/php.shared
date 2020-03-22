<?php

if( !function_exists( "acronym") ){
    function acronym($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}

if( !function_exists("get_email_domains") ){
    function get_email_domains(){
        return [
            "gmail.com",
            "yahoo.com",
            "yahoo.com.ph",
            "hotmail.com",
            "aol.com",
            "msn.com",
            "comcast.net",
            "live.com",
            "rediffmail.com",
            "ymail.com",
            "outlook.com",
            "cox.net",
            "sbcglobal.net",
            "verizon.net",
            "live.co.uk",
            "googlemail.com",
            "bigpond.com",
            "alice.it",
            "rocketmail.com",
        ];
    }
}

if( !function_exists( "get_ph_phone_prefixes") ){
    function get_ph_phone_prefixes(){
        return [
            "0817",
            "0905",
            "0906",
            "0915",
            "0916",
            "0917",
            "0926",
            "0927",
            "0935",
            "0936",
            "0937",
            "0945",
            "0953",
            "0954",
            "0955",
            "0956",
            "0963",
            "0964",
            "0965",
            "0966",
            "0967",
            "0975",
            "0976",
            "0977",
            "0994",
            "0995",
            "0996",
            "0997",
            "0813",
            "0900",
            "0907",
            "0908",
            "0909",
            "0910",
            "0911",
            "0912",
            "0913",
            "0914",
            "0918",
            "0919",
            "0920",
            "0921",
            "0928",
            "0929",
            "0930",
            "0938",
            "0939",
            "0940",
            "0946",
            "0947",
            "0948",
            "0949",
            "0950",
            "0951",
            "0957",
            "0958",
            "0959",
            "0960",
            "0961",
            "0968",
            "0969",
            "0970",
            "0971",
            "0980",
            "0981",
            "0982",
            "0985",
            "0989",
            "0992",
            "0998",
            "0999",
            "0922",
            "0923",
            "0924",
            "0925",
            "0931",
            "0932",
            "0933",
            "0934",
            "0941",
            "0942",
            "0943",
            "0944",
            "0951",
            "0952",
            "0962",
            "0971",
            "0972",
            "0977",
            "0978",
            "0979",
            "0980",
            "0973",
            "0974",
            "0920",
            "0901",
            "0902",
            "0903",
            "0904",
            "0983",
            "0984",
            "0986",
            "0987",
            "0988",
            "0990",
            "0991",
            "0993",
        ];
    }
}

if( !function_exists("is_data_plural") ){
    function is_data_plural( $data ){
        return isset( $data['single'] ) ? !$data['single'] : false;
    }
}

if( !function_exists("get_plural") ){
    function get_plural( $string, $data=[] ){
        if( !empty( $data ) && !is_data_plural( $data ) ){
            return $string;
        }

        return \Illuminate\Support\Str::plural( $string );
    }
}