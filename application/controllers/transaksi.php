<?php

defined('BASEPATH') or exit('No direct script access allowed');
class transaksi extends CI_Controller
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
		$data["title"] = "TRANSAKSI NASABAH TABUNGAN AL-KAHFI SOMALANGU";
		$this->load->view('transaksi', $data);
	}

	function cr()
	{
		$data = $this->Datansb_model->fetch_single_user($_POST["REKENING"]);
	}

	function idtr()
	{
		$idnsb = $this->Datansb_model->idtr();
		echo $idnsb;
	}

	function transaksi()
	{
		$jumlah = $this->input->post("jumlah");
		$saldo = $this->input->post("saldo");
		$jenis = $this->input->post("jenis");


		$transaksi = "";

		if ($jenis == "setor") {
			$user = array('SALDO' => $jumlah + $saldo);
			$transaksi = array(
				'TANGGAL'       =>  date("Y-m-d"),
				'IDTR' 			=> $this->input->post("idtr"),
				'JUMLAH' 		=> $jumlah,
				'JENIS'            => "Setor",
				'REKENING'         => $this->input->post("rekening"),
				'KETERANGAN'         => $this->input->post("keterangan"),
			);
		}


		$saldo_minimal = $this->Datansb_model->getSetting('saldo_minimal')[0]->isi;

		if ($jenis == "tarik" && $jumlah <= ($saldo - $saldo_minimal) && $saldo > $saldo_minimal) {
			$user = array('SALDO' => $saldo - $jumlah);
			$transaksi = array(
				'TANGGAL'       =>  date("Y-m-d"),
				'IDTR' 			=> $this->input->post("idtr"),
				'JUMLAH' 		=> $jumlah,
				'JENIS'            => "Tarik",
				'REKENING'         => $this->input->post("rekening"),
				'KETERANGAN'         => $this->input->post("keterangan"),
			);
		}


		if ($transaksi != "") {
			$this->Datansb_model->insert_tr($transaksi);
			$ASD = $this->Datansb_model->update_crud($this->input->post("rekening"), $user);
		} else {

			echo "saldo";
		}
	}

	function tablensb()
	{
		$fetch_data = $this->Datansb_model->tablensb($_POST["REKENING"]);
		$data = array();
		$i = 1;
		$saldo = 0;
		foreach ($fetch_data as $nsb) {
			$tanggal = $nsb->TANGGAL;
			$jenis = $nsb->JENIS;
			$jumlah = $nsb->JUMLAH;
			if ($jenis == 'Setor') {
				$simpan = $jumlah;
			} else {
				$simpan = "0";
			}
			if ($jenis == 'Tarik') {
				$ambil = $jumlah;
			} else {
				$ambil = "0";
			}
			if ($i == 1) {
				$saldo = $nsb->JUMLAH;
			} else {
				$saldo += ($simpan - $ambil);
			}
			$aaa = array();
			$aaa["No"] = $i++;
			$aaa["tanggal"] = $nsb->TANGGAL;
			$aaa["ambil"] = 'Rp ' . number_format($ambil);
			$aaa["simpan"] = 'Rp ' . number_format($simpan);
			$aaa["jumlah"] = 'Rp ' . number_format($saldo);
			$aaa["keterangan"] = $nsb->KETERANGAN;
			$data[] = $aaa;
		}
		$output = array('data' => $data);


		echo json_encode($output);
	}

	function pass()
	{
		$data = $this->Datansb_model->pass($this->input->post("REKENING"));
		$psi = $this->input->post("PASWORD");
		$psd = $data[0]->PASSWORD;
		if ($psi == $psd) {
			echo "benar";
		} else {
			echo "salah";
		}
	}

	function fetch_single_user()
	{
		$output = array();
		$asd = ($_POST["REKENING"]);
		$dsa = substr($asd, 0, 3);
		if ($dsa == "nsb" || $dsa == "NSB") {
		} else {
			$asd = "NSB" . $asd;
		}

		$data = $this->Datansb_model->fetch_single_user($asd);
		foreach ($data as $row) {
			$output['REKENING'] = $row->REKENING;
			$output['NAMA'] = $row->NAMA;
			$output['ALAMAT'] = $row->ALAMAT;
			$output['SALDO'] = $row->SALDO;
			$output['PASSWORD'] = $row->PASSWORD;
			$output['GAMBAR'] = $row->GAMBAR;
			if ($row->GAMBAR != '') {
				$output['user_image'] = ' <img src="' . base_url() . 'upload/' . $row->GAMBAR . ' " alt="..." id="gbmodal" class="img-responsive" width="300" height="400">
                     <input type="hidden" name="hidden_user_image" value="' . $row->GAMBAR . '" />';
			} else {
				$output['GAMBAR'] = '<input type="hidden" name="hidden_user_image" value="" />';
			}
		}

		echo json_encode($output);
	}
}
