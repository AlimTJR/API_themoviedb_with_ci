<?php
class alim extends CI_Model {
public function ambildata()
{
$siswa = $this->db->query('select * FROM biodata');
return $siswa;
}public function save(){
    $data = array(
      "Id" => $this->input->post('input_nis'),
      "Nama" => $this->input->post('input_nama'),
      "Jurusan" => $this->input->post('input_jeniskelamin'),
      "Asal_kota" => $this->input->post('input_telp'),
    );
    
    $this->db->insert('siswa', $data); // Untuk mengeksekusi perintah insert data
  }
}
?>