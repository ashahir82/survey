<?php
// Course Page
function add_select_department($department) {
	$department = (int)$department;
	$query = "SELECT `depart_id`, `name` FROM `department`";
	$result = mysql_query($query);
	if($result)
		{
			echo "<select name='department' onchange='setOptions(document.form.department.options[document.form.department.selectedIndex].value);'>";
			echo "<option value=''>Sila pilih Bahagian...</option>";
			while ($row = mysql_fetch_array($result)) 
			{
				if ($row['depart_id'] == $department) {
					echo "<option value='".$row['depart_id']."' selected='selected' >".$row['name']."</option>";
			   } else {
				   echo "<option value='".$row['depart_id']."'>".$row['name']."</option>";
			   }
			}
			echo "</select>";
		}
}

function department_name($depart_id) {
	$depart_id = (int)$depart_id;
	$query = mysql_query("SELECT `name` FROM `department` WHERE `depart_id` = $depart_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $depart_id;
	}
}

function course_name($course_id) {
	$course_id = (int)$course_id;
	$query = mysql_query("SELECT `name` FROM `course` WHERE `course_id` = $course_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $course_id;
	}
}

function course_code($course_id) {
	$course_id = (int)$course_id;
	$query = mysql_query("SELECT `code` FROM `course` WHERE `course_id` = $course_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'code');
	} else {
		return $course_id;
	}
}

function course_id_md5($course_id) {
	$query = mysql_query("SELECT `course_id` FROM `course` WHERE md5(`course_id`) = '$course_id'");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'course_id');
	} else {
	return $course_id;
	}
}

function course_cat_md5($course_id) {
	$query = mysql_query("SELECT `category`.`name` FROM `category` WHERE `cat_id` = (SELECT `category` FROM `course` WHERE md5(`course_id`) = '$course_id')");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
	return $course_id;
	}
}

function course_dept_md5($course_id) {
	$query = mysql_query("SELECT `department`.`name` FROM `department` WHERE `depart_id` = (SELECT `department` FROM `course` WHERE md5(`course_id`) = '$course_id')");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $course_id;
	}
}

function course_name_md5($course_id) {
	$query = mysql_query("SELECT `name` FROM `course` WHERE md5(`course_id`) = '$course_id'");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $course_id;
	}
}

function course_code_md5($course_id) {
	$query = mysql_query("SELECT `code` FROM `course` WHERE md5(`course_id`) = '$course_id'");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'code');
	} else {
		return $course_id;
	}
}

