<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends MY_Controller
{

    /**
     * Photos constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['css'] = 'gallery';
        $this->_view['js'] = 'gallery';
        $this->load->model(array('gallery_model', 'category_model'));
        $this->slug_config($this->category_model->table, 'name');
    }

    public function index($search_status = FALSE) {
        if($search_status === FALSE){
            $this->session->unset_userdata('search_gallery');
        }
        $this->input_get_for_pagination(10);
        $this->_data['per_page_name'] = 'Galeri';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page();
        $this->_view['title'] = 'Galeri Foto';
        $this->_view['page'] = 'gallery/photos/index';
        $this->init();
    }

    public function search()
    {
        $this->session->unset_userdata('search_gallery');
        $this->_data['search'] = $this->input->post() !== NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_gallery', $this->_data['search']);
        $this->index(TRUE);
    }

    /**
     *  Unset Search Data from Session
     */
    public function refresh()
    {
        $this->session->unset_userdata('search_gallery');
        $this->go('photos');
    }

    /**
     * For Pagination Configuration
     */
    private function page()
    {
        $this->_data['search'] = $this->session->userdata('search_gallery');
        $config['base_url'] = site_url('photos/index');
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->category_model->count_data($this->_data['search']);
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config = $this->config_for_bootstrap_pagination($config);
        $this->pagination->initialize($config);

        $this->_data['galleries'] = $this->category_model->fetch_data($config['per_page'], $this->_data['number'], $this->_data['search']);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function create()
    {
        $this->_data['action'] = 'store';
        $this->_view['title'] = 'Tambah Galeri Foto';
        $this->_view['page'] = 'gallery/photos/create';
        $this->init();
    }

    public function add($slug = NULL)
    {
        $this->might_make_errors($slug);
        $this->_view['title'] = 'Tambah Foto';
        $this->_view['page'] = 'gallery/photos/add';
        $this->_data['slug'] = $slug;
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        $data['slug'] = $this->slug->create_uri($data);
        $this->is_worked($this->category_model->insert($data), 'membuat', 'Galeri Foto');
        $this->go('photos');
    }

    public function do_upload($slug = NULL)
    {
        $this->might_make_errors($category_id = $this->category_model->get(array('slug' => $slug))->id);
        if (!empty($_FILES)) {
            $config['file_name'] = $_FILES['file']['name'];
            $config['upload_path'] = './assets/photos/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->message($this->upload->display_errors(), 'danger');
            }
            $file_data = $this->upload->data();
            $link = base_url('assets/photos/' . $file_data['file_name']);
            $data = [
                'name' => $file_data['file_name'],
                'link' => $link,
                'category_id' => $category_id,
                'type_id' => 1
            ];
            $this->gallery_model->insert($data);
        } else {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
    }

    public function show()
    {
        $this->_data['slug'] = $this->input->get('id');
        $this->input_get_for_pagination(8);
        $this->might_make_errors($this->_data['galleries'] = $this->category_model->get(array('slug' => $this->_data['slug'])));
        $this->_data['per_page_name'] = 'Foto';
        $this->_data['per_page_options'] = array(8, 16, 32, 48, 60);
        $this->pages();
        $this->_data['i'] = 4;
        $this->_data['j'] = 7;
        $this->_data['k'] = count($this->_data['photos']);
        $this->_view['title'] = 'Isi Galeri';
        $this->_view['page'] = 'gallery/photos/detail';
        $this->init();
    }

    private function pages()
    {
        $config['base_url'] = site_url('photos/show/'.$this->_data['slug'].'&per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->gallery_model->count_rows(array('category_id' => $this->_data['galleries']->id));
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config = $this->config_for_bootstrap_pagination($config);
        $this->pagination->initialize($config);

        $this->_data['photos'] = $this->gallery_model->fetch_data($config['per_page'], $this->_data['number'], $this->_data['galleries']->id);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function edit($slug = NULL)
    {
        $this->might_make_errors($this->_data['data'] = $this->category_model->get(array('slug' => $slug)));
        $this->_view['title'] = 'Edit Foto';
        $this->_view['page'] = 'gallery/photos/create';
        $this->_data['action'] = 'update';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post(NULL, TRUE);
        // TODO Use slug instead
        $update_id = $update_data['id'];
        $update_data['slug'] = $this->slug->create_uri($update_data, $update_id);
        unset($update_data['id']);
        $this->is_worked($this->category_model->update($update_data, $update_id), 'mengedit', 'Galeri');
        $this->go('photos');
    }

    /**
     * @param $slug
     */
    public function destroy($slug = NULL)
    {
        $this->might_make_errors($slug);
        $status = FALSE;
        if(!$category_id = $this->category_model->get(array('slug' => $slug))->id){
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        if(!$photos = $this->gallery_model->get_all(array('category_id' => $category_id))){
            $status = TRUE;
        }
        $this->load->helper('file');
        foreach ($photos as $photo) {
            $file = str_replace(base_url(), '', $photo->link);
            if (file_exists($file) && unlink($file) && $this->gallery_model->delete($photo->id)) {
                $status = TRUE;
            }
        }
        $this->is_worked($status && $this->category_model->delete($category_id), 'menghapus', 'Galeri Foto');
        $this->go('photos');
    }

    public function remove_multiple($slug = NULL)
    {
        $this->might_make_errors($slug);
        $status = FALSE;
        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $name) {
                $photo = $this->gallery_model->get(array('name' => $name));
                $file = $photo->link;
                $file_path = str_replace(base_url(), '', $file);
                if (file_exists($file_path) && unlink($file_path) && $this->gallery_model->delete(array('name' => $name))) {
                    $status = TRUE;
                }
            }
        } else {
            $this->message('Anda tidak memilih foto apapun', 'danger');
            $this->go('photos/show/' . $slug);
        }
        $this->is_worked($status, 'menghapus', 'Foto yang Anda Pilih');
        $this->go('photos/show/' . $slug);
    }

    /**
     * Pagination Setting
     * @param $default_per_page - as default number of rows will appear on a page at first time
     */
    private function input_get_for_pagination($default_per_page)
    {
        $this->_data['number'] = $this->input->get('number') !== NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') !== NULL ? $this->input->get('per_page') : $default_per_page;
    }
}
