<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 02/03/18
 * Time: 2:23
 */

include "Ann.php";

$s = new Ann();

$s->setInterestingClass(1);

$s->setInputs([121,16.8]);
$s->setInputs([114,15.2]);
$s->setInputs([210,9.4]);
$s->setInputs([195,8.1]);

$s->setOutputs(1);
$s->setOutputs(1);
$s->setOutputs(2);
$s->setOutputs(2);

$s->train();
//echo $s->activationFunction(-123);