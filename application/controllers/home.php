<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('setting_model');
                $this->load->model('work_model');
                $this->load->model('portfolio_model');                                
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['settingInfo'] = $this->setting_model->getSettingInfo(); 
                $data['work'] = $this->work_model->get_work();
                $data['portfolio'] = $this->portfolio_model->get_portfolio();                                 
                $data['title'] = 'Home';
                $this->load->view('site/site_home', $data);
        }
}