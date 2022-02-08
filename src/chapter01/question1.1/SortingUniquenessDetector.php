<?php

class SortingUniquenessDetector
{
    public static function isUnique($string): bool
    {
        $checker = 0;

        for ($i = 0; $i < strlen($string); $i++) {
            $value = substr($string, $i, 1);

            $asciiDiff = ord($value) - ord('a');

            /**
             * $a & $b: 取位元的交集。
             * $a << $b: 將位元向左移動b次(即乘以2的b次方)。
             */
            if (($checker & (1 << $asciiDiff)) > 0) {
                return false;
            }

            /**
             * $a |= $b: $a = $a | $b。
             */
            $checker |= (1 << $asciiDiff);
        }

        return true;
    }
}