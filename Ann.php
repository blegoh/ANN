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

    /**
     * @var weigth and bias
     */
    private $weighs;

    private $epoch;

    private $interestingClass;

    /**
     * Ann constructor.
     */
    public function __construct()
    {
        $this->learningRate = 0.01;
        $this->weighs = [
            -1230,-30,300
        ];
    }

    /**
     * @param mixed $interestingClass
     */
    public function setInterestingClass($interestingClass)
    {
        $this->interestingClass = $interestingClass;
    }

    public function train()
    {
        $i = 0;
        foreach ($this->inputs as $input) {
            $bias = [1];
            var_dump($input);
            $input = array_merge($bias,$input);
            $sum = $this->multiple($this->transpose($this->weighs),$input);
            $hasil = $this->activationFunction($this->outputs[$i++]);
            echo $hasil;
        }
    }

    private function activationFunction($output)
    {
        return ($output > 0 ) ? 1 : 0;
    }


    /**
     * @param array $inputs
     */
    public function setInputs(Array $inputs)
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
    private function transpose(Array $input)
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
    private function multiple(Array $a, Array $b)
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