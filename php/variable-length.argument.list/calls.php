<?php

function buildVars() {
     $res = '';
     $argsCount = func_num_args();
     $argsArray = func_get_args();
     for ($i = 0; $i < $argsCount; $i++) {
         $res .= $argsArray[$i] . "\t";
     }
     return $res . "\n"; 
} 

//print buildVars('value_1_1', 'value_2_1', 'value_3_1');

for ($x = 0; $x < 20; $x++) {
	$time0 = microtime(TRUE);
	for ($i = 0; $i < 10000; $i++) {
		eval('$res = ' . "buildVars('value_1_$i', 'value_2_$i', 'value_3_$i');");
		//print $res;
	}
	$time0 = microtime(TRUE) - $time0;

	$time1 = microtime(TRUE);
	for ($i = 0; $i < 10000; $i++) {
		$res = call_user_func_array('buildVars',
		    array("value_1_$i", "value_2_$i", "value_3_$i"));
		//print $res;
	}
	$time1 = microtime(TRUE) - $time1;

	$time2 = microtime(TRUE);
	$function_ref = new ReflectionFunction('buildVars');
	for ($i = 0; $i < 10000; $i++) {
		$res = $function_ref->invokeArgs(
		    array("value_1_$i", "value_2_$i", "value_3_$i"));
		//print $res;
	}
	$time2 = microtime(TRUE) - $time2;

	$times[0][] = $time0;
	$times[1][] = $time1;
	$times[2][] = $time2;
}

print_r($times[0]); 
print "\n";
print array_sum($times[0]) / count($times[0]);
print "\n";

print_r($times[1]); 
print "\n";
print array_sum($times[1]) / count($times[1]);
print "\n";

print_r($times[2]); 
print "\n";
print array_sum($times[2]) / count($times[2]);
print "\n";

