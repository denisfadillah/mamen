<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Blog extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
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
    function blogListing()
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
            
            $count = $this->blog_model->blogListingCount($searchText);

			$returns = $this->paginationCompress ( "blogListing/", $count, 5 );
            
            $data['blogRecords'] = $this->blog_model->blogListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Blog Listing';
            
            $this->loadViews("admin/blogs", $this->global, $data, NULL);
        }
    }



    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    /**
     * This function is used to load the add new form
     */
    function showNewBlog()
    {
		$this->load->model('blog_model');		
		$this->global['pageTitle'] = 'CodeInsect : Add New User';
		$data = [];
		$this->loadViews("admin/addNewBlog", $this->global, $data, NULL);
    }	
    
    /**
     * This function is used to add new user to the system
     */
    function addNewBlog()
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
            $this->form_validation->set_rules('status','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showNewBlog();
            }
            else
            {
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $content = $this->security->xss_clean($this->input->post('content'));
                $tags = $this->input->post('tags');
                $status = $this->input->post('status');

                $slug = url_title($title, 'dash', TRUE);

                $blogInfo = array();
                	
                $blogInfo = array('title'=>$title, 'content'=>$content, 'tags'=>$tags, 'slug' => $slug,
                                    'status'=>$status, 'update_time'=>date('Y-m-d H:i:s'));
									
                $result = $this->blog_model->addNewBlog($blogInfo);

				
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('blogListing');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function showEditBlog($id = NULL)
    {
        $data['blogInfo'] = $this->blog_model->getBlogById($id);            
        $this->global['pageTitle'] = 'CodeInsect : Edit Blog';
		$this->loadViews("admin/editBlog", $this->global, $data, NULL);
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editBlog()
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
            $this->form_validation->set_rules('status','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showEditBlog($id);
            }
            else
            {
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $content = $this->security->xss_clean($this->input->post('content'));
                $tags = $this->input->post('tags');
                $status = $this->input->post('status');

                $slug = url_title($title, 'dash', TRUE);
                
                $blogInfo = array();
                	
                $blogInfo = array('title'=>$title, 'content'=>$content, 'tags'=>$tags, 'slug' => $slug,
                                    'status'=>$status, 'update_time'=>date('Y-m-d H:i:s'));
									
                $result = $this->blog_model->editBlog($blogInfo, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Post updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Post updation failed');
                }
                
                redirect('blogListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBlog()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');            
            $result = $this->blog_model->deleteBlog($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'CodeInsect : Change Password';
        
        $this->loadViews("admin/changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
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

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? $this->session->userdata("userId") : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 5, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : User Login History';
            
            $this->loadViews("admin/loginHistory", $this->global, $data, NULL);
        }        
    }
}

?>