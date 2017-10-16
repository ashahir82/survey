<?php
include '../../core/init.php';

if(isset($_POST['staffID']) && isset($_POST['yearService']) && isset($_POST['yearILPKL']) && isset($_POST['u21']) && isset($_POST['u22']) && isset($_POST['u23']) && isset($_POST['u24']) && isset($_POST['u25'])) {
	// username and password sent from Form
	$mode=sanitize($_POST['mode']);
	$staffID=sanitize($_POST['staffID']);
	$yearService=sanitize($_POST['yearService']);
	$yearILPKL=sanitize($_POST['yearILPKL']);
	$u21=sanitize($_POST['u21']);
	$u22=sanitize($_POST['u22']);
	$u23=sanitize($_POST['u23']);
	$u24=sanitize($_POST['u24']);
	$u25=sanitize($_POST['u25']);
	$insUniform=sanitize($_POST['UniformInsert']);
	$insAct=sanitize($_POST['ActInsert']);
	$insActLvl=sanitize($_POST['ActLevelInsert']);
	
	if ($_POST['mode'] === 'add') {
		if (staff_id_exists($_POST['staffID']) === false) {
			$errors[] = 'Kakitangan tidak wujud.';
		}
		if (respon_id_exists($_POST['staffID']) === true) {
			//$errors[] = 'Anda telah menjawab soal selidik ini.';
		}
	}
	if (is_numeric($_POST['yearService']) !== true || strlen($_POST['yearService']) <> 4) {
		$errors[] = 'Tahun berkhidmat sebagai kakitangan awam tidak sah.';
	}
	if (is_numeric($_POST['yearILPKL']) !== true || strlen($_POST['yearILPKL']) <> 4) {
		$errors[] = 'Tahun berkhidmat di ILPKL tidak sah.';
	}
	
	if (empty($_POST) === false && empty($errors) === true && $mode === 'add') {
		mysql_query("INSERT INTO `survey` (`staff_id`, `yearService`, `yearILPKL`, `u21`, `u22`, `u23`, `u24`, `u25`, `u31`, `u32`, `u33`) VALUES ('$staffID', '$yearService', '$yearILPKL', '$u21', '$u22', '$u23', '$u24', '$u25', '$insUniform', '$insAct', '$insActLvl')");
		mysql_query("UPDATE `staff` SET `done` = 1 WHERE `staff_id` = " . $staffID);
		echo 'true';
	} else if (empty($_POST) === false && empty($errors) === true && $mode === 'edit') {
		mysql_query("UPDATE `survey` SET `yearService` = '" . $yearService . "', `yearILPKL` = '" . $yearILPKL . "', `u21` = '" . $u21 . "', `u22` = '" . $u22 . "', `u23` = '" . $u23 . "', `u24` = '" . $u24 . "', `u25` = '" . $u25 . "', `u31` = '" . $insUniform . "', `u32` = '" . $insAct . "', `u33` = '" . $insActLvl . "' WHERE `staff_id` = " . $staffID);
		echo 'true';
	} else if (empty($errors) === false){
		echo output_errors($errors);
	}
} else {
	echo 'Tidak dibenarkan.';
}
?>