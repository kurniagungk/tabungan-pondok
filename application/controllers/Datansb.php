<?php  
 
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Datansb extends CI_Controller {

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
 		       $data["rekening"] = $this->Datansb_model->idnsb();
           $data["title"] = "DATA NASABAH TABUNGAN AL-KAHFI SOMALANGU";  
           $this->load->view('vdatansb', $data);  
      }


 function fetch_user(){  

           $fetch_data = $this->Datansb_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = '<img src="'.base_url().'upload/'.$row->GAMBAR.'" class="img-thumbnail" id="asd">';   
                $sub_array[] = $row->REKENING;  
                $sub_array[] = $row->NAMA;
                $sub_array[] = $row->ALAMAT;
    			$sub_array[] = 'Rp ' . number_format("$row->SALDO",2,",",".");
    			$sub_array[] = '<button type="button" id="update" data-toggle="modal" data-target="#myModal" name="update" rekening="'.$row->REKENING.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" id="delete" name="delete" rekening="'.$row->REKENING.'" class="btn btn-danger btn-xs">Delete</button>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Datansb_model->get_all_data(),  
                "recordsFiltered"     =>     $this->Datansb_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }


function user_action(){
    $idtr = $this->Datansb_model->idtr();
		 $asd = $this->input->post("action");  
           if( $asd == "Add")  
           {  
                $insert_data = array(  
                     'REKENING'          =>     $this->input->post("REKENING"),  
                     'NAMA'               =>     $this->input->post("NAMA"),
                      'ALAMAT'               =>     $this->input->post("ALAMAT"),
                      'SALDO'               =>     $this->input->post("SALDO"),
                      'PASSWORD'               =>     $this->input->post("PASWORD"), 
                     'GAMBAR'                    =>     $this->upload_image()  
                );
                $transaksi = array(
                  'TANGGAL'          =>  date("Y-m-d"),
                  'IDTR'             =>  $this->Datansb_model->idtr(),
                  'REKENING'         => $this->input->post("REKENING"),
                  'JENIS'            => "Setor",
                  'JUMLAH'           => $this->input->post("SALDO")
                );                
                $this->Datansb_model->insert_crud($insert_data);
                $this->Datansb_model->insert_tr($transaksi);
                echo 'Data Inserted';  
           }

          if( $asd == "Edit")  
           {  
                $user_image = '';  
                if($_FILES['user_image']['name'] == '')  
                {  
                     
                     $user_image = $this->input->post("hidden_user_image");
                      
                }  
                else  
                { 
                    
                    $this->Datansb_model->gtgambar($_POST["REKENING"]);  
                    $user_image = $this->upload_image();
                }  
                $updated_data = array(  
                     'NAMA'               =>     $this->input->post("NAMA"),
                      'ALAMAT'               =>     $this->input->post("ALAMAT"),
                      'SALDO'               =>     $this->input->post("SALDO"),
                      'PASSWORD'               =>     $this->input->post("PASWORD"), 
                     'GAMBAR'                    =>     $user_image   
                );   
                $this->Datansb_model->update_crud($this->input->post("REKENING"), $updated_data);  
                echo $asd;  
           }


      }  
      function upload_image()  
      {  
           if(isset($_FILES["user_image"]))  
           {  
                $extension = explode('/', $_FILES['user_image']['type']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/' . $new_name;  
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
                return $new_name;  
           }   
      	}



function idnsb(){
	$idnsb = $this->Datansb_model->idnsb();
	echo $idnsb;

}

function fetch_single_user()  
      {  
           $output = array();   
           $data = $this->Datansb_model->fetch_single_user($_POST["REKENING"]);  
           foreach($data as $row)  
           {  
                $output['REKENING'] = $row->REKENING;  
                $output['NAMA'] = $row->NAMA;
                $output['ALAMAT'] = $row->ALAMAT;
                $output['SALDO'] = $row->SALDO;
                $output['PASSWORD'] = $row->PASSWORD;
                $output['GAMBAR'] = $row->GAMBAR; 
                if($row->GAMBAR != '')  
                {  
                     $output['user_image'] = ' <img src="'.base_url().'upload/'.$row->GAMBAR.' " alt="..." id="gbnsb" class="img-responsive" width="300" height="300">
                     <input type="hidden" name="hidden_user_image" value="'.$row->GAMBAR.'" />';  
                }  
                else  
                {  
                     $output['GAMBAR'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }


function fetch_single_user1()  
      {  
           $output = array();   
           $data = $this->Datansb_model->fetch_single_user($_POST["REKENING"]);  
           foreach($data as $row)  
           {  
                $output['REKENING'] = $row->REKENING;  
                $output['NAMA'] = $row->NAMA;
                $output['ALAMAT'] = $row->ALAMAT;
                $output['SALDO'] = $row->SALDO;
                $output['PASSWORD'] = $row->PASSWORD;
                $output['GAMBAR'] = $row->GAMBAR; 
                if($row->GAMBAR != '')  
                {  
                     $output['user_image'] = ' <img src="'.base_url().'upload/'.$row->GAMBAR.' " alt="..." id="gbmodal" class="img-responsive" width="300" height="300">
                     <input type="hidden" name="hidden_user_image" value="'.$row->GAMBAR.'" />';  
                }  
                else  
                {  
                     $output['GAMBAR'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 


function delete_single_user()  
      {  
           $this->Datansb_model->delete_single_user($_POST["REKENING"]);  
           echo 'Data Deleted';  
      }

function fetch_single_usern()  
      {  
           $output = array();   
           $data = $this->Datansb_model->fetch_single_user($_POST["REKENING"]);  
           foreach($data as $row)  
           {  
                $output['REKENING'] = $row->REKENING;  
                $output['NAMA'] = $row->NAMA;
                $output['ALAMAT'] = $row->ALAMAT;
                $output['GAMBAR'] = $row->GAMBAR; 
                if($row->GAMBAR != '')  
                {  
                     $output['user_image'] = ' <img src="'.base_url().'upload/'.$row->GAMBAR.' " alt="..." id="gbmodal" class="img-responsive" width="350" height="350">
                     <input type="hidden" name="hidden_user_image" value="'.$row->GAMBAR.'" />';  
                }  
                else  
                {  
                     $output['GAMBAR'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 








 }     	 


 ?>