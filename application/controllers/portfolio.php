<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Portfolio extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('portfolio_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function portfolioListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->portfolio_model->portfolioListingCount($searchText);

			$returns = $this->paginationCompress ( "portfolioListing/", $count, 5 );
            
            $data['portfolioRecords'] = $this->portfolio_model->portfolioListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Portfolio Listing';
            
            $this->loadViews("admin/portfolios", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to load the add new form
     */
    function showNewPortfolio()
    {
		$this->global['pageTitle'] = 'CodeInsect : Add New Portfolio';
		$data = [];
		$this->loadViews("admin/addNewPortfolio", $this->global, $data, NULL);
    }	
    
    /**
     * This function is used to add new user to the system
     */
    function addNewPortfolio()
    {
        if($this->isAdmin() == TRUE)
        {
            //$this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('content','Content','trim|required');
            $this->form_validation->set_rules('tags','Tags','trim|required');
            $this->form_validation->set_rules('start','trim|required');
            $this->form_validation->set_rules('start','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->showNewWork();
            }
            else
            {
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $content = $this->security->xss_clean($this->input->post('content'));
                $tags = $this->input->post('tags');
                $start = $this->input->post('start');
                $end = $this->input->post('end');               

                $workInfo = array();
                	
                $workInfo = array('title'=>$title, 'work_content'=>$content, 'tags'=>$tags, 
                    'start_work' => $start, 'end_work'=> $end);
									
                $result = $this->work_model->addNewWork($workInfo);

				
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Work created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Work creation failed');
                }
                
                redirect('workListing');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function showEditWork($id = NULL)
    {
        $data['workInfo'] = $this->work_model->getWorkById($id);            
        $this->global['pageTitle'] = 'CodeInsect : Edit Work';
		$this->loadViews("admin/editWork", $this->global, $data, NULL);
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editWork()
    {
        if($this->isAdmin() == TRUE)
        {
            //$this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $id = $this->input->post('id');
            
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('content','Content','trim|required');
            $this->form_validation->set_rules('tags','Tags','trim|required');
            $this->form_validation->set_rules('start','trim|required');
            $this->form_validation->set_rules('start','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showEditWork($id);
            }
            else
            {
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $content = $this->security->xss_clean($this->input->post('content'));
                $tags = $this->input->post('tags');
                $start = $this->input->post('start');
                $end = $this->input->post('end');               
                
                $workInfo = array();
                	
                $workInfo = array('title'=>$title, 'work_content'=>$content, 'tags'=>$tags, 
                    'start_work' => $start, 'end_work'=> $end);
									
                $result = $this->work_model->editWork($workInfo, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Post updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Post updation failed');
                }
                
                redirect('workListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteWork()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');            
            $result = $this->work_model->deleteWork($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
        

    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>