<?php
// General
function sanitize($data) {
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function array_sanitize (&$item) {
	$item =  htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function output_errors($errors) {
	return implode(' ', $errors);
}

function icon_onoff($value) {
	$value = (int)$value;
	if ($value == 0) {
		return '<img src="image/invalid.png" width="12" height="12" alt="inactive" />';
	} else if ($value == 1) {
		return '<img src="image/valid.png" width="12" height="12" alt="active" />';
	}
}


// Staff
function staff_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`staff_id`) FROM `users` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function staff_id_exists($staff_id) {
	$staff_id = sanitize($staff_id);
	$query = mysql_query("SELECT COUNT(`staff_id`) FROM `staff` WHERE `staff_id` = '$staff_id'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function respon_id_exists($staff_id) {
	$staff_id = sanitize($staff_id);
	$query = mysql_query("SELECT COUNT(`staff_id`) FROM `survey` WHERE `staff_id` = '$staff_id'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function staff_data($staff_id) {
	$data = array();
	$staff_id = (int)$staff_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset ($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `staff` WHERE `staff_id` = '$staff_id'"));
		return $data;
	}
}

function respon_data($staff_id) {
	$data = array();
	$staff_id = (int)$staff_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset ($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `survey` WHERE `staff_id` = '$staff_id'"));
		return $data;
	}
}