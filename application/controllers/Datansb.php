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



function excel()
     {
          $data = $this->Datansb_model->exceln();
          include APPPATH . 'third_party\PHPExcel-1.8\Classes\PHPExcel.php';

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


          $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA NASABAH TABUNGAN AL-KAHFI"); // Set kolom A1 dengan tulisan "DATA SISWA"
          $excel->getActiveSheet()->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai E1
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
          // Buat header tabel nya pada baris ke 3
          $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "ALAMAT"); // Set kolom C3 dengan tulisan "NAMA"
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "SALDO"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
          // Apply style header yang telah kita buat tadi ke masing-masing kolom header
          $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);

          // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
          $nasabah = $this->Datansb_model->exceln();


          $no = 1; // Untuk penomoran tabel, di awal set dengan 1
          $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
          foreach ($nasabah as $data) { // Lakukan looping pada variabel siswa
               $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
               $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->NAMA);
               $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->ALAMAT);
               $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->SALDO);


               // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
               $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
               $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
               $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
               $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);

               $no++; // Tambah 1 setiap kali looping
               $numrow++; // Tambah 1 setiap kali looping
          }




          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); // Set width kolom C
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D

          // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          // Set orientasi kertas jadi LANDSCAPE
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
          // Set judul file excel nya
          $excel->getActiveSheet(0)->setTitle("Data Nasabah tabungan Alkahfi");
          $excel->setActiveSheetIndex(0);
          // Proses file excel
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="DATA NASABAH.xlsx"'); // Set nama file excel nya
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
     }




 }     	 


 ?>
