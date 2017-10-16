<?php
if (isset($_GET['sid']) === true && empty($_GET['sid']) === false) {
	$staff_id = $_GET['sid'];
	
	if (staff_id_exists($staff_id) === true) {
		$staff = staff_data($staff_id, 'name', 'unit', 'position');
	}
}

if (respon_id_exists($staff_id) === true) {
	$respon = respon_data($staff_id, 'yearService', 'yearILPKL', 'u21', 'u22', 'u23', 'u24', 'u25', 'u31', 'u32', 'u33');
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
        <td colspan="2"><?php echo $staff['name']; ?></td>
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
        <td><?php echo $respon['yearService']; ?></td>
    </tr>
    <tr>
        <td>1.2</td>
        <td colspan="2">Telah berkhidmat di ILPKL mulai tahun:</td>
        <td><?php echo $respon['yearILPKL']; ?></td>
    </tr>
    <tr>
    	<th colspan="4">2. TUGAS HARIAN</th>
    </tr>
    <tr>
        <td>2.1</td>
        <td colspan="2">Adakah anda mempunyai Senarai Tugas?</td>
        <?php $u21 = $respon['u21']; ?>
        <td><?php if ($u21 == 'Y') { echo 'Ya'; } else if ($u21 == 'T') { echo 'Tidak'; } ?></td>
    </tr>
    <tr>
        <td>2.2</td>
        <td colspan="2">Adakah anda melaksanakan tugas selain dari senarai tugas yang telah ditetapkan?</td>
        <?php $u22 = $respon['u22']; ?>
        <td><?php if ($u22 == 'Y') { echo 'Ya'; } else if ($u22 == 'T') { echo 'Tidak'; } ?></td>
    </tr>
    <tr>
        <td>2.3</td>
        <td colspan="2">Adakah tugas tambahan tersebut membebankan anda?</td>
        <?php $u23 = $respon['u23']; ?>
        <td><?php if ($u23 == 'Y') { echo 'Ya'; } else if ($u23 == 'T') { echo 'Tidak'; } ?></td>
    </tr>
    <tr>
        <td>2.4</td>
        <td colspan="2">Adakah anda bosan dengan tugas sekarang?</td>
        <?php $u24 = $respon['u24']; ?>
        <td><?php if ($u24 == 'Y') { echo 'Ya'; } else if ($u24 == 'T') { echo 'Tidak'; } ?></td>
    </tr>
    <tr>
        <td>2.5</td>
        <td colspan="2">Adakah anda berbangga dengan tugas sekarang?</td>
        <?php $u25 = $respon['u25']; ?>
        <td><?php if ($u25 == 'Y') { echo 'Ya'; } else if ($u25 == 'T') { echo 'Tidak'; } ?></td>
    </tr>
    <tr>
    	<th colspan="4">3. PENGLIBATAN</th>
    </tr>
    <tr>
        <td>3.1</td>
        <td colspan="3">Badan beruniform yang disertai:
        	<table border="0" width="100%" id="insertUniform">
            	<?php if (empty($respon['u31']) === false) {
					//echo '<th>Badan beruniform</th></tr>';
					$insertUniform = explode(',',$respon['u31']);
					$array_Uniform = count($insertUniform);
					$x = 1;
					
					for($i=0; $i < $array_Uniform ; $i++){
						echo '<tr class="dataRow"><td>' . $x . '. ' . $insertUniform[$i] . '</td></tr>';
						$x++;
					}
				} ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>3.2</td>
        <td colspan="3">Jawatankuasa / Aktiviti / Tugas yang disertai:
        	<table border="0" width="100%" id="insertActivities">
            	<?php if (empty($respon['u32']) === false && empty($respon['u33']) === false) {
					//echo '<tr><th>Jawatankuasa / Aktiviti / Tugas</th><th>Peringkat</th></tr>';
					$insertAct = explode(',',$respon['u32']);
					$insertActLevel = explode(',',$respon['u33']);
					$array_Act = count($insertAct);
					$x = 1;
					
					for($i=0; $i < $array_Act ; $i++){
						echo '<tr class="dataRow"><td>' . $x . '. ' . $insertAct[$i] . '</td><td>' . $insertActLevel[$i] . '</td></tr>';
						$x++;
					}
				} ?>
            </table>
        </td>
    </tr>
</table>
<a href="/survey/include/widget/print.php?sid=<?php echo $staff_id; ?>" target="_blank" class="ui-button ui-round-all ui-shadow ui-button-yellow">Cetak</a>
<a href="index.php?p=view" class="ui-button ui-round-all ui-shadow ui-button-red">Batal</a>
