<?php

class Security {

    public static function say ($text) {

        echo "sanitized: ";
        echo(htmlspecialchars(trim($text), ENT_QUOTES));

    }

    public static function is_valid_get_parameter ($key) {

        return filter_input(INPUT_GET, $key);

    }

    public static function guid () {

        return self::generate_guid();

    }

    private static function generate_guid () {
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }
        else {
            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);
            $uuid = chr(123)
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);
            return $uuid;
        }
    }

}