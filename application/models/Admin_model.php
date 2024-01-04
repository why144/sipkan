<?php 
class Admin_model extends CI_Model{

    public function getAllKolam()
    {
        return $this->db->get('kolam')->result_array();
    }

    public function getKolamById($id)
    {
        return $this->db->get_where('kolam', ['id' => $id])->row_array();
    }

    public function getAllIkan()
    {
        return $this->db->get('ikan')->result_array();
    }

    public function tambahKolam()
    {   $masa_panen = $this->input->post('masa_panen');
        $tanggal_tebar = time();
        $estimasi_panen = $tanggal_tebar + (60*60*24*$masa_panen);
        $data = [
            'nama_kolam' => $this->input->post('nama_kolam'),
            'tipe' => $this->input->post('tipe'),
            'jenis_ikan' => $this->input->post('jenis_ikan'),
            'jumlah_ikan' => $this->input->post('jumlah_ikan'),
            'jenis_pakan' => $this->input->post('jenis_pakan'),
            'jml_pakan_hari' => $this->input->post('jml_pakan_hari'),
            'tanggal_tebar' => $tanggal_tebar,
            'masa_panen' => $masa_panen,
            'estimasi_panen' => $estimasi_panen
        ];

        $this->db->insert('kolam', $data);
    }

    public function editKolam($id)
    {
        $data = [
            'jenis_pakan' => $this->input->post('jenis_pakan'),
            'jml_pakan_hari' => $this->input->post('jumlah_pakan_hari'),
            'masa_panen' => $this->input->post('masa_panen')
        ];

        $this->db->where('id', $id);
        $this->db->update('kolam', $data);
    }

    public function getDataIkan($i)
    {
        return $this->db->get_where('kolam', ['jenis_ikan' => $i])->result_array();
    }

    public function getDataPakan()
    {
        return $this->db->get('pakan')->result_array();
    }

    public function tambahPakan()
    {
        $data = [
            'jenis_pakan' => $this->input->post('jenis_pakan'),
            'stock' => $this->input->post('stock')
        ];

        $this->db->insert('pakan', $data);
    }

    public function getPakanById($id)
    {
        return $this->db->get_where('pakan', ['id' => $id])->row_array();
    }

    public function editPakan()
    {
        $data = [
            'jenis_pakan' => $this->input->post('jenis_pakan'),
            'stock' => $this->input->post('stock')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pakan', $data);
    }

    public function hapusPakan($id)
    {
        $this->db->delete('pakan', ['id' => $id]);
    }

    public function getDataIkanMati()
    {
        return $this->db->get('ikan_mati')->result_array();
    }

    public function tambahIkanMati()
    {
        $nama_kolam = $this->input->post('nama_kolam');
        // $this->db->select('jenis_ikan');
        $query = $this->db->get_where('kolam', ['nama_kolam' => $nama_kolam])->result_array();
        foreach($query as $q ){
           $jenis_ikan_mati =  $q['jenis_ikan'];
           $jumlah_ikan = $q['jumlah_ikan'];
        }


        $data = [
            'nama_kolam' => $nama_kolam,
            'jenis_ikan' => $jenis_ikan_mati,
            'penyebab' => $this->input->post('penyebab'),
            'jumlah_ikan_mati' => $this->input->post('jumlah_ikan_mati'),
            'tanggal' => $this->input->post('tanggal')
        ];

        $this->db->insert('ikan_mati', $data);

        $jumlah_ikan_mati = $this->input->post('jumlah_ikan_mati');

        $jumlah_ikan_upd = $jumlah_ikan - $jumlah_ikan_mati;

        $edit = [
            'jumlah_ikan' => $jumlah_ikan_upd,
            'jumlah_ikan_mati' => $jumlah_ikan_mati
        ];

        $this->db->where('nama_kolam', $nama_kolam);
        $this->db->update('kolam', $edit);
         
    }

    public function getDataPanen()
    {
        return $this->db->get('panen')->result_array();
    }

    public function beriMakan($jenis_pakan, $jml_pakan_hari, $id)
    {
        $query = $this->db->get_where('pakan', ['jenis_pakan' => $jenis_pakan])->row_array();
      
        $stock = $query['stock'];

        if($stock < $jml_pakan_hari) 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Stock pakan tidak cukup!
          </div>');
        redirect('admin/detailKolam/'.$id);
        } else 
        {
            $data = [
            'stock' => $stock - $jml_pakan_hari
            ];

          $this->db->where('jenis_pakan', $jenis_pakan);
          $this->db->update('pakan', $data);

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kolam Berhasil Diberi Makan
          </div>');
             redirect('admin/detailKolam/'.$id);
        }
        
        
    }

    public function kolamPanen($id)
    {
        $query = $this->db->get_where('kolam', ['id' => $id])->row_array();

        $nama_kolam = $query['nama_kolam'];
        $jenis_ikan = $query['jenis_ikan'];
        $jumlah_ikan = $query['jumlah_ikan'];
        $jumlah_ikan_mati = $query['jumlah_ikan_mati'];
        $tanggal = time();

        $data = [
            'nama_kolam' => $nama_kolam,
            'jenis_ikan' => $jenis_ikan,
            'jumlah_ikan' => $jumlah_ikan,
            'jumlah_ikan_mati' => $jumlah_ikan_mati,
            'tanggal' => $tanggal
        ];

        $this->db->insert('panen', $data);

        $update = [
            'jenis_ikan' => '',
            'jumlah_ikan' => '',
            'jenis_pakan' => '',
            'jml_pakan_hari' => '',
            'tanggal_tebar' => '',
            'masa_panen' => '',
            'estimasi_panen' => '',
            'jumlah_ikan_mati' => ''
        ];

        $this->db->where('id', $id);
        $this->db->update('kolam', $update);
    }

    public function tebarIkan($id)
    {
        $masa_panen = $this->input->post('masa_panen');
        $tanggal_tebar = time();
        $estimasi_panen = $tanggal_tebar + (60*60*24*$masa_panen);
        $data = [
            'jenis_ikan' => $this->input->post('jenis_ikan'),
            'jumlah_ikan' => $this->input->post('jumlah_ikan'),
            'jenis_pakan' => $this->input->post('jenis_pakan'),
            'jml_pakan_hari' => $this->input->post('jumlah_pakan_hari'),
            'tanggal_tebar' => $tanggal_tebar,
            'masa_panen' => $masa_panen,
            'estimasi_panen' => $estimasi_panen
        ];
        $this->db->where('id', $id);
        $this->db->update('kolam', $data);
    }
}

?>