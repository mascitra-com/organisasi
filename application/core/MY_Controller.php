<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	# Inisialisasi atribut
	protected $_data; # atribut data
	protected $_view; # atribut view
	protected $_accessable; # atribut view

	public function __construct() {
		parent::__construct();

		# Set atribut _data
		$this->_data = array();
		$this->load->model('news_model');
		$this->_data['news_total'] = $this->news_model->where('type','active')->where('type','=','unactive',TRUE)->as_array()->count_rows();
        $this->_data['draft_total'] = $this->news_model->where('type','draft')->as_array()->count_rows();
        $this->_data['archive_total'] = $this->news_model->where('type','archive')->as_array()->count_rows();
    }

    public function _remap($method, $param = array()) {
      if (method_exists($this, $method)) {
         if ($this->ion_auth->logged_in() || $this->_accessable) {
            if ($this->check_privileges(get_class($this), $method)) {
                return call_user_func_array(array($this, $method), $param);
            }else{
                show_404();
            }
        } else {
            $this->go('auth');
        }
    } else {
        $this->go('auth');
    }
}

protected function check_privileges($class, $method){
    
    $privileges = $this->ion_auth->get_privileges();
    foreach ($privileges as $privilege) {
        if (strtolower($class.'/'.$method) == strtolower($privilege)) {
            return TRUE;
        }
    }
    return TRUE;
}
	/**
	 * Berfungsi untuk mengeksekusi view
	 */
	protected function init() {
		$this->_data['_view'] = $this->_view;
		$this->load->view($this->_view['template'], $this->_data);
	}

	/**
	 * Berfungsi untuk menampilkan pesan
	 *
	 * @param string $msg = isi pesan
	 * @param string $typ = tipe pesan (default, primary, success, warning, danger)
	 */
	protected function message($msg = 'pesan', $typ = 'info') {
		$this->session->set_flashdata('message', array($msg, $typ));
	}

	/**
	 * Berfungsi untuk melakukan redirect
	 * @param $link = alamat tujuan
	 */
	protected function go($link) {
		redirect(site_url($link));
	}

    /**
     * @param $table - Table Name
     * @param $title - Field as reference for slug
     */
    protected function slug_config($table, $title){
        $config = array(
            'table' => $table,
            'id' => 'id',
            'field' => 'slug',
            'title' => $title,
            'replacement' => 'dash' // Either dash or underscore
            );
        $this->slug->set_config($config);
    }

    /**
     * This function use if you want to test the variable|array
     * Will redirect to index if return NULL|FALSE
     * @param $var
     */
    protected function might_make_errors($var)
    {
        if ($var === NULL || $var === FALSE) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');

        }
    }

    /**
     * @param bool   $condition - Condition going to be tested
     * @param string $status - Activity caption such as store|update|destroy
     * @param string $type - Name what kind data has been proceed on this function
     */
    protected function is_worked($condition = FALSE, $status = 'membuat', $type = 'Foto')
    {
        if ($condition) {
            $this->message('<strong>Berhasil</strong> '.$status.' '.$type, 'success');
        } else {
            $this->message('<strong>Gagal</strong> '.$status.' '.$type, 'danger');
        }
    }

    /**
     * @param $config
     *
     * @return mixed
     */
    protected function config_for_bootstrap_pagination($config)
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = $this->lang->line('pagination_first_link');
        $config['last_link'] = $this->lang->line('pagination_last_link');
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev_link');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next_link');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }

}