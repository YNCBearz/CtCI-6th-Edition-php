<?php

class MapUniquenessDetector
{
    public static function isUnique($string): bool
    {
        if (strlen($string) > 128) {
            return false;
        }

        $charSet = [];
        for ($i = 0; $i < strlen($string); $i++) {
            $value = substr($string, $i, 1);

            if (isset($charSet[$value])) {
                return false;
            }
            $charSet[$value] = true;
        }

        return true;
    }
}