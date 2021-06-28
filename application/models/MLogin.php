<?php

class MLogin extends CI_Model {

	//proses validasi login
	function login($email, $password){

		$this -> db -> select('*');
		$this -> db -> from('cfs_useradmin');
		$this -> db -> where('email', $email);
		$this -> db -> where('password', md5($password));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

			if($query -> num_rows()>0){

				return $query -> result();
			}else{
				return false;
			}

    } //end function login
    
} //end class