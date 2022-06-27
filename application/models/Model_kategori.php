<?php
/**
 *
 */
class Model_kategori extends CI_Model
{

  public function list_kategori()
  {
      $this->db->from('kategori');
      $query = $this->db->get();
      return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('kategori');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('kategori',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('kategori',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('kategori');
      return TRUE;
  }
  // function list_menu(){
  //        $this->db->order_by('id', 'ASC');
  //       return $this->db->from('menu')
  //         ->join('id', 'kategori.id=menu.id')
  //         ->get()
  //         ->result();
  //   }
  function get_category(){
        $query = $this->db->get('kategori');
        return $query;  
    }
}
