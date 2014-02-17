<?php

function printVars() {
	$argsCount = func_num_args();
	$argsArray = func_get_args();
	for ($i = 0; $i < $argsCount; $i++) {
		echo $argsArray[$i] . "\n";
	}
}

$valuesArray = array('value 1', 'value 2', 'value 3');

$quotesValuesArray = array_map(function ($item) { return "'$item'"; }, $valuesArray);
eval("printVars(" . implode(', ', $quotesValuesArray) . ");");
