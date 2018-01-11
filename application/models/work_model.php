<?php
class Work_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_work($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		        		$this->db->order_by("start_work", "DESC");
		                $query = $this->db->get('tbl_work');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('tbl_work', array('slug' => $slug));
		        return $query->row_array();
		}

        public function get_work_per_page($page)
		{
                $query = $this->db->get('tbl_work', 2, $page);
                return $query->result_array();				
		}		

		function workListingCount($searchText = '')
	    {
	        $this->db->select('*');
	        $this->db->from('tbl_work');
	        if(!empty($searchText)) {
	            $likeCriteria = "(tbl_work.title  LIKE '%".$searchText."%'
	                            OR  tbl_work.work_content  LIKE '%".$searchText."%'
	                            OR  tbl_work.tags  LIKE '%".$searchText."%')";
	            $this->db->where($likeCriteria);
	        }
	        $query = $this->db->get();
	        
	        return $query->num_rows();
	    }
	    
	    /**
	     * This function is used to get the user listing count
	     * @param string $searchText : This is optional search text
	     * @param number $page : This is pagination offset
	     * @param number $segment : This is pagination limit
	     * @return array $result : This is result
	     */
	    function workListing($searchText = '', $page, $segment)
	    {
	        $this->db->select('*');
	        $this->db->from('tbl_work');

	        if(!empty($searchText)) {
	            $likeCriteria = "(tbl_work.title  LIKE '%".$searchText."%'
	                            OR  tbl_work.work_content  LIKE '%".$searchText."%'
	                            OR  tbl_work.tags  LIKE '%".$searchText."%')";
	            $this->db->where($likeCriteria);
	        }
	        $this->db->limit($page, $segment);
	        $query = $this->db->get();
	        
	        $result = $query->result();        
	        return $result;
	    }

/**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewWork($workInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_work', $workInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

	/**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getWorkById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_work');
        $this->db->where('id', $id);
        $query = $this->db->get();
       
        return $query->result();
    }

	 /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editWork($workInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_work', $workInfo);
        
        return TRUE;
    }
    
	/**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteWork($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_work');
        return $this->db->affected_rows();
    }
}