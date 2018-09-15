<?php
/**
 * Created by PhpStorm.
 * User: cash express
 * Date: 15/09/2018
 * Time: 16:48
 */

namespace App\helper;


class checker{
    public static function isValid($val = 'B'){

        return ($val == 'A') ? true : false ;

    }
}