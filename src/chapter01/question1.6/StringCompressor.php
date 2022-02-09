<?php

class StringCompressor
{
    public static function compress(string $original): string
    {
        $translated = "";

        $count = 1;

        for ($i = 0; $i < strlen($original); $i++) {
            //last character
            if (($i + 1) == strlen($original)) {
                $translated = $translated . $original[$i] . $count;
                break;
            }

            if ($original[$i] == $original[$i + 1]) {
                $count++;
                continue;
            }

            $translated = $translated . $original[$i] . $count;
            $count = 1;
        }

        return (strlen($original) <= strlen($translated))
            ? $original
            : $translated;
    }
}
