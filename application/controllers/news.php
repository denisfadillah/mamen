<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index($page = NULL)
        {
                $data['news'] = $this->news_model->get_news_per_page(($page - 1) * 2);
                $data['title'] = 'News archive';

                $this->load->library('pagination');
                $config['total_rows'] = 4;
                $config['per_page'] = 2;
                $config['display_pages'] = FALSE;
                $config['prev_link'] = '<a href="' . base_url()."news/page/".($page-1) . '" class="btn btn--stroke"><i class="im im-arrow-left"></i>Prev</a>';
                $config['next_link'] = '<a href="' . base_url()."news/page/".($page+1) . '" class="btn btn--stroke"><i class="im im-arrow-right"></i>Next</a>';
                $this->pagination->initialize($config);

                $data['pages'] = $this->pagination->create_links();

                $this->load->view('includes/site_header', $data);
                $this->load->view('site/news/index', $data);
                $this->load->view('includes/site_footer');
        }        

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];

                $this->load->view('includes/site_header', $data);
                $this->load->view('site/news/view', $data);
                $this->load->view('includes/site_footer');
        } 

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->news_model->set_news();
                $this->load->view('news/success');
            }
        }               
}