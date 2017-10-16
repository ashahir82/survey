<?php
$totalStaff = mysql_num_rows(mysql_query("SELECT * FROM `staff`"));
$totalRespon = mysql_num_rows(mysql_query("SELECT * FROM `staff` WHERE`done` = 1"));
$totalNot = $totalStaff - $totalRespon;

?>
<h2>Soal Selidik Maklumat Tugas Dan Penglibatan Kakitangan ILPKL 2016</h2>
<p>Pihak pentadbiran Institut Latihan Kuala Lumpur (ILPKL) sedang mengemaskini maklumat tugas dan penglibatan kakitangan yang sedang bertugas di ILPKL.</p>
<p>Di mohon kerjasama tuan/puan untuk melengkapkan soal selidik ini secara dalam talian (<em>online survey</em>).</p>

<div class="ui-grid-a">
    <div class="ui-block-a"><div class="block-content"><b>Jumlah Respon / Maklumbalas : </b><br /><span style="font-size:60px;"><?php echo $totalRespon; ?></span></div></div>
    <div class="ui-block-b"><div class="block-content"><b>Jumlah Tidak Respon / Maklumbalas : </b><br /><span style="font-size:60px;"><?php echo $totalNot; ?></span></div></div>
</div><!-- /grid-a -->

<a href="index.php?p=search" class="ui-button ui-round-all ui-shadow ui-button-green">Seterusnya</a>