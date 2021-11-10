<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function numberToWorld($number)
{
	$search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	$replace_array = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Zero");
	$wordN = str_replace($search_array, $replace_array, $number);

	return $wordN;
}

function shorten_string($string, $wordsreturned)
{
	$retval = $string;
	$array = explode(" ", $string);
	if (count($array) <= $wordsreturned) {
		$retval = $string;
	} else {
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array) . " ";
	}
	return $retval;
}

function x_debug($data)
{
	echo '<pre>';
	print_r($data);
	echo "<br>";
	exit();
}


function x_call()
{
	$driverInstanse = &get_instance();
	echo '<pre>';
	print_r($driverInstanse->input->post());
	echo "<br>";
	exit();
}
