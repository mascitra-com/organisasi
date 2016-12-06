<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/agenda/index';
        $this->load->model('agenda_model');
    }

    public function index()
    {
        $this->_view['title'] = 'Agenda';
        $this->_view['page'] = 'agenda/index';
        $this->_data['agendas'] = $this->agenda_model->get_all();
        $this->init();
    }

    public function create()
    {
        $this->_view['title'] = 'Tambah Agenda';
        $this->_view['page'] = 'agenda/create';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        if ($this->agenda_model->insert($data)) {
            $this->message('<strong>Berhasil</strong> menyimpan Data Agenda', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menyimpan Data Agenda', 'danger');
        }
        redirect('agenda');
    }

    public function show($id = 1)
    {
        $this->_data['agenda'] = $this->agenda_model->get(array('id' => $id));
        $this->_view['title'] = 'Detail Agenda';
        $this->_view['page'] = 'agenda/detail';
        $this->init();
    }

    public function edit($id = 1)
    {
        $this->_data['agenda'] = $this->agenda_model->get(array('id' => $id));
        $this->_view['title'] = 'Edit Agenda';
        $this->_view['page'] = 'agenda/edit';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post();
        $update_id = $update_data['id'];
        unset($update_data['id']);
        if ($this->agenda_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Data Agenda', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Data Agenda', 'danger');
        }
        redirect('agenda');
    }

    public function destroy($id)
    {
        if($this->agenda_model->delete(array($id))){
            $this->message('<strong>Berhasil</strong> menghapus Data Agenda', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Data Agenda', 'danger');
        }
        redirect('agenda');
    }
}
