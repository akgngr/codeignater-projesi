<?php
/**
 * Created by PhpStorm.
 * User: akgngr
 * Date: 2019-08-18
 * Time: 15:11
 */

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!$user){
            redirect(base_url('user/login'));
        }
        $this->load->model('post_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $viewData['posts'] = $this->post_model->all();

        $this->load->view('backend/layout/header');
        $this->load->view('backend/post/all_post_read', $viewData);
        $this->load->view('backend/layout/footer');

    }

    public function get()
    {

    }

    public function ekle(){
        $this->load->view('backend/layout/header');
        $this->load->view('backend/post/create');
        $this->load->view('backend/layout/footer');
    }

    public function create()
    {
        $data = array(
                    'title'          => $this->input->post('title'),
                    'slug'           => url_title(convert_accented_characters($this->input->post('slug'))),
                    'description'    => $this->input->post('description'),
                    'body'           => $this->input->post('body'),
                    'fronted_on'     => $this->input->post('fronted_on'),
                    'comment_on'     => $this->input->post('comment_on'),
                    'createdAt'      => date('Y-m-d h-i-s'),
        );

        if (empty($data['slug'])){
            $data['slug'] = url_title(convert_accented_characters($data['title']));
        }else{
            //echo $data['slug'];
        }

        $config = array(
            array(
                'field' => 'title',
                'label' => 'Başlık',
                'rules' => 'required|trim|min_length[3]|max_length[250]',
            ),
            array(
                'field' => 'slug',
                'label' => 'Slug (Url yolu)',
                'rules' => 'trim|min_length[3]|max_length[250]|is_unique[posts.slug]'
            ),
            array(
                'field' => 'description',
                'label' => 'Özet',
                'rules' => 'required|trim|min_length[3]|max_length[500]'
            ),
            array(
                'field' => 'body',
                'label' => 'Gövde',
                'rules' => 'required|trim|min_length[3]'
            ),
            array(
                'field' => 'fronted_on',
                'label' => 'Anasayfda gösterilsin mi?',
                'rules' => 'required|trim|in_list[0,1]|numeric',
            ),
            array(
                'field' => 'comment_on',
                'label' => 'Yorumlar açılsın mı?',
                'rules' => 'required|trim|in_list[0,1]|numeric',
            ),
        );

        $this->form_validation->set_rules($config);

        $error_messages = array(
            'required'      => 'Lütfen %s alanını doldurunuz!',
            'is_unique'     => 'Bu %s url ait hali hazırda bir slug bulunmaktadır!',
            'max_length'    => '%s alanına en fazla 250 karakter uzunluğunda bir içerik girmelisiniz!',
            'min_length'    => 'Lütfen %s alanını en az 3 karakter uzunluğunda bir içerik girmelisiniz!',
            'in_list'       => '%s alanına lütfen 0 yada 1 seçeneklerini seçiniz!',
            'numeric'       => '%s alanına sadece numara giriniz!'

        );
        $this->form_validation->set_message($error_messages);

        if ($this->form_validation->run()){
            $insert = $this->post_model->insert($data);

            if ($insert){
                $viewData['posts'] = $this->post_model->all();
                $viewData['message'] = 'Kayıt başarılı bir şekilde eklendi..';

                $this->load->view('backend/layout/header');
                $this->load->view('backend/post/all_post_read', $viewData);
                $this->load->view('backend/layout/footer');
            }else{
                echo 'kayıt başarısız.';
            }
        }else{
            echo 'Başarısız';
            print_r(validation_errors());
        }


    }

    public function update_form($id)
    {
        $viewData['post'] = $this->post_model->get( array('id' => $id));

        $this->load->view('backend/layout/header');
        $this->load->view('backend/post/update', $viewData);
        $this->load->view('backend/layout/footer');
    }

    public function update()
    {

    }

    public function delete()
    {
        $id = $this->input->post('id');
        //echo $id;die;

        $where = array('id' => $id);
        $delete = $this->post_model->delete($where);

        if ($delete){

            $viewData['message'] = 'Kayıt başarılı bir şekilde silindi.';
            $this->load->view('backend/messages/success', $viewData);

        } else{
            $viewData['message'] = 'Kaydı silme esnasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz!';
            $this->load->view('backend/messages/error', $viewData);
        }
    }
}
