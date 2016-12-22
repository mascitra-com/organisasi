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
	}

	public function _remap($method, $param = array()) {
		if (method_exists($this, $method)) {
			if ($this->ion_auth->logged_in() || $this->_accessable) {
				return call_user_func_array(array($this, $method), $param);
			} else {
				$this->go('auth');
			}
		} else {
			$this->go('auth');
		}
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
     * Will return FALSE if contains NULL
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
}