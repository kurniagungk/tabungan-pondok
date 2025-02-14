<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Login extends CI_Controller {  

      //functions

  

      function index(){ 
           $this->load->view('login');  
      } 
  
      function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('Datansb_model');  
                if($this->Datansb_model->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . '');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      function enter(){  
           if($this->session->userdata('username') != '')  
           {  
                echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';  
                echo '<label><a href="'.base_url

().'main/logout">Logout</a></label>';  
           }  
           else  
           {  
                redirect(base_url() . 'login');  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'login');  
      }  
 }  