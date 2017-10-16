<?php
if (isset($_GET['sid']) === true && empty($_GET['sid']) === false) {
	$staff_id = $_GET['sid'];
	
	if (staff_id_exists($staff_id) === true) {
		$staff = staff_data($staff_id, 'name', 'unit', 'position');
	}
}

$mode_allowed = array('edit', 'add');
if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
	if ($_GET['mode'] === 'edit') {
		$mode = $_GET['mode'];
		if (respon_id_exists($staff_id) === true) {
			$respon = respon_data($staff_id, 'yearService', 'yearILPKL', 'u21', 'u22', 'u23', 'u24', 'u25', 'u31', 'u32', 'u33');
		}
	} else {
		$mode = $_GET['mode'];
	}
} else {
	$URL="index.php?p=search";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
    exit();
}
?>
<table width="100%" class="table-data">
    <colgroup>
        <col width="10%" />
        <col width="35%" />
        <col width="35%" />
        <col width="20%" />
    </colgroup>
    <tr>
    	<th colspan="4">MAKLUMAT INDIVIDU</th>
    </tr>
    <tr>
        <td colspan="2">Nama</td>
        <td colspan="2"><?php echo $staff['name']; ?><input type="hidden" name="staffID" id="staffID" value="<?php echo $staff_id; ?>" /><input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" /></td>
    </tr>
    <tr>
        <td colspan="2">Bengkel / Unit / Bahagian</td>
        <td colspan="2"><?php echo $staff['unit']; ?></td>
    </tr>
    <tr>
        <td colspan="2">Jawatan</td>
        <td colspan="2"><?php echo $staff['position']; ?></td>
    </tr>
    <tr>
    	<th colspan="4">1. PERKHIDMATAN</th>
    </tr>
    <tr>
    	<td>1.1</td>
        <td colspan="2">Telah berkhidmat sebagai kakitangan awam mulai tahun:</td>
        <td><input type="text" name="yearService" id="yearService" class="ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Masukkan tahun YYYY" value="<?php if ($_GET['mode'] === 'edit'){ echo $respon['yearService']; } else if (empty($_POST) === false) { echo $_POST['yearService']; } ?>" /></td>
    </tr>
    <tr>
        <td>1.2</td>
        <td colspan="2">Telah berkhidmat di ILPKL mulai tahun:</td>
        <td><input type="text" name="yearILPKL" id="yearILPKL" class="ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Masukkan tahun YYYY" value="<?php if ($_GET['mode'] === 'edit'){ echo $respon['yearILPKL']; } else if (empty($_POST) === false) { echo $_POST['yearILPKL']; } ?>" /></td>
    </tr>
    <tr>
    	<th colspan="4">2. TUGAS HARIAN</th>
    </tr>
    <tr>
        <td>2.1</td>
        <td colspan="2">Adakah anda mempunyai Senarai Tugas?</td>
        <?php if ($_GET['mode'] === 'edit'){ $u21 = $respon['u21']; } else if (empty($_POST) === false) { $u21 = $_POST['u21']; } ?>
        <td><div class="ui-radio-group"><span><input name="u21" id="u21" type="radio" value="Y" <?php if ($u21 == 'Y') { echo 'checked = "checked"'; } ?> />Ya</span><span><input name="u21" id="u21" type="radio" value="T" <?php if ($u21 == 'T') { echo 'checked = "checked"'; } ?> />Tidak</span></div></td>
    </tr>
    <tr>
        <td>2.2</td>
        <td colspan="2">Adakah anda melaksanakan tugas selain dari senarai tugas yang telah ditetapkan?</td>
        <?php if ($_GET['mode'] === 'edit'){ $u22 = $respon['u22']; } else if (empty($_POST) === false) { $u22 = $_POST['u22']; } ?>
        <td><div class="ui-radio-group"><span><input name="u22" id="u22" type="radio" value="Y" <?php if ($u22 == 'Y') { echo 'checked = "checked"'; } ?> />Ya</span><span><input name="u22" id="u22" type="radio" value="T" <?php if ($u22 == 'T') { echo 'checked = "checked"'; } ?> />Tidak</span></div></td>
    </tr>
    <tr>
        <td>2.3</td>
        <td colspan="2">Adakah tugas tambahan tersebut membebankan anda?</td>
        <?php if ($_GET['mode'] === 'edit'){ $u23 = $respon['u23']; } else if (empty($_POST) === false) { $u23 = $_POST['u23']; } ?>
        <td><div class="ui-radio-group"><span><input name="u23" id="u23" type="radio" value="Y" <?php if ($u23 == 'Y') { echo 'checked = "checked"'; } ?> />Ya</span><span><input name="u23" id="u23" type="radio" value="T" <?php if ($u23 == 'T') { echo 'checked = "checked"'; } ?> />Tidak</span></div></td>
    </tr>
    <tr>
        <td>2.4</td>
        <td colspan="2">Adakah anda bosan dengan tugas sekarang?</td>
        <?php if ($_GET['mode'] === 'edit'){ $u24 = $respon['u24']; } else if (empty($_POST) === false) { $u24 = $_POST['u24']; } ?>
        <td><div class="ui-radio-group"><span><input name="u24" id="u24" type="radio" value="Y" <?php if ($u24 == 'Y') { echo 'checked = "checked"'; } ?> />Ya</span><span><input name="u24" id="u24" type="radio" value="T" <?php if ($u24 == 'T') { echo 'checked = "checked"'; } ?> />Tidak</span></div></td>
    </tr>
    <tr>
        <td>2.5</td>
        <td colspan="2">Adakah anda berbangga dengan tugas sekarang?</td>
        <?php if ($_GET['mode'] === 'edit'){ $u25 = $respon['u25']; } else if (empty($_POST) === false) { $u25 = $_POST['u25']; } ?>
        <td><div class="ui-radio-group"><span><input name="u25" id="u25" type="radio" value="Y" <?php if ($u25 == 'Y') { echo 'checked = "checked"'; } ?> />Ya</span><span><input name="u25" id="u25" type="radio" value="T" <?php if ($u25 == 'T') { echo 'checked = "checked"'; } ?> />Tidak</span></div></td>
    </tr>
    <tr>
    	<th colspan="4">3. PENGLIBATAN</th>
    </tr>
    <tr>
        <td>3.1</td>
        <td colspan="3">
        	Badan beruniform yang disertai:<input type="button" class="ui-button ui-round-all ui-shadow ui-button-blue ui-mini ui-no-margin" id="addUniform" class="ui-input" value="Tambah" />
        	<table border="0" width="100%" id="insertUniform">
            	<?php if ($_GET['mode'] === 'edit'){
					if (empty($respon['u31']) === false) {
						$insertUniform = explode(',',$respon['u31']);
						$array_Uniform = count($insertUniform);
						
						for($i=0; $i < $array_Uniform ; $i++){
							echo '<tr class="dataRow"><td><input type="text" name="insUniform" id="insUniform" class="insUniform ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Badan beruniform" value="' . $insertUniform[$i] . '" /></td><td><input type="button" class="ui-button ui-round-all ui-shadow ui-button-yellow ui-mini ui-no-margin" id="removrThis" class="ui-input" value="Buang" onclick="deleteRow(this)" /></td></tr>';
						}
					}
				} ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>3.2</td>
        <td colspan="3">Jawatankuasa / Aktiviti / Tugas yang disertai:<input type="button" class="ui-button ui-round-all ui-shadow ui-button-blue ui-mini ui-no-margin" id="addActivities" class="ui-input" value="Tambah" />
        	<table border="0" width="100%" id="insertActivities">
            	<?php if ($_GET['mode'] === 'edit'){
					if (empty($respon['u32']) === false && empty($respon['u33']) === false) {
						$insertAct = explode(',',$respon['u32']);
						$insertActLevel = explode(',',$respon['u33']);
						$array_Act = count($insertAct);
						
						for($i=0; $i < $array_Act ; $i++){
							echo '<tr class="dataRow"><td><input type="text" name="insAct" id="insAct" class="insAct ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Jawatankuasa / Aktiviti / Tugas" value="' . $insertAct[$i] . '" /></td><td><input type="text" name="insActLvl" id="insActLvl" class="insActLvl ui-input ui-round-all ui-shadow ui-no-margin" placeholder="Peringkat (KSM / JTM / ILPKL)" value="' . $insertActLevel[$i] . '" /></td><td><input type="button" class="ui-button ui-round-all ui-shadow ui-button-yellow ui-mini ui-no-margin" id="removrThis" class="ui-input" value="Buang" onclick="deleteRow(this)" /></td></tr>';
						}
					}
				} ?>
            </table>
        </td>
    </tr>
</table>
<input type="button" class="ui-button ui-round-all ui-shadow ui-button-green" id="saveData" class="ui-input" value="Simpan" />
<a href="index.php?p=search" class="ui-button ui-round-all ui-shadow ui-button-red">Batal</a>
