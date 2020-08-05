<?php
class Asdasd extends CI_Controller{
    function __construct(){
        parent::__construct();
         
    }
 
    function index(){
        $this->load->view('asd');    
    }
 
 
    function do_upload(){
        $config['upload_path']="./upload";
        $config['allowed_types']='gif|jpg|png|JPG';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->Asdasd->do_upload()){
            $data = array('upload_data' => $this->upload->data());
 
            $judul= $this->input->post('judul');
            $image= $data['upload_data']['file_name'];

            var_dump($data); 
             
        } else{echo "string";}
 
     }
     
}