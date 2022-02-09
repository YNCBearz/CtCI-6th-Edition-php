<?php

class SortingStringPermutationChecker
{
    public static function isPermutation($string1, $string2)
    {
        if (strlen($string1) != strlen($string2)) {
            return false;
        }

        $string1Parts = str_split($string1);
        $string2Parts = str_split($string2);

        sort($string1Parts);
        sort($string2Parts);

        return $string1Parts == $string2Parts;
    }
}