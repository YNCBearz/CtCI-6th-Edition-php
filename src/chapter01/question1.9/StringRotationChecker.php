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

        $stringRotations = [];
        for ($offset = 1; $offset < $length1; $offset++) {
            $partA = substr($string1, $offset);
            $partB = substr($string1, 0, $offset);

            $stringRotations[] = $partA . $partB;
        }

        return in_array($string2, $stringRotations);
    }

}