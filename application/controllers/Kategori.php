<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        is_logged_in();
           $this->load->library('upload');
           $this->load->model('Model_kategori');
    }

  public function index()
  {
    $data['title'] = "Kategori";
    $data['konten'] = "Kategori";
    $data['isi'] = 'kategori/dtkategori';
    $data['data'] =$this->Model_kategori->list_kategori();
    $this->load->view('kategori/dtkategori', $data);
  }
  public function edit($id)
    {
          $data['title'] = "Kategori";
      $data['kategori'] =$this->Model_kategori->get_category()->result();
      $kondisi = array('id' => $id );
      $data['data'] = $this->Model_kategori->get_by_id($kondisi);
      return $this->load->view('kategori/edit_data',$data,);
    }
    public function tambah()
    {
      $data['title'] = "Kategori";
    $data['konten'] = "Kategori";
    $data['isi'] = 'kategori/dtqurban';
      return $this->load->view('kategori/tambahdata',$data);
    }
    public function insertdata()
    {
      $nama_kategori   = $this->input->post('nama_kategori');
      $jenis_kategori   = $this->input->post('jenis_kategori');
      
              $data = array(
                            'nama_kategori'       => $nama_kategori,
                            'jenis_kategori'       => $jenis_kategori,
                            
                          );
              $this->Model_kategori->insert($data);
              redirect('Kategori');

    }
    public function updatedata()
    {
      $id   = $this->input->post('id');
      $nama_kategori   = $this->input->post('nama_kategori');
      $jenis_kategori   = $this->input->post('jenis_kategori');
      
      $kondisi = array('id' => $id );

              $data = array(
                            'nama_kategori'       => $nama_kategori,
                            'jenis_kategori'       => $jenis_kategori,
                            
                          );

              $this->Model_kategori->update($data,$kondisi);
              redirect('Kategori');

  }

  public function deletedata($id)
  {

      $where = array('id' => $id );
      $this->Model_kategori->delete($where);
      return redirect('Kategori');
  }

} 
