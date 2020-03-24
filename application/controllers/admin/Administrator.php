<?php

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!$user){
            redirect(base_url('user/login'));
        }
    }

    public function index()
    {
        $this->load->view('backend/index');
    }

}
