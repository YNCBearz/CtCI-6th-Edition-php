<?php

class PalindromePermutationChecker
{
    public static function isPalindromePermutation($string)
    {
        $stringPart = str_split($string);

        $minASCII = ord('a');
        $maxASCII = ord('z');

        $set = [];
        foreach ($stringPart as $character) {
            $character = strtolower($character);

            if ($minASCII <= ord($character) && ord($character) <= $maxASCII) {
                (isset($set[$character]))
                    ? $set[$character]++
                    : $set[$character] = 1;
            }
        }

        $result = true;
        $isOneOdd = false;

        foreach ($set as $character => $times) {
            if ($times % 2 != 0 && $isOneOdd) {
                $result = false;
                break;
            }

            if ($times % 2 == 1) {
                $isOneOdd = true;
            }
        }

        return $result;
    }
}