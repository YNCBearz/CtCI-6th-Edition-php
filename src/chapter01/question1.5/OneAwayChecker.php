<?php

class OneAwayChecker
{
    public static function isOneOrZeroAway(string $string1, string $string2): bool
    {
        $length1 = strlen($string1);
        $length2 = strlen($string2);

        if ($length1 == $length2) {
            return self::isReplaceCharacter($string1, $string2);
        } elseif (abs($length1 - $length2) == 1) {
            return ($length1 > $length2)
                ? self::isOneCharacterDifferent($string1, $string2)
                : self::isOneCharacterDifferent($string2, $string1);
        }

        return false;
    }

    public static function isReplaceCharacter(string $string1, string $string2): bool
    {
        $result = true;

        $isReplaceOneTime = false;

        for ($i = 0; $i < strlen($string1); $i++) {
            if ($string1[$i] == $string2[$i]) {
                continue;
            }

            if ($isReplaceOneTime) {
                $result = false;
                break;
            }

            $isReplaceOneTime = true;
        }

        return $result;
    }

    /**
     * Think of
     * (i) bed & ed
     * (ii) bed & bd
     * (iii) bed & be
     *
     * @param string $longString
     * @param string $shortString
     * @return bool
     */
    public static function isOneCharacterDifferent(string $longString, string $shortString): bool
    {
        $result = true;

        $isOneCharacterDifferent = false;

        for ($i = 0; $i < strlen($longString) - 1; $i++) {
            if ($isOneCharacterDifferent && ($longString[$i] != $shortString[$i - 1])) {
                $result = false;
                break;
            }

            if ($longString[$i] == $shortString[$i]) {
                continue;
            }

            $isOneCharacterDifferent = true;
        }

        return $result;
    }
}
