<?php
Class Contacts_modal extends CI_Model
{
	/*
	 * gets the list of all the contacts wanted
	 * RETURNS: ARRAY OF contacts
	 * 
	 * Parameters: 	
	 * $lim (optional) = limit for the contacts to return. Defaults to 10
	 * $off (optional) = the offset for the results that are returned
	 * 
	 *
	 */
	function get_contacts($lim = NULL, $off = NULL){
		if (!isset($lim)) {
	    $lim = 10;
		}
		if (!isset($off)) {
		    $off = 0;
		}
		
		$this -> db -> select('Contact_ID, Company_ID,First_Name, Last_Name, Phone, Job_Title, Contact_Date');
		$this -> db -> from('Contact');
		//~ $this -> db -> where('Location_ID', $location_id);
		$this -> db -> limit($lim, $off);
		
		$query = $this -> db -> get();
	
		
		
		  if($query -> num_rows() > 0){
			$results["data"] = $query->result();
			$results["num_rows"] = $query -> num_rows();
			return $results;
		   }
		   else
		   {
		     return false;
		   }
		
	}
	
	
	/*
	 * gets the list of all the contacts wanted
	 * RETURNS: ARRAY OF contacts
	 * 
	 * Parameters: 	
	 * $lim (optional) = limit for the contacts to return. Defaults to 10
	 * $off (optional) = the offset for the results that are returned
	 * 
	 *
	 */
	function search_contacts($lim = NULL, $off = NULL, $q = NULL){
		if (!isset($lim)) {
	    $lim = 10;
		}
		if (!isset($off)) {
		    $off = 0;
		}
		if (!isset($q)) {
		    $q = "";
		}
		$match = $q;
		
		$this -> db -> select('Contact_ID, Company_ID,First_Name, Last_Name, Phone, Job_Title, Contact_Date');
		$this -> db -> from('Contact');
		//~ $this -> db -> where('Location_ID', $location_id);
		$this->db->like('First_Name', $match);
		$this->db->or_like('Last_Name', $match); 
		$this->db->or_like('Phone', $match); 
		$this->db->or_like('Job_Title', $match); 
		$this -> db -> limit($lim, $off);
		
		
		$query = $this -> db -> get();
	
		
		
		  if($query -> num_rows() > 0){
			$results["data"] = $query->result();
			$results["num_rows"] = $query -> num_rows();
			return $results;
		   }
		   else
		   {
		     return false;
		   }
		
	}
	
	
	
	
	
	

 

 
 
}
?>
