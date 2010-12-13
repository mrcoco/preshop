<?php

class cbarang extends Controller {

    function cbarang() {
        parent::Controller();
            //load helper,database and library
            $this->load->helper(array('url', 'form'));
            $this->load->database();
            $this->load->library(array('table', 'validation'));

    }


    function index() {
           $this->load->model('mbarang');
           $data['kategori'] = $this->mbarang->getKategori();
           $data['merk'] = $this->mbarang->getMerk();
           $data['diskon'] = $this->mbarang->getDiskon();
           $data['promo'] = $this->mbarang->getPromo();
           $this->load->view('kategori',$data);
    }
    
    function addKategori() {
        $this->db->insert('kategori',$_POST);
        $data['kategoriii'] = $this->mbarang->kategorii();
        $this->load->view('merk',$data);
    }
    
    function merk(){
            $this->load->model('mbarang');
            $data['kategori1'] = $this->mBarang->getIdKategori($id_kategori)->row();           
            $this->load->view('merk', $data);
            
    }


    function add() {
        $this->db->insert('barang',$_POST);
        redirect('cbarang/', 'refresh');
    }

    function delete() {
            $sql = 'DELETE FROM barang WHERE id_barang=?';
            $this->db->query($sql, $this->uri->segment(3));
            redirect('cbarang/', 'refresh');
        }
}

?>