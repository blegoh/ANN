<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 02/03/18
 * Time: 2:02
 */

class Ann
{

    private $learningRate;

    /**
     * Ann constructor.
     */
    public function __construct()
    {
        $this->learningRate = 0.01;
    }

    /**
     * @param array $input
     */
    public function transpose(Array $input)
    {
        $transpose = [];
        foreach ($input as $key => $item) {
            foreach ($item as $k => $i) {
                $transpose[$k][$key] = $i;
            }
        }
        return $transpose;
    }

    public function multiple(Array $a, Array $b)
    {
        $result = [];
        for ($i=0;$i<count($b);$i++){
            for($j=0;$j<count($b);$j++){
                $total = 0;
                for ($k=0;$k<count($b);$k++){
                    $total += $a[$i][$k] + $a[$k][$j];
                }
                $result[$i][$i] = $total;
            }
        }
    }

}