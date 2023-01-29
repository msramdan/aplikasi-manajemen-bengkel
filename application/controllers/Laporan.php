<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Laporan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $laporan = $this->Laporan_model->get_all();
        $data = array(
            'laporan_data' => $laporan,
        );
        $this->template->load('template','laporan/sale_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Laporan_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'sale_id' => $row->sale_id,
		'invoice' => $row->invoice,
		'customer_id' => $row->customer_id,
		'total' => $row->total,
		'bayar' => $row->bayar,
		'kembalian' => $row->kembalian,
		'note' => $row->note,
		'tanggal' => $row->tanggal,
		'user_id' => $row->user_id,
	    );
            $this->template->load('template','laporan/sale_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan/create_action'),
	    'sale_id' => set_value('sale_id'),
	    'invoice' => set_value('invoice'),
	    'customer_id' => set_value('customer_id'),
	    'total' => set_value('total'),
	    'bayar' => set_value('bayar'),
	    'kembalian' => set_value('kembalian'),
	    'note' => set_value('note'),
	    'tanggal' => set_value('tanggal'),
	    'user_id' => set_value('user_id'),
	);
        $this->template->load('template','laporan/sale_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'invoice' => $this->input->post('invoice',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'total' => $this->input->post('total',TRUE),
		'bayar' => $this->input->post('bayar',TRUE),
		'kembalian' => $this->input->post('kembalian',TRUE),
		'note' => $this->input->post('note',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Laporan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('laporan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan/update_action'),
		'sale_id' => set_value('sale_id', $row->sale_id),
		'invoice' => set_value('invoice', $row->invoice),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'total' => set_value('total', $row->total),
		'bayar' => set_value('bayar', $row->bayar),
		'kembalian' => set_value('kembalian', $row->kembalian),
		'note' => set_value('note', $row->note),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'user_id' => set_value('user_id', $row->user_id),
	    );
            $this->template->load('template','laporan/sale_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sale_id', TRUE));
        } else {
            $data = array(
		'invoice' => $this->input->post('invoice',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'total' => $this->input->post('total',TRUE),
		'bayar' => $this->input->post('bayar',TRUE),
		'kembalian' => $this->input->post('kembalian',TRUE),
		'note' => $this->input->post('note',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Laporan_model->update($this->input->post('sale_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Laporan_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('invoice', 'invoice', 'trim|required');
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('bayar', 'bayar', 'trim|required');
	$this->form_validation->set_rules('kembalian', 'kembalian', 'trim|required');
	$this->form_validation->set_rules('note', 'note', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('sale_id', 'sale_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sale.xls";
        $judul = "sale";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Invoice");
	xlsWriteLabel($tablehead, $kolomhead++, "Customer Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kembalian");
	xlsWriteLabel($tablehead, $kolomhead++, "Note");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Laporan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->invoice);
	    xlsWriteNumber($tablebody, $kolombody++, $data->customer_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bayar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kembalian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->note);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
/* Please DO NOT modify this information : */