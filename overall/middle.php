<?php
//Dynamic Pages Load
$pages_dir = 'include';

if (!empty($_GET['p'])) {
	$pages = scandir($pages_dir, 0);
	unset($pages[0], $pages[1]);
	
	$p = $_GET['p'];
	
	if (in_array($p . '.inc.php', $pages)) {
		include $pages_dir . '/' . $p . '.inc.php';
	} else {
		include $pages_dir . '/errors.inc.php';
	}
} else {	
	include $pages_dir . '/main.inc.php';
}
?>