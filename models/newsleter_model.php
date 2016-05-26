<?php

class Newsleter_model extends CI_Model
{
	public function subscribe( $name, $email )
	{
		$this->db->select('*')->from('subscribers')->where('email', $email);
		$selectQuery = $this->db->get();
		
		if(isset($_REQUEST['debug']))
			echo "<pre>\$selectQuery: ".print_r($selectQuery, true)."</pre>";
			
		if($selectQuery != FALSE && $selectQuery->num_rows() == 0)
		{
			$key = md5($email.time());
			$query = $this->db->insert('subscribers', array('name'=>$name,'email'=>$email,'key'=>$key));
			
			if(isset($_REQUEST['debug']))
				echo "<pre>\$query: ".print_r($query, true)."</pre>";
			
			if($query != FALSE) return TRUE;
		}
		
		return FALSE; 
	}
	
	public function get_subscribers()
	{
		$this->db->select('*')->from('subscribers');
		$selectQuery = $this->db->get();
		
		return $selectQuery->result();
	}
}
