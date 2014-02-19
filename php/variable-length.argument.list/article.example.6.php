<?php

function printVars() {

	$argsArray = func_get_args();
	if (is_array($argsArray)) {
		foreach ($argsArray as $key => $arg) {
			$argsArray[$key] = $arg . '!';
		}
	}
}

$value1 = 'value 1';
$value2 = 'value 2';
$value3 = 'value 3';
$valuesArray = array(&$value1, &$value2, &$value3);

$function_ref = new ReflectionFunction('printVars');
$res = $function_ref->invokeArgs($valuesArray);

var_dump($valuesArray);
