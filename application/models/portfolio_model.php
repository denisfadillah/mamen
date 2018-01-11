<?php
class Portfolio_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function get_portfolio($slug = FALSE)
		{
            $query = $this->db->get('tbl_portfolio');
            return $query->result_array();
		}

		function portfolioListingCount($searchText = '')
	    {
	        $this->db->select('*');
	        $this->db->from('tbl_portfolio');
	        if(!empty($searchText)) {
	            $likeCriteria = "(tbl_portfolio.title  LIKE '%".$searchText."%'
	                            OR  tbl_portfolio.caption  LIKE '%".$searchText."%'
	                            OR  tbl_portfolio.tags  LIKE '%".$searchText."%')";
	            $this->db->where($likeCriteria);
	        }
	        $query = $this->db->get();
	        
	        return $query->num_rows();
	    }
	    
	    function portfolioListing($searchText = '', $page, $segment)
	    {
	        $this->db->select('*');
	        $this->db->from('tbl_portfolio');

	        if(!empty($searchText)) {
	            $likeCriteria = "(tbl_portfolio.title  LIKE '%".$searchText."%'
	                            OR  tbl_portfolio.caption  LIKE '%".$searchText."%'
	                            OR  tbl_portfolio.tags  LIKE '%".$searchText."%')";
	            $this->db->where($likeCriteria);
	        }
	        $this->db->limit($page, $segment);
	        $query = $this->db->get();
	        
	        $result = $query->result();        
	        return $result;
	    }		
}