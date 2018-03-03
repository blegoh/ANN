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

    private $inputs;

    private $outputs;

    private $weighs;

    private $epoch;

    /**
     * Ann constructor.
     */
    public function __construct()
    {
        $this->learningRate = 0.01;
    }

    /**
     * @param mixed $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs[] = $inputs;
    }

    /**
     * @param mixed $outputs
     */
    public function setOutputs($outputs)
    {
        $this->outputs[] = $outputs;
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

    /**
     * a x b
     * @param array $a
     * @param array $b
     */
    public function multiple(Array $a, Array $b)
    {
        $result = [];
        for ($i=0;$i<count($a);$i++){
            for($j=0;$j<count($a);$j++){
                $total = 0;
                for ($k=0;$k<count($b);$k++){
                    $total += ($a[$i][$k] * $b[$k][$j]);
                }
                echo $total."\n";
                $result[$i][$i] = $total;
            }
        }
        return $result;
    }

}