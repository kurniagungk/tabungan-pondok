<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Laporan extends CI_Controller {

 	 	public function __construct(){
		parent::__construct();
		
		
		$this->load->model('Datansb_model');
		$this->load->helper('url_helper');
		if($this->session->userdata('username') != ''){
			
		}else{
				redirect(base_url("Login"));
			
		}
		
		}

function index(){
		$data["title"] = "TRANSAKSI NASABAH TABUNGAN AL-KAHFI SOMALANGU";
        $this->load->view('Laporan');    
    }

function total(){
	$awal = $this->input->post("awal");
	$ahir = $this->input->post("ahir");
	$data = array(
					'awal' => $awal,
					'ahir' => $ahir
				);
	$totalsetor = $this->Datansb_model->totalsetor($data);
	$totaltarik = $this->Datansb_model->totaltarik($data);
	$totalsaldo = $totalsetor - $totaltarik;

	$total= array(
		'totalsetor' => 'Rp ' . number_format("$totalsetor",2,",","."),
		'totaltarik' => 'Rp ' . number_format("$totaltarik",2,",","."),
		'totalsaldo' => 'Rp ' . number_format("$totalsaldo",2,",",".")
	);

	echo json_encode($total);
}

function tabelsm(){
	$awal = $this->input->post("awal");
	$ahir = $this->input->post("ahir");
	$data = array(
					'awal' => $awal,
					'ahir' => $ahir
				);
$fetch_data = $this->Datansb_model->tablesm($data);
    $data = array();
    $i = 1;
    foreach ($fetch_data as $nsb) {
    	$tanggal = $nsb->TANGGAL;
    	$jenis = $nsb->JENIS;
   		$jumlah = $nsb->JUMLAH;
   		if($jenis=='Setor'){ $simpan=$jumlah;} else {$simpan="0";}
   		if($jenis=='Tarik'){ $ambil=$jumlah;} else {$ambil="0";}  	
		if($i==1){
			$saldo=$nsb->JUMLAH;
			} else {
			$saldo=$saldo+($simpan-$ambil);
			}
			$aaa = array();
			$aaa["no"] = $i++;
			$aaa["rekening"]= $nsb->REKENING;
			$aaa["nama"]= $nsb->NAMA;
			$aaa["tanggal"]= $nsb->TANGGAL;
			$aaa["ambil"] = 'Rp ' . number_format($ambil);
			$aaa["simpan"] = 'Rp ' . number_format($simpan);
			$aaa["jumlah"] = 'Rp ' . number_format($saldo);
			$data[] = $aaa;		
 		
    }
    $output = array('data' => $data );
	echo json_encode($output);
}

function totaln(){
	$awal 	  = $this->input->post("awal");
	$ahir 	  = $this->input->post("ahir");
	$rekening = $this->input->post("rekening");
	$data = array(
					'awal' => $awal,
					'ahir' => $ahir,
					'rekening' => $rekening 
				);
	$totalsetor = $this->Datansb_model->totalsetorn($data);
	$totaltarik = $this->Datansb_model->totaltarikn($data);
	$totalsaldo = $totalsetor - $totaltarik;

	$total= array(
		'totalsetor' => 'Rp ' . number_format($totalsetor) ,
		'totaltarik' => 'Rp ' . number_format($totaltarik) ,
		'totalsaldo' => 'Rp ' . number_format($totalsaldo)
	);

	echo json_encode($total);

}


function tabelsmn(){
	$awal = $this->input->post("awal");
	$ahir = $this->input->post("ahir");
	$rekening =$this->input->post("rekening");
	$data = array(
					'awal' => $awal,
					'ahir' => $ahir,
					'rekening'  => $rekening
				);
$fetch_data = $this->Datansb_model->tablesmn($data);
    $data = array();
    $i = 1;
    foreach ($fetch_data as $nsb) {
    	$tanggal = $nsb->TANGGAL;
    	$jenis = $nsb->JENIS;
   		$jumlah = $nsb->JUMLAH;
   		if($jenis=='Setor'){ $simpan=$jumlah;} else {$simpan="0";}
   		if($jenis=='Tarik'){ $ambil=$jumlah;} else {$ambil="0";}  	
		if($i==1){
			$saldo=$nsb->JUMLAH;
			} else {
			$saldo=$saldo+($simpan-$ambil);
			}
			$aaa = array();
			$aaa["no"] = $i++;
			$aaa["idtr"]= $nsb->IDTR;
			$aaa["tanggal"]= $nsb->TANGGAL;
			$aaa["ambil"] = 'Rp ' . number_format($ambil);
			$aaa["simpan"] = 'Rp ' . number_format($simpan);
			$aaa["jumlah"] = 'Rp ' . number_format($saldo);
			$data[] = $aaa;		
 		
    }
    $output = array('data' => $data );
	echo json_encode($output);
}






































 }
 ?>