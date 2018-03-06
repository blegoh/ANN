<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 02/03/18
 * Time: 2:23
 */

include "vendor/autoload.php";


$s = new SingleLayerPerceptron();

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
$s->save();
/*$qwe = [[1,2,3],[1,2,3],[1,2,3]];
$wea = [[4,2,6],[1,7,3],[1,2,5]];
echo json_encode($s->minus($qwe,$wea));*/
//echo $s->activationFunction(-123);