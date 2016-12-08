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
}