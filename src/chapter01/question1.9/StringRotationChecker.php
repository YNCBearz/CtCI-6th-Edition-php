<?php

class StringRotationChecker
{
    public static function isRotation($string1, $string2): bool
    {
        $length1 = strlen($string1);
        $length2 = strlen($string2);
        if ($length1 != $length2) {
            return false;
        }

        return strpos($string1 . $string1, $string2);
    }
}