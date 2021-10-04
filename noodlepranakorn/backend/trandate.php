<?php

function tranDate($datetime){
	$ex_datetime = explode(' ',$datetime);
	$ex_date = explode('-',$ex_datetime[0]);
	$thaiyear = intval($ex_date[0])+543;
	$result = $ex_date[2].'/'.$ex_date[1].'/'.$thaiyear.' '.substr($ex_datetime[1], 0, 5).' น.';
	return $result;
}

?>