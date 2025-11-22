<?php

$numeros = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);

ordenarCresc($numeros);

function ordenarCresc($num){
sort($num);
print_r($num);
}
