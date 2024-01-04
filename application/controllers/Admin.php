<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum login!
              </div>');
            redirect('auth');
        }
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function kolam()
    {
        $data['judul'] = 'Kolam';
        $data['kolam'] = $this->Admin_model->getAllKolam();
        $data['jenis_ikan'] = $this->Admin_model->getAllIkan();
        $data['jenis_pakan'] = $this->Admin_model->getDataPakan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/kolam/kolam', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKolam()
    {

        $this->form_validation->set_rules('nama_kolam', 'Nama Kolam', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Kolam', 'required');
        $this->form_validation->set_rules('jumlah_ikan', 'Jumlah Ikan', 'required|numeric');
        $this->form_validation->set_rules('masa_panen', 'Masa Panen', 'required|numeric');
        $this->form_validation->set_rules('jml_pakan_hari', 'Jumlah Pakan/hari', 'required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Kolam Gagal Ditambahkan!
              </div>');
              redirect('admin/kolam');
        } else
        {
            $this->Admin_model->tambahKolam();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kolam Berhasil Ditambahkan!
              </div>');
            redirect('admin/kolam');
        }
    }

    public function getKolamById()
    {
        echo json_encode($this->Admin_model->getKolamById($_POST['id'])); 
    }

    public function editKolam($id)
    {
        $this->form_validation->set_rules('masa_panen', 'Masa Panen', 'required');
        $this->form_validation->set_rules('jumlah_pakan_hari', 'Jumlah Pakan/hari', 'required');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Kolam Gagal Diedit!
              </div>');
              redirect('admin/kolam');
        } else
        {

            $this->Admin_model->editKolam($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kolam Berhasil Diedit!
              </div>');
            redirect('admin/detailKolam/'.$id);
        }
    }

    public function detailKolam($id)
    {
        $query = $this->db->get_where('kolam', ['id' => $id])->row_array();
        $tggl_tebar = $query['tanggal_tebar'];
        $hari_ini = time();
        $umurm = $hari_ini - $tggl_tebar;
        $umur = $umurm / (60*60*24);
        $data['judul'] = 'Detail Kolam';
        $data['kolam'] = $this->Admin_model->getKolamById($id);
        $data['jenis_pakan'] = $this->Admin_model->getDataPakan();
        $data['jenis_ikan'] = $this->Admin_model->getAllIkan();
        $data['umur'] = round($umur);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/kolam/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ikan()
    {
        $data['judul'] = 'Data Ikan';
        // $data['kolam'] = $this->Admin_model->getAllKolam();
        $data['ikan'] = $this->Admin_model->getAllIkan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/ikan/ikan', $data);
        $this->load->view('templates/footer');
    }

    public function detailIkan($i)
    {
        $data['judul'] = 'Detail ikan';
        $data['ikan'] = $this->Admin_model->getDataIkan($i);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/ikan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function pakan()
    {
        $data['judul'] = 'Data Pakan';
        $data['pakan'] = $this->Admin_model->getDataPakan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/pakan/pakan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahPakan()
    {
        $this->form_validation->set_rules('jenis_pakan', 'Jenis Pakan', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Pakan Gagal Ditambahkan!
              </div>');
              redirect('admin/pakan');
        } else
        {
            $this->Admin_model->tambahPakan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pakan Berhasil Ditambahkan!
              </div>');
            redirect('admin/pakan');
        }
    }

    public function getPakanById()
    {
        echo json_encode($this->Admin_model->getPakanById($_POST['id']));
    }

    public function editPakan()
    {
        $this->form_validation->set_rules('jenis_pakan', 'Jenis Pakan', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Pakan Gagal Diedit!
              </div>');
              redirect('admin/pakan');
        } else
        {
            $this->Admin_model->editPakan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pakan Berhasil Diedit!
              </div>');
            redirect('admin/pakan');
        }
    }

    public function hapusPakan($id)
    {
        $this->Admin_model->hapusPakan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pakan Berhasil Dihapus!
              </div>');
            redirect('admin/pakan');
    }

    public function ikanMati()
    {
        $data['judul'] = 'Data Ikan Mati';
        $data['kolam'] = $this->Admin_model->getAllKolam();
        $data['jenis_ikan'] = $this->Admin_model->getAllIkan();
        $data['ikan_mati'] = $this->Admin_model->getDataIkanMati();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/ikan/ikan_mati', $data);
        $this->load->view('templates/footer');
    }

    public function tambahIkanMati()
    {
        $this->form_validation->set_rules('nama_kolam', 'Nama Kolam', 'required');
        $this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
        $this->form_validation->set_rules('jumlah_ikan_mati', 'Jumlah Ikan Mati', 'required');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Ikan Mati Gagal Ditambahkan!
              </div>');
              redirect('admin/ikanMati');
        } else
        {
            $this->Admin_model->tambahIkanMati();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Ikan Mati Berhasil Ditambahkan!
              </div>');
            redirect('admin/ikanMati');
        }
    }

    public function panen()
    {
        $data['judul'] = 'Data Panen';
        $data['panen'] = $this->Admin_model->getDataPanen();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/kolam/panen', $data);
        $this->load->view('templates/footer');
    }

    public function beriMakan($jenis_pakan, $jml_pakan_hari, $id)
    {
        $this->Admin_model->beriMakan($jenis_pakan, $jml_pakan_hari, $id);
    }

    public function kolamPanen($id)
    {
        $this->Admin_model->kolamPanen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kolam Berhasil Dipanen!
          </div>');
        redirect('admin/panen');
    }

    public function tebarIkan($id)
    {
        $this->Admin_model->tebarIkan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kolam Berhasil Dipanen!
          </div>');
        redirect('admin/detailKolam/'.$id);
    }

}