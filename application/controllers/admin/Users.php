<?php
/**
 * Created by PhpStorm.
 * User: akgngr
 * Date: 2019-08-15
 * Time: 16:05
 */

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!$user){
            redirect(base_url('user/login'));
        }

        $this->load->model('user_model');
    }

    public function index()
    {


        $viewData['users'] = $this->user_model->all();

        //print_r($viewData);die;
        $this->load->view('backend/users/users', $viewData);
    }

    public function profile()
    {

        $this->load->view('backend/users/profile');
    }

    public function new()
    {
        $this->load->view('backend/users/new_user');
    }

    public function create()
    {
        $fullName   = $this->input->post('fullName');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $re_password= $this->input->post('re_password');
        $isActive   = $this->input->post('isActive');

        $this->form_validation->set_rules('fullName','Ad Soyad','required|trim');
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
            $data = array(
                'fullName'      => $fullName,
                'email'         => $email,
                'password'      => crypt($password, uniqid()),
                'createdAt'     => date("Y:m:d H:i:s"),
                'isActive'    => $isActive
            );



            $insert = $this->user_model->insert($data);

            if ($insert){

                $viewData['message'] = 'Kayıt başarılı bir şekilde oluşturuldu.';
                $this->load->view('backend/messages/success', $viewData);

            } else{
                $viewData['message'] = 'Kayıt esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
                $this->load->view('backend/messages/error', $viewData);
            }

        }else{
            $viewData['class'] = "invalid";
            $viewData['error'] = validation_errors();

            $this->load->view('backend/users/new_user', $viewData);
        }

    }

    public function updateform($id)
    {
        $viewData['user'] = $this->user_model->get(array('id' => $id));

        $this->load->view('backend/users/update_user', $viewData);
    }
    public function update()
    {
        $id             = $this->input->post('id');
        $fullName       = $this->input->post('fullName');
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $re_password    = $this->input->post('re_password');
        $isActive       = $this->input->post('isActive');

        if ($isActive == null){
            $isActive = 0;
        }
        $user = $this->user_model->get(array('id' => $id));
        //print_r($user);
        $viewData['user'] = $user;
        $where = array('id' => $id);


        if (empty($password)){
            $this->form_validation->set_rules('fullName','Ad Soyad','required|trim');
            $this->form_validation->set_rules('email','E-posta ','required|trim');

        if ($email !== $user->email){
            //echo 'email';die();
            $this->form_validation->set_rules('email','E-posta ','required|trim|is_unique[users.email]|valid_email');
            $error_messages['is_unique'] = '%s emailine ait hali hazırda bir hesap bulunmaktadır!';
        }

            $error_messages = array(
                'required'      => 'Lütfen %s alanını doldurunuz!',
                'is_unique'     => '%s emailine ait hali hazırda bir hesap bulunmaktadır!',
                'valid_email'   => 'Lütfen geçerli bir email adresi giriniz!'
            );
            $this->form_validation->set_message($error_messages);

            if ($this->form_validation->run()){
                //echo $id . '<br>' . $fullName . '<br>' . $email . '<br>' . $isActive;
                $data = array(
                    'fullName'      => $fullName,
                    'email'         => $email,
                    'isActive'      => $isActive
                );

                $insert = $this->user_model->update($where, $data);

                if ($insert){

                    $viewData['message'] = 'Kayıt başarılı bir şekilde güncellendi.';
                    $this->load->view('backend/messages/success', $viewData);

                } else{
                    $viewData['message'] = 'Kayıt esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
                    $this->load->view('backend/messages/error', $viewData);
                }

            }else{
                $viewData['class'] = "invalid";
                $viewData['error'] = validation_errors();

                $this->load->view('backend/users/update_user', $viewData);
            }

        }else{

            $fullName   = $this->input->post('fullName');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $re_password= $this->input->post('re_password');
            $isActive   = $this->input->post('isActive');

            if ($isActive == null){
                $isActive = 0;
            }

            $this->form_validation->set_rules('fullName','Ad Soyad','required|trim');
            $this->form_validation->set_rules('email','E-posta ','required|trim|valid_email');
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
                $data = array(
                    'fullName'      => $fullName,
                    'email'         => $email,
                    'password'      => crypt($password, uniqid()),
                    'createdAt'     => date("Y:m:d H:i:s"),
                    'isActive'    => $isActive
                );



                $insert = $this->user_model->update($where, $data);

                if ($insert){

                    $viewData['message'] = 'Kayıt başarılı bir şekilde güncellendi.';
                    $this->load->view('backend/messages/success', $viewData);

                } else{
                    $viewData['message'] = 'Güncelleme esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
                    $this->load->view('backend/messages/error', $viewData);
                }

            }else{
                $viewData['class'] = "invalid";
                $viewData['error'] = validation_errors();

                $this->load->view('backend/users/new_user', $viewData);
            }

        }

    }

    public function delete()
    {
        $id = $this->input->post('id');
        //echo $id;die;

        $where = array('id' => $id);
        $delete = $this->user_model->delete($where);

        if ($delete){

            $viewData['message'] = 'Kayıt başarılı bir şekilde silindi.';
            $this->load->view('backend/messages/success', $viewData);

        } else{
            $viewData['message'] = 'Kaydı silme esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
            $this->load->view('backend/messages/error', $viewData);
        }
    }
}
