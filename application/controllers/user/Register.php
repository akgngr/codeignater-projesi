<?php

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('User_model');
    }

    public function index()
    {
        if (isset($this->session)){
            redirect('/');
        }else{
            $this->load->view('user/register_form');
        }

    }

    public function save()
    {
        $fullName   = $this->input->post('fullName');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $re_password= $this->input->post('re_password');

        $this->form_validation->set_rules('fullName','Adınız Soyadınız','required|trim');
        $this->form_validation->set_rules('email','E-posta ','required|trim|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password','Şifre','required|trim|min_length[6]');
        $this->form_validation->set_rules('re_password','Şifre tekrarı','required|trim|min_length[6]|matches[password]');

        $error_messages = array(
            'required'      => 'Lütfen %s alanını doldurunuz!',
            'is_unique'     => '%s emailine ait hali hazırda bir hesap bulunmaktadır!',
            'valid_email'   => 'Lütfen geçerli bir email adresi giriniz!',
            'min_length'    => 'Lütfen %s alanını en az 6 karakter giriniz!',
            'matches'       => 'Girmiş olduğunuz şifreler bir birleriyle uyuşmuyor!'

        );
        $this->form_validation->set_message($error_messages);


        if ($this->form_validation->run()){
            $activeCode = md5(crypt(uniqid(), uniqid()));
            $data = array(
                'fullName'      => $fullName,
                'email'         => $email,
                'password'      => crypt($password, uniqid()),
                'createdAt'     => date("Y:m:d H:i:s"),
                'activeCode'    => $activeCode
            );



            $insert = $this->User_model->insert($data);

            if ($insert){

                $config['protocol']     = 'smtp';
                $config['smtp_host']    = 'ssl://smtp.yandex.com.tr';
                $config['smtp_port']    = 465;
                $config['starttls']     = true;
                $config['mailtype']     = 'html';
                $config['smtp_user']    = 'akgngr@yandex.com';
                $config['smtp_pass']    = '19825985782';
                $config['charset']      = 'utf-8';
                $config['wordwrap']     = TRUE;
                $config['newline']      = '\r\n';

                $this->email->initialize($config);

                $link = base_url('user/register/activation/'.$activeCode);

                $this->email->from('akgngr@yandex.com', 'Abdulkadir GÜNGÖR');
                $this->email->to($email);

                $this->email->subject('Üyelik Aktivasyonu');
                $this->email->message('
                    Merhaba sayın '.$fullName.' üyeliğiniz başarılı bir şekilde oluşturuldu. </br>Şimdi sadece üyeliğinizi
                    aktive etmeniz gerekli. Lütfen buraya <a href="'.$link.'">tıklayarak</a>  üyeliğinizi aktive ediniz. 
                    </br>
                    İyi günler..
                    </br>
                    </br>
                    Not: Bu maili siz istemediyseniz silebilirsiniz.
                    ');

                $this->email->send();

                if ($this->email->send(FALSE)){
                    echo 'Bir hata ile karşılaşıldı..!';
                }else
                {
                    $viewData['messages'] = 'Kayıt başarılı bir şekilde oluşturuldu. Lütfen <strong class="red-text">'.$email.'</strong> adresinize gelen linke tıklayın ve hesabınızı aktifleştiriniz..!';
                    $this->load->view('messages/thanks', $viewData);
                }

            } else{
                $viewData['messages'] = 'Kayıt esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
                $this->load->view('messages/error', $viewData);
            }

        }else{
            $viewData['class'] = "invalid";
            $viewData['error'] = validation_errors();

            $this->load->view('user/register_form', $viewData);
        }

    }

    public function activation($code)
    {

        $where = array(
            'activeCode' => $code
        );

        $user = $this->User_model->get($where);

        if (isset($user)){

            $data = array(
                'isActive'      => 1,
                'activeCode'    => ''
            );


            $update = $this->User_model->update($where, $data);
            if ($update){
                $viewData['messages'] = 'Aktivasyon işlemi başarılı. Şimdi giriş yapabilirsiniz..';
                $this->load->view('messages/thanks', $viewData);
            }else{
                $viewData['messages'] = 'Aktivasyon işlemi başarısız. Lütfen sonra tekrar deneyin..';
                $this->load->view('messages/error', $viewData);
            }
        }else{

            $viewData['messages'] = 'Daha önce bu hesap aktive edilmiştir. Lütfen giriş yapınız..';
            $this->load->view('messages/error', $viewData);
        }
    }
}
