<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('tbl_post');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('tbl_post', array('slug' => $slug));
		        return $query->row_array();
		}

        public function get_news_per_page($page)
		{
                $query = $this->db->get('tbl_post', 2, $page);
                return $query->result_array();				
		}		

		public function set_news()
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'text' => $this->input->post('text')
		    );

		    return $this->db->insert('tbl_post', $data);
		}		
}