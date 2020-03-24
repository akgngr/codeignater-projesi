<?php


class Login extends CI_Controller{

    public function index()
    {
        if ($this->session->userdata('user')){
            redirect('admin');
        }else{
            $this->load->view('user/login');
        }

    }

    public function actions()
    {
        $this->load->model('User_model');


        $password   = $this->input->post('password');
        $email      = $this->input->post('email');

        $this->form_validation->set_rules('email','E-posta ','required|trim|valid_email');
        $this->form_validation->set_rules('password','Şifre','required|trim|min_length[6]');

        $error_messages = array(
            'required'      => 'Lütfen %s alanını doldurunuz!',
            'valid_email'   => 'Lütfen geçerli bir email adresi giriniz!',
            'min_length'    => 'Lütfen %s alanını en az 6 karakter giriniz!'

        );

        $this->form_validation->set_message($error_messages);

        if ($this->form_validation->run()){

            $data = array(
                'email'         => $email,
                'password'      => crypt($password, uniqid())
            );


            //print_r($where);die();
            $get = $this->User_model->get($data);


            if ($get == FALSE){
                $viewData['error'] = 'Şifre veya Eposta adresi yanlış. Lütfen tekrar deneyin..!';
                $this->load->view('user/login', $viewData);

            }else{
                if($get->isActive == 0)
                {
                    $viewData['error'] = 'Üyeliğiniz aktifleştirilmemiştir.';
                    $this->load->view('user/login', $viewData);
                }else{
                    $this->session->set_userdata('user', $get);
                    redirect(base_url('admin'));
                }
            }


        }else{
            $viewData['class'] = "invalid";

            $this->load->view('user/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url('welcome'));
    }
}


?>
