<?php

class URLifier
{
    public static function urlify(&$str)
    {
        $str = trim($str);

        $str = str_replace(' ', '%20', $str);
    }
}