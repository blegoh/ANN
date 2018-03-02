<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 02/03/18
 * Time: 2:23
 */

include "Ann.php";

$s = new Ann();
$a = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
print_r($s->transpose($a));