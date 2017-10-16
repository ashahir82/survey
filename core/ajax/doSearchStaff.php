<?php
include '../../core/init.php';

if(isset($_POST['searchStaff'])) {
	$searchStaff=sanitize($_POST['searchStaff']);
	$query = mysql_query("SELECT * FROM `staff` WHERE `name` LIKE '%$searchStaff%' OR `unit` LIKE '%$searchStaff%' OR `position` LIKE '%$searchStaff%' ORDER BY `name`");
	$totalRow = mysql_num_rows($query);
	$i = 1;
	if (mysql_num_rows($query) != 0) {
		// output data of each row
		while ($row = mysql_fetch_array($query)) {
			echo '<li class="ui-list-item';
			if ($i == 1) {
				echo ' ui-first-child';
			} else if ($i == $totalRow) {
				echo ' ui-last-child';
			}
			echo '"><a href="index.php?p=survey&sid=' . $row['staff_id'];
			if (respon_id_exists($row['staff_id'])) { echo '&mode=edit'; } else { echo '&mode=add'; }
			echo '"><span class="modeIcon">' . icon_onoff($row['done']) . '</span> ' . $row['name'] . ' <span class="nextIcon"><img src="image/forward.png" width="16" height="16" alt="next" /></span></a></li>';
			$i++;
		}
	} else {
		echo '<li class="ui-list-item ui-first-child ui-last-child"><a href="#">Tiada Rekod.</a></li>';
	}
}
?>