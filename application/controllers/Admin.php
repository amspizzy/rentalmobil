<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['total_mobil']       = $this->db->count_all('mobil');
        $data['total_kostumer']    = $this->db->count_all('kostumer');
        $data['transaksi_aktif']   = $this->db->where('transaksi_status', '0')->count_all_results('transaksi');
        $data['transaksi_selesai'] = $this->db->where('transaksi_status', '1')->count_all_results('transaksi');
        $data['transaksi_terbaru'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id order by transaksi_id desc limit 5")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    function mobil(){
        $data['mobil'] = $this->m_rental->get_data('mobil')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mobil', $data);
        $this->load->view('admin/footer');
    }

    function mobil_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/mobil_add');
        $this->load->view('admin/footer');
    }

    function mobil_add_act(){
        $merk   = $this->input->post('merk');
        $plat   = $this->input->post('plat');
        $warna  = $this->input->post('warna');
        $tahun  = $this->input->post('tahun');
        $status = $this->input->post('status');

        $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('status', 'Status Mobil', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'mobil_merk'   => $merk,
                'mobil_plat'   => $plat,
                'mobil_warna'  => $warna,
                'mobil_tahun'  => $tahun,
                'mobil_status' => $status
            );
            $this->m_rental->insert_data($data, 'mobil');
            redirect(base_url().'admin/mobil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/mobil_add');
            $this->load->view('admin/footer');
        }
    }

    function mobil_edit($id){
        $where = array('mobil_id' => $id);
        $data['mobil'] = $this->m_rental->edit_data($where, 'mobil')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mobil_edit', $data);
        $this->load->view('admin/footer');
    }

    function mobil_update(){
        $id     = $this->input->post('id');
        $merk   = $this->input->post('merk');
        $plat   = $this->input->post('plat');
        $warna  = $this->input->post('warna');
        $tahun  = $this->input->post('tahun');
        $status = $this->input->post('status');

        $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('status', 'Status Mobil', 'required');

        if($this->form_validation->run() != false){
            $where = array('mobil_id' => $id);
            $data = array(
                'mobil_merk'   => $merk,
                'mobil_plat'   => $plat,
                'mobil_warna'  => $warna,
                'mobil_tahun'  => $tahun,
                'mobil_status' => $status
            );
            $this->m_rental->update_data($where, $data, 'mobil');
            redirect(base_url().'admin/mobil');
        } else {
            $where = array('mobil_id' => $id);
            $data['mobil'] = $this->m_rental->edit_data($where, 'mobil')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/mobil_edit', $data);
            $this->load->view('admin/footer');
        }
    }

    function mobil_hapus($id){
        $where = array('mobil_id' => $id);
        $this->m_rental->delete_data($where, 'mobil');
        redirect(base_url().'admin/mobil');
    }

    function kostumer(){
        $data['kostumer'] = $this->m_rental->get_data('kostumer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/kostumer', $data);
        $this->load->view('admin/footer');
    }

    function kostumer_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/kostumer_add');
        $this->load->view('admin/footer');
    }

    function kostumer_add_act(){
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $jk     = $this->input->post('jk');
        $hp     = $this->input->post('hp');
        $ktp    = $this->input->post('ktp');

        $this->form_validation->set_rules('nama', 'Nama Kostumer', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('ktp', 'No. KTP', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'kostumer_nama'   => $nama,
                'kostumer_alamat' => $alamat,
                'kostumer_jk'     => $jk,
                'kostumer_hp'     => $hp,
                'kostumer_ktp'    => $ktp
            );
            $this->m_rental->insert_data($data, 'kostumer');
            redirect(base_url().'admin/kostumer');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/kostumer_add');
            $this->load->view('admin/footer');
        }
    }

    function kostumer_edit($id){
        $where = array('kostumer_id' => $id);
        $data['kostumer'] = $this->m_rental->edit_data($where, 'kostumer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/kostumer_edit', $data);
        $this->load->view('admin/footer');
    }

    function kostumer_update(){
        $id     = $this->input->post('id');
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $jk     = $this->input->post('jk');
        $hp     = $this->input->post('hp');
        $ktp    = $this->input->post('ktp');

        $this->form_validation->set_rules('nama', 'Nama Kostumer', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('ktp', 'No. KTP', 'required');

        if($this->form_validation->run() != false){
            $where = array('kostumer_id' => $id);
            $data = array(
                'kostumer_nama'   => $nama,
                'kostumer_alamat' => $alamat,
                'kostumer_jk'     => $jk,
                'kostumer_hp'     => $hp,
                'kostumer_ktp'    => $ktp
            );
            $this->m_rental->update_data($where, $data, 'kostumer');
            redirect(base_url().'admin/kostumer');
        } else {
            $where = array('kostumer_id' => $id);
            $data['kostumer'] = $this->m_rental->edit_data($where, 'kostumer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/kostumer_edit', $data);
            $this->load->view('admin/footer');
        }
    }

    function kostumer_hapus($id){
        $where = array('kostumer_id' => $id);
        $this->m_rental->delete_data($where, 'kostumer');
        redirect(base_url().'admin/kostumer');
    }

    // ===================== TRANSAKSI =====================

    function transaksi(){
        $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi', $data);
        $this->load->view('admin/footer');
    }

    function transaksi_add(){
        $w = array('mobil_status' => '1');
        $data['mobil']    = $this->m_rental->edit_data($w, 'mobil')->result();
        $data['kostumer'] = $this->m_rental->get_data('kostumer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi_add', $data);
        $this->load->view('admin/footer');
    }

    function transaksi_add_act(){
        $kostumer    = $this->input->post('kostumer');
        $mobil       = $this->input->post('mobil');
        $tgl         = $this->input->post('tgl');
        $tgl_pinjam  = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $harga       = $this->input->post('harga');
        $denda       = $this->input->post('denda');

        $this->form_validation->set_rules('kostumer', 'Kostumer', 'required');
        $this->form_validation->set_rules('mobil', 'Mobil', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('denda', 'Denda', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'transaksi_kostumer'        => $kostumer,
                'transaksi_mobil'           => $mobil,
                'transaksi_tgl'             => $tgl,
                'transaksi_tgl_pinjam'      => $tgl_pinjam,
                'transaksi_tgl_kembali'     => $tgl_kembali,
                'transaksi_harga'           => $harga,
                'transaksi_denda'           => $denda,
                'transaksi_totaldenda'      => 0,
                'transaksi_tgldikembalikan' => '0000-00-00',
                'transaksi_status'          => '0'
            );
            $this->m_rental->insert_data($data, 'transaksi');
            $this->m_rental->update_data(array('mobil_id' => $mobil), array('mobil_status' => '2'), 'mobil');
            redirect(base_url().'admin/transaksi');
        } else {
            $w = array('mobil_status' => '1');
            $data['mobil']    = $this->m_rental->edit_data($w, 'mobil')->result();
            $data['kostumer'] = $this->m_rental->get_data('kostumer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/transaksi_add', $data);
            $this->load->view('admin/footer');
        }
    }

    function transaksi_selesai($id){
        $data['mobil']     = $this->m_rental->get_data('mobil')->result();
        $data['kostumer']  = $this->m_rental->get_data('kostumer')->result();
        $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id and transaksi_id='$id'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('admin/footer');
    }

    function transaksi_selesai_act(){
        $id              = $this->input->post('id');
        $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
        $tgl_kembali     = $this->input->post('tgl_kembali');
        $mobil           = $this->input->post('mobil');
        $denda           = $this->input->post('denda');

        $this->form_validation->set_rules('tgl_dikembalikan', 'Tanggal Di Kembalikan', 'required');

        if($this->form_validation->run() != false){
            // menghitung selisih hari
            $batas_kembali  = strtotime($tgl_kembali);
            $dikembalikan   = strtotime($tgl_dikembalikan);
            $selisih        = abs(($batas_kembali - $dikembalikan)/(60*60*24));
            $total_denda    = $denda * $selisih;

            // update status transaksi
            $data = array(
                'transaksi_tgldikembalikan' => $tgl_dikembalikan,
                'transaksi_status'          => '1',
                'transaksi_totaldenda'      => $total_denda
            );
            $w = array(
                'transaksi_id' => $id
            );
            $this->m_rental->update_data($w, $data, 'transaksi');

            // update status mobil
            $data2 = array(
                'mobil_status' => '1'
            );
            $w2 = array(
                'mobil_id' => $mobil
            );
            $this->m_rental->update_data($w2, $data2, 'mobil');
            redirect(base_url().'admin/transaksi');
        } else {
            $data['mobil']     = $this->m_rental->get_data('mobil')->result();
            $data['kostumer']  = $this->m_rental->get_data('kostumer')->result();
            $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id and transaksi_id='$id'")->result();
            $this->load->view('admin/header');
            $this->load->view('admin/transaksi_selesai', $data);
            $this->load->view('admin/footer');
        }
    }

    function transaksi_hapus($id){
        $w = array(
            'transaksi_id' => $id
        );
        $data = $this->m_rental->edit_data($w, 'transaksi')->row();

        $ww = array(
            'mobil_id' => $data->transaksi_mobil
        );
        $data2 = array(
            'mobil_status' => '1'
        );
        $this->m_rental->update_data($ww, $data2, 'mobil');

        $this->m_rental->delete_data($w, 'transaksi');
        redirect(base_url().'admin/transaksi');
    }

    function laporan(){
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        if($this->form_validation->run() != false){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $sql = "SELECT * FROM transaksi, mobil, kostumer WHERE transaksi_mobil = mobil_id AND transaksi_kostumer = kostumer_id AND date(transaksi_tgl) >= ? AND date(transaksi_tgl) <= ?";
            $data['laporan'] = $this->db->query($sql, array($dari, $sampai))->result();
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;

            $this->load->view('admin/header');
            $this->load->view('admin/laporan_filter', $data);
            $this->load->view('admin/footer');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/laporan');
            $this->load->view('admin/footer');
        }
    }

    function laporan_print(){
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');

        if($dari != '' && $sampai != ''){
            $sql = "SELECT * FROM transaksi, mobil, kostumer WHERE transaksi_mobil = mobil_id AND transaksi_kostumer = kostumer_id AND date(transaksi_tgl) >= ? AND date(transaksi_tgl) <= ?";
            $data['laporan'] = $this->db->query($sql, array($dari, $sampai))->result();
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $this->load->view('admin/laporan_print', $data);
        } else {
            redirect(base_url().'admin/laporan');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}
