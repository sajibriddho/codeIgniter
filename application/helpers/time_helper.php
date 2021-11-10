<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

function get_current_time()
{
	$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	$current_time = $date->format('Y-m-d H:i') . "\n";
	return $current_time;
}
function get_current_date()
{

	$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	$current_time = $date->format('d-m-Y') . "\n";
	return $current_time;
}

function get_compare_datetime_year($datetime_1, $date_time_2)
{

	$diff = abs(strtotime($date_time_2) - strtotime($datetime_1));

	$years = floor($diff / (365 * 60 * 60 * 24));
	return $years;
}

function get_compare_datetime_month($datetime_1, $date_time_2)
{

	$diff = abs(strtotime($date_time_2) - strtotime($datetime_1));
	$years = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	return $months;
}

function get_compare_datetime_day($datetime_1, $date_time_2)
{
	$diff = abs(strtotime($date_time_2) - strtotime($datetime_1));
	$years = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
	return $days;
}

//---------------------------------------//

function y_m_1()
{
	$start_date = date('Y-m-1');
	return $start_date;
}

function current_day()
{
	$current_day = date('d');
	return $current_day;
}

function y_m()
{
	$start_date = date('Y-m-');
	return $start_date;
}

function year()
{
	$start_date = date('Y');
	return $start_date;
}

function month()
{
	$start_date = date('m');
	return $start_date;
}

function start_date_savings()
{
	$start_date = date('Y-m-1 24:00:00');
	return $start_date;
}

function timeformater($getTime)
{
	return date("Y-m-d", strtotime($getTime));
}

function date_tine_formater($get_date)
{
	$dt = new DateTime($get_date, new DateTimezone('Asia/Dhaka'));
	return $dt->format('l, d M Y, h:i a');
}



function dateFormatterDMY($getTime)
{
	return date("d-m-Y", strtotime($getTime));
}


function bn_date($str)
{
	$en = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
	$bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
	$str = str_replace($en, $bn, $str);
	$en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$en_short = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	$bn = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
	$str = str_replace($en, $bn, $str);
	$str = str_replace($en_short, $bn, $str);
	$en = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
	$en_short = array('Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri');
	$bn_short = array('শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ', 'শুক্র');
	$bn = array('শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
	$str = str_replace($en, $bn, $str);
	$str = str_replace($en_short, $bn_short, $str);
	$en = array('am', 'pm');
	$bn = array('পূর্বাহ্ন', 'অপরাহ্ন');
	$str = str_replace($en, $bn, $str);
	return $str;
}
