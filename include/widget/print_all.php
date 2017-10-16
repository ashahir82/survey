<?php
include '../../core/init.php';
require_once('../../tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('BKKL ILPKL');
$pdf->SetAuthor('Ahmad Shahir Bin Husin @ Mukti');
$pdf->SetTitle('eSurvey');
$pdf->SetSubject('Borang Soal Selidik Kakitangan ILPKL 2016');
$pdf->SetKeywords('eSurvey, Soal Selidik, Kakitangan ILPKL 2016, Tugas Dan Penglibatan');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins('15', '15', '15');

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('helvetica', '', 12, '', true);

// add a page
$pdf->AddPage();

// Set some content to print
$squery = mysql_query("SELECT * FROM `staff` WHERE `done` = 1 ORDER BY `unit`, `name`");
if (mysql_num_rows($squery) != 0) {
	$totalItem = mysql_num_rows($squery);
	$curPage = 1;
	
	$html = '
	<html>
	<head>
	<title>Borang Soal Selidik Kakitangan ILPKL 2016</title>
	<link href="../../css/print.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>';
	while (($rows = mysql_fetch_assoc($squery)) != false) {
		$staff = staff_data($rows['staff_id'], 'name', 'unit', 'position');
		$respon = respon_data($rows['staff_id'], 'yearService', 'yearILPKL', 'u21', 'u22', 'u23', 'u24', 'u25', 'u31', 'u32', 'u33');
		
		$html .= '<h3 class="title">MAKLUMAT TUGAS DAN PENGLIBATAN KAKITANGAN ILPKL 2016</h3>
		<table class="table-data" width="627" cellpadding="10">
			<tr>
				<th colspan="4" width="627">MAKLUMAT INDIVIDU</th>
			</tr>
			<tr>
				<td colspan="2" width="227">Nama</td>
				<td colspan="2" width="400">' . $staff['name'] . '</td>
			</tr>
			<tr>
				<td colspan="2" width="227">Bengkel / Unit / Bahagian</td>
				<td colspan="2" width="400">' . $staff['unit'] . '</td>
			</tr>
			<tr>
				<td colspan="2" width="227">Jawatan</td>
				<td colspan="2" width="400">' . $staff['position'] . '</td>
			</tr>
			<tr>
				<th colspan="4">1. PERKHIDMATAN</th>
			</tr>
			<tr>
				<td width="50" align="center">1.1</td>
				<td colspan="2" width="477">Telah berkhidmat sebagai kakitangan awam mulai tahun:</td>
				<td width="100" align="center">' . $respon['yearService'] . '</td>
			</tr>
			<tr>
				<td align="center">1.2</td>
				<td colspan="2">Telah berkhidmat di ILPKL mulai tahun:</td>
				<td align="center">' . $respon['yearILPKL'] . '</td>
			</tr>
			<tr>
				<th colspan="4">2. TUGAS HARIAN</th>
			</tr>
			<tr>
				<td align="center">2.1</td>
				<td colspan="2">Adakah anda mempunyai Senarai Tugas?</td>';
				$u21 = $respon['u21'];
				$html .= '<td align="center">';
				if ($u21 == 'Y') { $html .= 'Ya'; } else if ($u21 == 'T') { $html .= 'Tidak'; }
				$html .= '</td>
			</tr>
			<tr>
				<td align="center">2.2</td>
				<td colspan="2">Adakah anda melaksanakan tugas selain dari senarai tugas yang telah ditetapkan?</td>';
				$u22 = $respon['u22'];
				$html .= '<td align="center">';
				if ($u22 == 'Y') { $html .= 'Ya'; } else if ($u22 == 'T') { $html .= 'Tidak'; }
				$html .= '</td>
			</tr>
			<tr>
				<td align="center">2.3</td>
				<td colspan="2">Adakah tugas tambahan tersebut membebankan anda?</td>';
				$u23 = $respon['u23'];
				$html .= '<td align="center">';
				if ($u23 == 'Y') { $html .= 'Ya'; } else if ($u23 == 'T') { $html .= 'Tidak'; }
				$html .= '</td>
			</tr>
			<tr>
				<td align="center">2.4</td>
				<td colspan="2">Adakah anda bosan dengan tugas sekarang?</td>';
				$u24 = $respon['u24'];
				$html .= '<td align="center">';
				if ($u24 == 'Y') { $html .= 'Ya'; } else if ($u24 == 'T') { $html .= 'Tidak'; }
				$html .= '</td>
			</tr>
			<tr>
				<td align="center">2.5</td>
				<td colspan="2">Adakah anda berbangga dengan tugas sekarang?</td>';
				$u25 = $respon['u25'];
				$html .= '<td align="center">';
				if ($u25 == 'Y') { $html .= 'Ya'; } else if ($u25 == 'T') { $html .= 'Tidak'; }
				$html .= '</td>
			</tr>
			<tr>
				<th colspan="4">3. PENGLIBATAN</th>
			</tr>
			<tr>
				<td align="center">3.1</td>
				<td colspan="3">
					<table border="0" width="100%" id="insertUniform">';
						if (empty($respon['u31']) === false) {
							$html .= '<tr><th>Badan beruniform</th></tr>';
							$insertUniform = explode(',',$respon['u31']);
							$array_Uniform = count($insertUniform);
							$x = 1;
							
							for($i=0; $i < $array_Uniform ; $i++){
								$html .= '<tr class="dataRow"><td>' . $x . '. ' . $insertUniform[$i] . '</td></tr>';
								$x++;
							}
						}
					$html .= '</table>
				</td>
			</tr>
			<tr>
				<td align="center">3.2</td>
				<td colspan="3">
					<table border="0" width="100%" id="insertActivities">';
						if (empty($respon['u32']) === false && empty($respon['u33']) === false) {
							$html .= '<tr><th>Jawatankuasa / Aktiviti / Tugas</th><th>Peringkat</th></tr>';
							$insertAct = explode(',',$respon['u32']);
							$insertActLevel = explode(',',$respon['u33']);
							$array_Act = count($insertAct);
							$x = 1;
							
							for($i=0; $i < $array_Act ; $i++){
								$html .= '<tr class="dataRow"><td>' . $x . '. ' . $insertAct[$i] . '</td><td>' . $insertActLevel[$i] . '</td></tr>';
								$x++;
							}
						}
					$html .= '</table>
				</td>
			</tr>
		</table>';
		
		if ($curPage < $totalItem) {
			$html .= '<div class="page-break"></div>';
		}
		$curPage += 1;
	}
	$html .= '</body>
	</html>';
}

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$filerename = 'Soal Selidik Kakitangan ILPKL 2016 - Semua.pdf';
$pdf->Output($filerename, 'I');
?>