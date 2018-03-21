<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 21/03/18
 * Time: 14:17
 */

class SimpleNeuralNetwork
{

    private $inputNeuron;

    private $hiddenNeuron;

    private $outputNeuron;

    private $learningRate;

    private $w1;

    private $w2;

    private $z2;

    private $a2;

    private $z3;

    private $yHat;

    private $inputs;

    private $outputs;

    /**
     * SimpleNeuralNetwork constructor.
     * @param $inputNeuron
     * @param $hiddenNeuron
     * @param $outputNeuron
     */
    public function __construct($inputNeuron, $hiddenNeuron, $outputNeuron)
    {
        $this->inputNeuron = $inputNeuron;
        $this->hiddenNeuron = $hiddenNeuron;
        $this->outputNeuron = $outputNeuron;
    }

    public function forward(){
        $this->z2 = NumPHP::multiple($this->inputs,$this->w1);
        $this->a2 = $this->sigmoid($this->z2);
        $this->z3 = NumPHP::multiple($this->a2,$this->w2);
        $this->yHat = $this->sigmoid($this->z3);
        return $this->yHat;
    }

    public function sigmoid($z){
        for ($i=0;$i < count($z);$i++){
            $z[$i] = 1/(1+exp(-1*$z[$i]));
        }
        return 1/(1+exp(-1*$z));
    }

}