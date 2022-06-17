<?php

class SortedMerge
{
    public static function merge(array &$a, array &$b)
    {
        $indexA = self::getLastElementIndex($a);
        $indexB = self::getLastElementIndex($b);

        $indexMerged = count($a) - 1;

        while ($indexB >= 0) {
            if ($indexA >= 0 && $a[$indexA] > $b[$indexB]) {
                $a[$indexMerged] = $a[$indexA];
                $indexA--;
            } else {
                $a[$indexMerged] = $b[$indexB];
                $indexB--;
            }
            $indexMerged--;
        }
    }

    public static function getLastElementIndex(array $array): int
    {
        $result = -1;
        foreach ($array as $value) {
            if (is_null($value)) {
                break;
            }
            $result++;
        }

        return $result;
    }
}
