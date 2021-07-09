<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Awal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('Datansb_model');
		$this->load->helper('url_helper');
		if ($this->session->userdata('username') != '') {
		} else {
			redirect(base_url("Login"));
		}
	}
	function index()
	{
		$this->load->view('awal');
	}





	function jurnal()
	{
		$jnsb = $this->Datansb_model->jnsb();
		$tsaldo = $this->Datansb_model->tsaldon();
		$ttarik = $this->Datansb_model->ttariknsb();
		$tsetor = $this->Datansb_model->tsetornsb();
		$cek = $this->Datansb_model->cekrekap();
		$biaya_tanggal = $this->Datansb_model->getSetting('biaya_tanggal');
		$biaya_jumlah = $this->Datansb_model->getSetting('biaya_jumlah');
		$saldo_minimal = $this->Datansb_model->getSetting('saldo_minimal');

		/*

			$rekap = $cek["total"];
			$asaldo = $cek["saldo-awal"];
		$tambahs = $cek["tambah-saldo"];
		$uyada = $cek["uang-yang-ada"];
		if ($rekap == '') {
			$rekap = "0";
		} else {
			$rekap = $rekap;
		}
				if ($asaldo == '') {
			$asaldo = "0";
		} else {
			$asaldo = $asaldo;
		}
				if ($tambahs == '') {
			$tambahs = "0";
		} else {
			$tambahs = $tambahs;
		}

				if ($uyada == '') {
			$uyada = "0";
		} else {
			$uyada = $uyada;
		}


*/

		if ($ttarik == '') {
			$tarik1 = "0";
		} else {
			$tarik1 = $ttarik;
		}
		if ($tsetor == '') {
			$tsetor1 = "0";
		} else {
			$tsetor1 = $tsetor;
		}



		$output = array(
			'jnsb' 			=> $jnsb,
			'jsaldo'		=> 'Rp ' . number_format("$tsaldo", 2, ",", "."),
			'jtarik'		=> 'Rp ' . number_format("$tarik1", 2, ",", "."),
			'jsetor'		=> 'Rp ' . number_format("$tsetor1", 2, ",", "."),
			//		'asaldo'		=> 'Rp ' . number_format("$asaldo", 2, ",", "."),
			//		'tambahs'		=> 'Rp ' . number_format("$tambahs", 2, ",", "."),
			//	'uyada'			=> 'Rp ' . number_format("$uyada", 2, ",", "."),
			//		'rekap'			=> 'Rp ' . number_format("$rekap", 2, ",", "."),
			'tanggal'			=> $biaya_tanggal[0]->isi,
			'jumlah'			=> $biaya_jumlah[0]->isi,
			'saldo'			=> $saldo_minimal[0]->isi,

		);
		echo json_encode($output);
	}

	function tanggal()
	{

		$fetch_data = $this->Datansb_model->chartambil();
		$data = array();
		foreach ($fetch_data as $row) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	function sawal()
	{
		$cek = $this->Datansb_model->cekrekap();
		$sawal = $this->input->post("asaldo");
		$input = array(
			'tanggal'       => date("Y-m-d"),
			'saldo-awal'	=> $sawal
		);
		if ($cek["tanggal"] == "") {
			$this->Datansb_model->sawal($input);
		} else {
			$this->Datansb_model->usawal($input);
		}
		echo "ok";
	}
	function stambah()
	{
		$cek = $this->Datansb_model->cekrekap();
		$tambahs = $this->input->post("tambahs");
		$ket = $this->input->post("ket");

		if ($cek["tanggal"] == "") {
			$tambahs1 = $tambahs;
		} else {
			$tambahs1 = $tambahs + $cek["tambah-saldo"];
		}
		$input = array(
			'tanggal'       => date("Y-m-d"),
			'tambah-saldo'	=> $tambahs1
		);
		$input1 = array(
			'tanggal'       => date("Y-m-d"),
			'jumlah'	=> $tambahs,
			'keterangan'	=> $ket
		);
		if ($cek["tanggal"] == "") {
			$this->Datansb_model->stambah($input);
		} else {
			$this->Datansb_model->ustambah($input);
		}
		$this->Datansb_model->stambahj($input1);
		echo "ok";
	}


	function rekap()
	{
		$cek = $this->Datansb_model->cekrekap();
		$ttarik = $this->Datansb_model->ttariknsb();
		$tsetor = $this->Datansb_model->tsetornsb();
		$uangk = $cek["saldo-awal"] + $cek["tambah-saldo"] + $tsetor;
		$uangh = $cek["uang-yang-ada"] + $ttarik;

		$total = $uangh - $uangk;
		$data = 'Rp ' . number_format("$total", 2, ",", ".");
		$input = array(
			'tanggal'       => date("Y-m-d"),
			'setor'			=> $tsetor,
			'tarik'			=> $ttarik,
			'total'			=> $total
		);

		if ($cek["tanggal"] == "") {
			$this->Datansb_model->irekap($input);
		} else {
			$this->Datansb_model->urekap($input);
		}
		echo $data;
	}

	function saua()
	{
		$action = $this->input->post("action");
		$uang = $this->input->post("uang");
		$cek = $this->Datansb_model->cekrekap();


		$input = array(
			'tanggal'       => date("Y-m-d"),
			'saldo-awal'	=> $uang
		);
		$input1 = array(
			'tanggal'       => date("Y-m-d"),
			'uang-yang-ada'	=> $uang
		);
		if ($action == "UADA") {

			if ($cek["tanggal"] == "") {
				$this->Datansb_model->iuangyd($input1);
			} else {
				$this->Datansb_model->uuangyd($input1);
			}
		} else {
			if ($cek["tanggal"] == "") {
				$this->Datansb_model->sawal($input);
			} else {
				$this->Datansb_model->usawal($input);
			}
		}
	}

	function setting()
	{
		$tanggal = $this->input->post("tanggal");
		$jumlah = $this->input->post("jumlah");
		$saldo = $this->input->post("saldo");

		var_dump($saldo);

		$this->Datansb_model->saveSetting("biaya_tanggal", $tanggal);
		$this->Datansb_model->saveSetting("biaya_jumlah", $jumlah);
		$this->Datansb_model->saveSetting("saldo_minimal", $saldo);
	}

	function laporan()
	{
		$tanggal =  $this->input->post("bulan");
		if ($tanggal)
			$data = base_url() . 'awal/excel?bulan=' . $tanggal;
		else
			$data = 'error';

		echo $data;
	}


	function excel()
	{

		$bulan =  $this->input->get("bulan");
		$pecah = explode("-", $bulan);

		$data = $this->Datansb_model->exceln();
		include APPPATH . 'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Data Nasaba Tabungan')
			->setLastModifiedBy('Data Nasaba Tabungan')
			->setTitle("Data Nasaba Tabungan")
			->setSubject("Nasabah")
			->setDescription("Data Nasaba Tabungan")
			->setKeywords("Data Nasabah");

		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN TABUNGAN AL-KAHFI " . $bulan); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:C1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3



		$tsaldo = $this->Datansb_model->tsaldon();
		$tnasabah = $this->Datansb_model->tbiayanasabah($pecah[0], $pecah[1]);
		$tbiaya = $this->Datansb_model->tbiaya($pecah[0], $pecah[1]);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "Tanggal Cetak"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', date("d-m-Y H:i:s"));
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "Total Saldo Awal"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B4', $tsaldo);
		$excel->setActiveSheetIndex(0)->setCellValue('A5', "Jumlah Nasabah"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B5', $tnasabah); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('A6', "BIAYA ADMIN"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('B6', $tbiaya); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('A7', "Total Saldo Akhir"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('B7', ($tbiaya + $tsaldo)); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col)->getNumberFormat()->setFormatCode('"RP " ###0,00_-');
		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col)->getNumberFormat()->setFormatCode('"RP " ###0,00_-');
		$excel->getActiveSheet()->getStyle('A7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B7')->applyFromArray($style_col)->getNumberFormat()->setFormatCode('"RP " ###0,00_-');

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya





		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B


		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Nasabah tabungan Alkahfi");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="LAPORAN "' . $bulan . '".xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
