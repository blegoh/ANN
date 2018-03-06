<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 02/03/18
 * Time: 2:02
 */

class SingleLayerPerceptron
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

    private $db;

    /**
     * @var n step in recalculating weight
     */
    private $n;

    /**
     * Ann constructor.
     */
    public function __construct()
    {
        $this->learningRate = 0.01;
        $this->weighs[] = [
            rand(-100,100), rand(-100,100), rand(-100,100)
        ];
        $this->epoch = 1000;
        $this->db = 'mysql';
    }

    /**
     * @param mixed $interestingClass
     */
    public function setInterestingClass($interestingClass)
    {
        $this->interestingClass = $interestingClass;
    }

    /**
     * input ditulis dr atas ke bawah
     */
    public function train()
    {
        for ($k = 0; $k < $this->epoch; $k++) {
            $i = 0;
            foreach ($this->inputs as $input) {
                $bias = [1];
                $a = [array_merge($bias, $input)];
                $sum = $this->multiple($this->weighs, $this->transpose($a));
                $hasil = $this->activationFunction($sum);
                $o = ($this->outputs[$i] == $this->interestingClass) ? 1 : 0;
                if ($hasil != $o) {
                    $this->recalculate($i, $hasil, $o);
                }
                echo json_encode($hasil) . " i = " . json_encode($this->outputs[$i]) . "\n";
                echo json_encode($this->weighs) . " \n";
                $i++;
            }
        }
    }

    /**
     * w(n+1) = w(n)+ learningrate[d(n)-y(n)]X(n)
     * @param $index
     */
    private function recalculate($index, $predict, $actual)
    {
        $this->n++;
        $input = [array_merge([1],$this->inputs[$index])];
        if ($predict > $actual){
            $a = $this->minus($this->transpose($this->weighs),$this->multipleScalar($this->learningRate,$this->transpose($input)));
        }else{
            $a = $this->sum($this->transpose($this->weighs),$this->multipleScalar($this->learningRate,$this->transpose($input)));
        }
        $this->weighs = $this->transpose($a);
    }

    public function activationFunction($output)
    {
        for ($i = 0; $i < count($output); $i++) {
            for ($j = 0; $j < count($output[$i]); $j++) {
                $output[$i][$j] = ($output[$i][$j] > 0) ? 1 : 0;
            }
        }
        return $output[0][0];
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

    /**
     * @param array $a
     * @param array $b
     */
    public function sum(Array $a, Array $b)
    {
        for ($i = 0; $i < count($a); $i++) {
            for ($j = 0; $j < count($a[$i]); $j++) {
                $c[$i][$j] = $a[$i][$j] + $b[$i][$j];
            }
        }
        return $c;
    }

    /**
     * @param array $a
     * @param array $b
     * @return mixed
     */
    public function minus(Array $a, Array $b)
    {
        for ($i = 0; $i < count($a); $i++) {
            for ($j = 0; $j < count($a[$i]); $j++) {
                $c[$i][$j] = $a[$i][$j] - $b[$i][$j];
            }
        }
        return $c;
    }

}