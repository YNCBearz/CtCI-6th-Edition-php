<?php

class HashMapStringPermutationChecker
{
    public static function isPermutation($string1, $string2)
    {
        if (strlen($string1) != strlen($string2)) {
            return false;
        }

        $string1Parts = str_split($string1);

        $set = [];
        foreach ($string1Parts as $character) {
            (isset($set[$character]))
                ? $set[$character]--
                : $set[$character] = -1;
        }

        $string2Parts = str_split($string2);
        foreach ($string2Parts as $character) {
            (isset($set[$character]))
                ? $set[$character]++
                : $set[$character] = 1;
        }

        $result = true;
        foreach ($set as $key => $value) {
            if ($value < 0) {
                $result = false;
                break;
            }
        }

        return $result;
    }
}