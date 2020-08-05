<?php 

 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Awal extends CI_Controller {

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
           $this->load->view('awal');  
      }





function jurnal(){
 $jnsb = $this->Datansb_model->jnsb();
$tsaldo = $this->Datansb_model->tsaldon();
$ttarik = $this->Datansb_model->ttariknsb();
$tsetor = $this->Datansb_model->tsetornsb();
$cek = $this->Datansb_model->cekrekap();
$rekap = $cek["total"];
$asaldo = $cek["saldo-awal"];
$tambahs = $cek["tambah-saldo"];
$uyada = $cek["uang-yang-ada"];



if($ttarik==''){ $tarik1="0";} else {$tarik1=$ttarik;}
if($tsetor==''){ $tsetor1="0";} else {$tsetor1=$tsetor;}
if($rekap==''){ $rekap="0";} else {$rekap=$rekap;}
if($asaldo==''){ $asaldo="0";} else {$asaldo=$asaldo;}
if($tambahs==''){ $tambahs="0";} else {$tambahs=$tambahs;}
if($uyada==''){ $uyada="0";} else {$uyada=$uyada;}




 $output = array(
 					'jnsb' 			=> $jnsb,
 					'jsaldo'		=> 'Rp ' . number_format("$tsaldo",2,",","."),
 					'jtarik'		=> 'Rp ' . number_format("$tarik1",2,",","."),
 					'jsetor'		=> 'Rp ' . number_format("$tsetor1",2,",","."),
 					'asaldo'		=> 'Rp ' . number_format("$asaldo",2,",","."),
 					'tambahs'		=> 'Rp ' . number_format("$tambahs",2,",","."),
 					'uyada'			=> 'Rp ' . number_format("$uyada",2,",","."),
 					'rekap'			=> 'Rp ' . number_format("$rekap",2,",","."),

 				 );
echo json_encode($output);

}

function tanggal(){

	$fetch_data = $this->Datansb_model->chartambil();
	$data = array();
	foreach($fetch_data as $row){
			$data[] = $row;
	}
	echo json_encode($data);
}

function sawal(){
	$cek = $this->Datansb_model->cekrekap();
	$sawal = $this->input->post("asaldo");
	$input = array(
		'tanggal'       => date("Y-m-d"),
		'saldo-awal'	=> $sawal
		);
	if ($cek["tanggal"] == "") {
		$this->Datansb_model->sawal($input);
	}else{
		$this->Datansb_model->usawal($input);
	}
	echo "ok";
	
}
function stambah(){
	$cek = $this->Datansb_model->cekrekap();
	$tambahs = $this->input->post("tambahs");
	$ket = $this->input->post("ket");

	if ($cek["tanggal"] == "") {
	 $tambahs1 = $tambahs;
	}else{
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

	}else{
		$this->Datansb_model->ustambah($input);
	}
	$this->Datansb_model->stambahj($input1);
	echo "ok";
}


function rekap(){
	$cek = $this->Datansb_model->cekrekap();
	$ttarik = $this->Datansb_model->ttariknsb();
	$tsetor = $this->Datansb_model->tsetornsb();
	$uangk = $cek["saldo-awal"]+$cek["tambah-saldo"]+$tsetor;
	$uangh = $cek["uang-yang-ada"]+$ttarik;

	$total = $uangh-$uangk ;
	$data = 'Rp ' . number_format("$total",2,",",".");
	$input = array(
		'tanggal'       => date("Y-m-d"),
		'setor'			=> $tsetor,
		'tarik'			=> $ttarik,
		'total'			=> $total
		);

	if ($cek["tanggal"] == "") {
		$this->Datansb_model->irekap($input);
	}else{
		$this->Datansb_model->urekap($input);
	}
	echo $data;
}

function saua(){
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
	if ($action == "UADA" ) {

			if ($cek["tanggal"] == "") {
					$this->Datansb_model->iuangyd($input1);
			}else{
					$this->Datansb_model->uuangyd($input1);
			}


	}else{
			if ($cek["tanggal"] == "") {
					$this->Datansb_model->sawal($input);
			}else{
					$this->Datansb_model->usawal($input);
			}



	}


}



}
 ?>