<?php
	/**
	* 
	*/
	class User_Models extends CI_Model
	{
		function login($username,$password){
			$table = "user";
			$where = array('user_username' => $username, 'user_password' => md5($password));
			return $this->db->get_where($table,$where);
		}

		function selectUsername($username,$password){
			$table = "user";
			$where = array('user_username' => $username, 'user_password' => md5($password));
			$this->db->select('user_username')->from($table)->where($where);
			$query = $this->db->get();
			if ($query->num_rows()>0) {
				return $query->row()->user_username;
			}return "No Admin Detected";
		}

		function add($username,$email,$password){
			$table = "user";
			$data = array('user_username' => $username ,
							'user_email' => $email,
							'user_password'=> $password
							);
			return $this->db->insert($table,$data);
		}

		function addPrefSeller($noktp,$fotodirifilename,$fotoktpfilename,$userid){
			$table = "sellerprefer";
			$data = array('seller_nomorktp' => $noktp ,
							'seller_fotoktp' => $fotoktpfilename,
							'seller_fotodiri'=> $fotodirifilename,
							'user_id' => $userid
							);
			return $this->db->insert($table,$data);
		}

		function searchSeller($userid){
			$table = "sellerprefer";
			$where = array('user_id' => $userid);
			return $this->db->get_where($table,$where);
		}
	}
?>