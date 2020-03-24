<?php
/**
 * Created by PhpStorm.
 * User: akgngr
 * Date: 2019-08-14
 * Time: 13:37
 */

class Forgot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('User_model');
    }

    public function index()
    {
        $email = $this->input->post('email');

        $this->form_validation->set_rules('email','E-posta ','required|trim|valid_email');

        $error_messages = array(
            'required'      => 'Lütfen %s alanını doldurunuz!',
            'valid_email'   => 'Lütfen geçerli bir email adresi giriniz!'

        );

        $this->form_validation->set_message($error_messages);

        if ($this->form_validation->run()){

            $where = array(
                'email'         => $email
            );

            //print_r($where);die();
            $get = $this->User_model->get($where);



            if ($get){
                $activeCode = md5(crypt(uniqid(), uniqid()));

                $data = array(
                    'activeCode'    => $activeCode,
                    'isActive'      => 0,
                );

                $update = $this->User_model->update($where, $data);

                if ($update){
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

                    $link = base_url('user/forgot/activation/'.$activeCode);

                    $this->email->from('akgngr@yandex.com', 'Abdulkadir GÜNGÖR');
                    $this->email->to($email);

                    $this->email->subject('Şifre Sıfırlaması');
                    $this->email->message('
                    Merhaba sayın '.$get->fullName.'Şifre sıfırlama kodunuz başarılı bir şekilde oluşturuldu. </br>Lütfen şifrenizi
                    sıfırlamak için buraya <a href="'.$link.'">tıklayarak</a>  şifrenizi sıfırlayınız. 
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
                        $viewData['messages'] = 'Şifre sıfırlama kodu başarılı bir şekilde oluşturuldu. Lütfen <strong class="red-text">'.$email.'</strong> adresinize gelen linke tıklayın ve şifrenizi sıfırlayabilirsiniz..!';
                        $this->load->view('messages/thanks', $viewData);
                    }
                }else{

                }
            }else{
                $viewData['messages'] = 'Girmiş olduğunuz e-posta adresi sistemde bulunmamaktadır.';
                $this->load->view('messages/thanks', $viewData);
            }


        }else{
            $viewData['class'] = "invalid";
            $viewData['error'] = validation_errors();

            $this->load->view('user/login', $viewData);
        }
    }

    public function activation($code)
    {
        $where = array(
            'activeCode' => $code
        );

        $user = $this->User_model->get($where);

        if (isset($user)){
            $viewData['id'] = $user->id;
            $this->load->view('user/forgot', $viewData);
        }else{

            $viewData['messages'] = 'Daha önce bu hesap aktive edilmiştir yada bu aktivasyon koduna sahip her hangi bir şifre sıfırlama oluşturulmamıştır.';
            $this->load->view('messages/error', $viewData);
        }
    }

    public function forgot_pas()
    {
        $password       = $this->input->post('password');
        $re_password    = $this->input->post('re_password');
        $id             = $this->input->post('id');

        $this->form_validation->set_rules('password','Şifre','required|trim|min_length[6]');
        $this->form_validation->set_rules('re_password','Şifre tekrarı','required|trim|min_length[6]|matches[password]');

        $error_messages = array(
            'required'      => 'Lütfen %s alanını doldurunuz!',
            'min_length'    => 'Lütfen %s alanını en az 6 karakter giriniz!',
            'matches'       => 'Girmiş olduğunuz şifreler bir birleriyle uyuşmuyor!'

        );
        $this->form_validation->set_message($error_messages);

        if ($this->form_validation->run()){
            $user = $this->User_model->get(array('id' => $id));

            if ($user){

                $update = $this->User_model->update(array('id' => $id), array('password' => crypt($password, uniqid()), 'activeCode' => '', 'isActive' => 1));

                if ($update){
                    $viewData['messages'] = 'Şifre sıfırlama işlemi başarılı bir şekilde yapıldı. Lütfen <a href="'.base_url('user/login').'">giriş yapınız.</a>';
                    $this->load->view('messages/thanks', $viewData);
                }else{
                    $viewData['messages'] = 'Şifre değiştirme işlemi sırasında bir hatayla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.';
                    $this->load->view('messages/error', $viewData);
                }
                //echo $password .'  '. $re_password. '   '. $id;
            }else{
                $viewData['messages'] = 'Böyle bir kullanıcı bulunmamaktadır!';
                $this->load->view('messages/error', $viewData);
            }
        }else{
            $viewData['class'] = "invalid";
            $viewData['error'] = validation_errors();

            $this->load->view('user/register_form', $viewData);
        }


    }
}
