<?php
/**
 *
 */
class Model_pemesanan extends CI_Model
{

  public function list_pemesanan()
  {
      $this->db->select('*');
 $this->db->from('pemesanan');
 $this->db->join('menu','menu.id=pemesanan.id_menu');
 $query = $this->db->get();
 return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('pemesanan');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('pemesanan',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('pemesanan',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('pemesanan');
      return TRUE;
  }

}
