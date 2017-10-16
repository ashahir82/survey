<h1>Laporan Soal Selidik</h1>
<h3>Individu</h3>
<label for="viewStaff" class="ui-label">Nama / Bahagian / Jawatan</label>
<input type="text" name="viewStaff" id="viewStaff" class="ui-input ui-round-all ui-shadow" placeholder="Sila masukkan nama / bahagian / jawatan" />
<input type="button" class="ui-button ui-round-all ui-shadow ui-button-green" id="staffView" class="ui-input" value="Carian" />
<ul class="ui-listview ui-round-all ui-shadow" id="displayresult">

</ul>
<h3>Keseluruhan</h3>
<a href="/survey/include/widget/print_all.php?sid=<?php echo $staff_id; ?>" target="_blank" class="ui-button ui-round-all ui-shadow ui-button-yellow">Cetak Semua</a>
<a href="index.php" class="ui-button ui-round-all ui-shadow ui-button-red">Laman Utama</a>