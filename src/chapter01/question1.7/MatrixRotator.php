<?php

class MatrixRotator
{
    /**
     * a b c d
     * e f g h
     * i j k l
     * m n o p
     * --
     * m i e a
     * n j f b
     * o k g c
     * p l h d
     */
    public static function rotate(array &$matrix)
    {
        $dimension = count($matrix);

        $result = [];
        for ($position = 0; $position < $dimension; $position++) {
            $row = [];
            for ($rowNumber = $dimension - 1; $rowNumber >= 0; $rowNumber--) {
                $row[] = $matrix[$rowNumber][$position];
            }

            $result[] = $row;
        }

        $matrix = $result;
    }
}
