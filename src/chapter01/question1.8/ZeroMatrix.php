<?php

class ZeroMatrix
{
    public static function zero(array &$matrix)
    {
        $zeroElementsPosition = self::findZeroElementsPosition($matrix);

        $columnLength = count($matrix);
        $rowLength = count($matrix[0]);

        for ($i = 0; $i < $columnLength; $i++) {
            if (in_array($i, $zeroElementsPosition['column'])) {
                for ($j = 0; $j < $rowLength; $j++) {
                    $matrix[$i][$j] = 0;
                }
                continue;
            }

            for ($j = 0; $j < $rowLength; $j++) {
                if (in_array($j, $zeroElementsPosition['row'])) {
                    $matrix[$i][$j] = 0;
                }
            }
        }
    }

    private static function findZeroElementsPosition(array $matrix): array
    {
        $columnLength = count($matrix);
        $rowLength = count($matrix[0]);

        for ($i = 0; $i < $columnLength; $i++) {
            for ($j = 0; $j < $rowLength; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $result['column'][] = $i;
                    $result['row'][] = $j;
                }
            }
        }

        return $result;
    }
}