function course_id_exists($course_id) {
	$course_id = sanitize($course_id);
	$query = mysql_query("SELECT COUNT(`course_id`) FROM `course` WHERE md5(`course_id`) = '$course_id'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function course_exists($code) {
	$code = sanitize($code);
	$query = mysql_query("SELECT COUNT(`course_id`) FROM `course` WHERE `code` = '$code'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function add_course($add_data) {
	array_walk ($add_data,'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($add_data)) . '`';
	$data = '\'' . implode('\', \'', $add_data) . '\'';
	
	mysql_query ("INSERT INTO `course` ($fields) VALUES ($data)");
}

function update_course($course_id, $update_data) {
	$course_id = sanitize($course_id);
	$update = array();
	array_walk ($update_data,'array_sanitize');
	
	foreach ($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `course` SET " . implode(', ',$update) . " WHERE md5(`course_id`) = '$course_id'");
}

function noic_exists($noic) {
	$noic = sanitize($noic);
	$query = mysql_query("SELECT COUNT(`apply_id`) FROM `apply` WHERE `noic` = $noic");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function noic_apply($noic) {
	$noic = sanitize($noic);
	$query = mysql_query("SELECT COUNT(`apply_id`) FROM `apply` WHERE `noic` = $noic");
	return (mysql_result($query, 0) != 0) ? true : false;
}


// Class Page
function class_id_exists($class_id) {
	$class_id = sanitize($class_id);
	$query = mysql_query("SELECT COUNT(`class_id`) FROM `class` WHERE md5(`class_id`) = '$class_id'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function add_class($add_data) {
	array_walk ($add_data,'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($add_data)) . '`';
	$data = '\'' . implode('\', \'', $add_data) . '\'';
	
	mysql_query ("INSERT INTO `class` ($fields) VALUES ($data)");
}

function update_class($class_id, $update_data) {
	$class_id = sanitize($class_id);
	$update = array();
	array_walk ($update_data,'array_sanitize');
	
	foreach ($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `class` SET " . implode(', ',$update) . " WHERE md5(`class_id`) = '$class_id'");
}


// Apply Page
function add_select_course($course) {
	$course = (int)$course;
	$query = "SELECT * FROM `course` WHERE `active` = 1 ORDER BY `course_id`";
	$result = mysql_query($query);
	if($result)
		{
			echo "<select name='course'>";
			echo "<option value=''>Sila pilih Kursus...</option>";
			while ($row = mysql_fetch_array($result)) 
			{
				if ($row['course_id'] == $course) {
					echo "<option value='".$row['course_id']."' selected='selected' >". $row['code'] . " - " . $row['name']."</option>";
			   } else {
				   echo "<option value='".$row['course_id']."'>". $row['code'] . " - " . $row['name']."</option>";
			   }
			}
			echo "</select>";
		}
}

function add_select_status($status) {
	$status = (int)$status;
	$query = "SELECT `status_id`, `name` FROM `status`";
	$result = mysql_query($query);
	if($result)
		{
			echo "<select name='status'>";
			echo "<option value=''>Sila pilih Status...</option>";
			while ($row = mysql_fetch_array($result)) 
			{
				if ($row['status_id'] == $status) {
					echo "<option value='".$row['status_id']."' selected='selected' >".$row['name']."</option>";
			   } else {
				   echo "<option value='".$row['status_id']."'>".$row['name']."</option>";
			   }
			}
			echo "</select>";
		}
}

function status_name($status_id) {
	$status_id = (int)$status_id;
	$query = mysql_query("SELECT `name` FROM `status` WHERE `status_id` = $status_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $status_id;
	}
}

function nationality_name($nationality_id) {
	$nationality_id = (int)$nationality_id;
	$query = mysql_query("SELECT `name` FROM `nationality` WHERE `nationality_id` = $nationality_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $nationality_id;
	}
}

function skm_name($skm_id) {
	$skm_id = (int)$skm_id;
	$query = mysql_query("SELECT `name` FROM `skm` WHERE `skm_id` = $skm_id");
	if (mysql_num_rows($query) != 0) {
		return mysql_result($query, 0, 'name');
	} else {
		return $skm_id;
	}
}

function mohon_kursus_exists($noic) {
	$noic = sanitize($noic);
	$query = mysql_query("SELECT COUNT(`course_apply_id`) FROM `course_apply` WHERE `noic` = $noic AND `status` = 1");
	return (mysql_result($query, 0) != 0) ? true : false;
}

function add_mohon_kursus($add_data) {
	array_walk ($add_data,'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($add_data)) . '`';
	$data = '\'' . implode('\', \'', $add_data) . '\'';
	
	mysql_query ("INSERT INTO `course_apply` ($fields) VALUES ($data)");
}

function update_mohon_kursus($noic, $update_data) {
	$noic = sanitize($noic);
	$update = array();
	array_walk ($update_data,'array_sanitize');
	
	foreach ($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `course_apply` SET " . implode(', ',$update) . " WHERE `noic` = " . $noic . " AND `status` = 1");
}

function add_pemohon($add_data) {
	array_walk ($add_data,'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($add_data)) . '`';
	$data = '\'' . implode('\', \'', $add_data) . '\'';
	
	mysql_query ("INSERT INTO `apply` ($fields) VALUES ($data)");
}

function update_pemohon($noic, $update_data) {
	$noic = sanitize($noic);
	$update = array();
	array_walk ($update_data,'array_sanitize');
	
	foreach ($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `apply` SET " . implode(', ',$update) . " WHERE `noic` = $noic");
}

function add_mohon_kursus_id($add_data) {
	$apply_id = array();
	array_walk ($add_data,'array_sanitize');
	
	foreach ($add_data as $field=>$data) {
		$apply_id[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	$query = mysql_query("SELECT `course_apply_id` FROM `course_apply` WHERE " . implode(' AND ',$apply_id));
	return mysql_result($query, 0, 'course_apply_id');
}


function mohon_kursus_id_exists($apply_id) {
	$apply_id = sanitize($apply_id);
	$query = mysql_query("SELECT COUNT(`course_apply_id`) FROM `course_apply` WHERE md5(`course_apply_id`) = '$apply_id'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function mohon_ic_exists($noic) {
	$noic = sanitize($noic);
	$query = mysql_query("SELECT COUNT(`noic`) FROM `apply` WHERE `noic` = $noic");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function mohon_kursus_data($apply_id) {
	$data = array();
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset ($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `course_apply` WHERE md5(`course_apply_id`) = '$apply_id'"));
		return $data;
	}
}


// Drop Down Time Date
function date_dropdown($selected=null, $option) {
	$year_limit = 0;
	$selected = explode("/", $selected);
	$html_output = '<div id="date_select" >'."\n";

	/*days*/
	$html_output .= '<select name="' . $option . '_day" id="day_select">'."\n";
		for ($day = 1; $day <= 31; $day++) {
			$html_output .= '<option value="' . $day . '"';
			$html_output .= ($day==$selected[0]) ? ' selected="selected"' : '';
			$html_output .= '>' . $day . '</option>'."\n";
		}
	$html_output .= '</select>'."\n";

	/*months*/
	$html_output .= '<select name="' . $option . '_month" id="month_select" >'."\n";
	$months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		for ($month = 1; $month <= 12; $month++) {
			$html_output .= '<option value="' . $month . '"';
			$html_output .= ($month==$selected[1]) ? ' selected="selected"' : '';
			$html_output .= '>' . $months[$month] . '</option>'."\n";
		}
	$html_output .= '</select>'."\n";

	/*years*/
	$html_output .= '<select name="' . $option . '_year" id="year_select">'."\n";
		for ($year = 2013; $year <= ((date("Y") + 1) - $year_limit); $year++) {
			$html_output .= '<option value="' . $year . '"';
			$html_output .= ($year==$selected[2]) ? ' selected="selected"' : '';
			$html_output .= '>' . $year . '</option>'."\n";
		}
	$html_output .= '</select>'."\n";

	$html_output .= '</div>'."\n";
    return $html_output;
}

function time_dropdown($selected=null, $option) {
	/*** range of hours ***/
	$r = range(8, 17);

	/*** current hour ***/
	$selected = is_null($selected) ? date('h') : $selected;
	
	$html_output = '<div id="date_select" >'."\n";
	$html_output .= '<select name="' . $option . '_time" id="time_select">'."\n";
	
	foreach ($r as $hour)
	{
		if ($hour <= 11) {
			$html_output .= '<option value="' . $hour . '"';
			$html_output .= ($hour==$selected) ? ' selected="selected"' : '';
			$html_output .= '>' . $hour . '.00 Pagi</option>'."\n";
		} else if ($hour >= 13 AND $hour <= 18) {
			$html_output .= '<option value="' . $hour . '"';
			$html_output .= ($hour==$selected) ? ' selected="selected"' : '';
			$html_output .= '>' . ($hour - 12) . '.00 Petang</option>'."\n";
		} else if ($hour >= 19 AND $hour <= 24) {
			$html_output .= '<option value="' . $hour . '"';
			$html_output .= ($hour==$selected) ? ' selected="selected"' : '';
			$html_output .= '>' . ($hour - 12) . '.00 Malam</option>'."\n";
		} else {
			$html_output .= '<option value="' . $hour . '"';
			$html_output .= ($hour==$selected) ? ' selected="selected"' : '';
			$html_output .= '>' . $hour . '.00 Tengah Hari</option>'."\n";
		}
	}
	$html_output .= '</select>'."\n";
	
	$html_output .= '</div>'."\n";
	return $html_output;
}
?>