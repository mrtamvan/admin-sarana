<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	public function index(){
        if( $this->madmin->logged_id() ){
            redirect('dashboard');
        }else{
            $this->load->view('login');
        }
        
    } //end index

    //proses cek login
	function login(){

		$email 		    = $this -> input -> post('email');
		$password 	 	= $this -> input -> post('password');
		$ceklogin 		= $this -> mlogin -> login($email, $password);

		if($ceklogin){

			foreach ($ceklogin as $row);
			$this -> session -> set_userdata('id', $row -> id);
			$this -> session -> set_userdata('nama', $row -> nama);
			$this -> session -> set_userdata('email', $row -> email);
			$this -> session -> set_userdata('is_admin', $row -> is_admin);

			redirect('dashboard');
					
		}else{

			$this -> session -> set_flashdata('pesan','
								<div class="alert alert-danger alert-dismissible">
								<i class="icon fa fa-warning"></i>
								Username / Password tidak sesuai
								</div>
							');
			redirect(base_url());

		}
    }//end login
    

    function logout(){
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id');
		
		redirect(base_url());

	} //end function logout
    

} //end class
