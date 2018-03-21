<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 21/03/18
 * Time: 14:43
 */

class NumPHP
{

    /**
     * a x b
     * @param array $a
     * @param array $b
     */
    private function multiple(Array $a, Array $b)
    {
        $result = [];
        for ($i = 0; $i < count($a); $i++) {
            for ($j = 0; $j < count($a); $j++) {
                $total = 0;
                for ($k = 0; $k < count($b); $k++) {
                    $total += ($a[$i][$k] * $b[$k][$j]);
                }
                $result[$i][$j] = $total;
            }
        }
        return $result;
    }

    /**
     * @param $a
     * @param array $b
     */
    private function multipleScalar($a, Array $b)
    {
        for ($i = 0; $i < count($b); $i++) {
            for ($j = 0; $j < count($b[$i]); $j++) {
                $b[$i][$j] = $b[$i][$j] * $a;
            }
        }
        return $b;
    }

}