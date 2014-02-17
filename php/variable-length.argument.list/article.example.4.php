<?php

function printVars() {
	$trace = debug_backtrace();
	$argsArray = $trace[1]['args'][1];

	if (is_array($argsArray)) {
		foreach ($argsArray as $key => $arg) {
			$argsArray[$key] = $arg . '!';
		}
	}

//	$argsArray = func_get_args();
//	if (is_array($argsArray)) {
//		foreach ($argsArray as $key => $arg) {
//			$argsArray[$key] = $arg . '!';
//		}
//	}
}


$value1 = 'value 1';
$value2 = 'value 2';
$value3 = 'value 3';
$valuesArray = array(&$value1, &$value2, &$value3);

call_user_func_array("printVars", $valuesArray);

var_dump($valuesArray);
