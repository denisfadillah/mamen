<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Setting extends BaseController {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('setting_model');                
                $this->isLoggedIn();   
        }

        public function index()
        {
                $data['settingInfo'] = $this->setting_model->getSettingInfo();      
                $this->global['pageTitle'] = 'CodeInsect : Setting Content';
                $this->loadViews("admin/siteSetting", $this->global, $data, NULL);
        }

        /**
        * This function is used to edit the user information
        */
        function editSetting()
        {
                if($this->isAdmin() == TRUE)
                {
                    //$this->loadThis();
                }
                else
                {
                    $this->load->library('form_validation');
                    
                    //$id = $this->input->post('id');
                    
                    $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
                    $this->form_validation->set_rules('tagline','Tagline','trim|required');
                    $this->form_validation->set_rules('aboutTagline','About Tagline','trim|required');
                    $this->form_validation->set_rules('aboutContent','About Content','trim|required');            

                    if($this->form_validation->run() == FALSE)
                    {
                        $this->index();
                    }
                    else
                    {
                        $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                        $tagline = $this->input->post('tagline');
                        $aboutTagline = $this->input->post('aboutTagline');
                        $aboutContent = $this->security->xss_clean($this->input->post('aboutContent'));

                        $slug = url_title($title, 'dash', TRUE);
                        
                        $settingInfo = array();
                                
                        $settingInfo = array('project_title'=>$title, 'project_tagline'=>$tagline, 'about_tagline'=>$aboutTagline,
                                'about_content'=>$aboutContent);
                                                                                
                        $result = $this->setting_model->editSetting($settingInfo, 0);
                        
                        if($result == true)
                        {
                            $this->session->set_flashdata('success', 'Post updated successfully');
                        }
                        else
                        {
                            $this->session->set_flashdata('error', 'Post updation failed');
                        }
                        
                        redirect('setting');
                    }
                }
        }
}